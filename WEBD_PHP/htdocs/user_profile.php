<?php
require_once 'sessionManager.php';
include 'conn.php';

$uploadMessage = '';
$profileImage = '';
$skipLatestProfileLookup = false;

$uploadDir = __DIR__ . '/Images/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_POST['upload']) && isset($_FILES['uploadfile'])) {
    $file = $_FILES['uploadfile'];

    if ($file['error'] === UPLOAD_ERR_OK && !empty($file['name'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $fileType = mime_content_type($file['tmp_name']);
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($fileType, $allowedTypes, true) && in_array($extension, $allowedExtensions, true)) {
            $storedName = uniqid('profile_', true) . '.' . $extension;
            $targetPath = $uploadDir . $storedName;

            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                $stmt = mysqli_prepare($conn, 'INSERT INTO gallery (filename) VALUES (?)');
                mysqli_stmt_bind_param($stmt, 's', $storedName);

                if (mysqli_stmt_execute($stmt)) {
                    $uploadMessage = 'Image uploaded successfully.';
                    $profileImage = $storedName;
                } else {
                    $uploadMessage = 'Upload failed: database insert error.';
                }

                mysqli_stmt_close($stmt);
            } else {
                $uploadMessage = 'Upload failed: could not move the file to the server.';
            }
        } else {
            $uploadMessage = 'Only JPG, PNG, GIF, and WEBP images are allowed.';
        }
    } elseif ($file['error'] !== UPLOAD_ERR_NO_FILE) {
        $uploadMessage = 'Upload failed. Please try again.';
    }
}

if (isset($_POST['remove_profile'])) {
    if (empty($profileImage)) {
        $result = mysqli_query($conn, 'SELECT filename FROM gallery ORDER BY filename DESC LIMIT 1');
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (!empty($row['filename'])) {
                $profileImage = $row['filename'];
            }
        }
    }

    $currentFile = basename((string) $profileImage);

    if ($currentFile !== '' && $currentFile !== '.' && $currentFile !== '..') {
        $filePath = $uploadDir . $currentFile;
        if (is_file($filePath)) {
            unlink($filePath);
        }

        $stmt = mysqli_prepare($conn, 'DELETE FROM gallery WHERE filename = ?');
        mysqli_stmt_bind_param($stmt, 's', $currentFile);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $profileImage = '';
        $skipLatestProfileLookup = true;
        $uploadMessage = 'Profile picture removed successfully.';
    } else {
        $uploadMessage = 'No profile picture available to remove.';
    }
}

if (empty($profileImage) && !$skipLatestProfileLookup) {
    $result = mysqli_query($conn, 'SELECT filename FROM gallery ORDER BY filename DESC LIMIT 1');
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (!empty($row['filename'])) {
            $profileImage = $row['filename'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pStyle.css">
    <title>VerdiPlant | Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<style>
* {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            border: 2px solid #222;
            font-family: Arial, Helvetica, sans-serif;
            color: #111;
            background: #fff;
            min-height: 100vh;
        }

        .banner {
            height: 118px;
            background: #eef3ed;
            border-bottom: 1px solid #d7dfd7;
        }

        main {
            max-width: 1200px;
            margin: -58px auto 0;
            padding: 0 4%;
            position: relative;
        }

        .layout {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 50px;
            align-items: start;
        }

        .profile {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 3px #0002;
            padding: 25px 26px;
            text-align: center;
        }

        .avatar {
            width: 62px;
            height: 62px;
            border-radius: 8px;
            background: #888;
            margin: 0 auto 8px;
            display: grid;
            place-items: center;
            color: white;
            font-size: 36px;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .profile h1 {
            font-size: 22px;
            margin: 0 0 4px;
        }

        .email {
            font-size: 12px;
            color: #555;
        }

        .profile hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 17px 0;
        }

        .detail {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            font-size: 11px;
            color: #444;
            margin: 13px 0;
        }

        .detail strong {
            text-align: right;
        }

        .outline {
            width: 100%;
            border: 1px solid #aaa;
            border-radius: 7px;
            background: white;
            padding: 7px;
            margin-top: 10px;
            cursor: pointer;
        }

        .farms {
            padding-top: 94px;
        }

        .farm-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .farm-heading h2 {
            font-size: 23px;
            margin: 0;
        }

        .green-button {
            background: #08df2d;
            border: 0;
            border-radius: 7px;
            padding: 8px 16px;
            cursor: pointer;
            color: #000;
            font-weight: 600;
        }

        .farm-card {
            width: 190px;
            border: 1px solid #b9d4b7;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 3px #0002;
        }

        .farm-placeholder {
            height: 72px;
            display: grid;
            place-items: center;
            background: #f0f4ef;
            color: #54705a;
            font-size: 12px;
            font-weight: 600;
            border-bottom: 1px solid #d7dfd7;
        }

        .farm-info {
            padding: 12px;
        }

        .farm-info h3 {
            font-size: 17px;
            margin: 0 0 3px;
        }

        .farm-info p {
            font-size: 10px;
            margin: 4px 0;
        }

        .progress {
            height: 6px;
            border-radius: 8px;
            background: #ddd;
            overflow: hidden;
        }

        .progress span {
            display: block;
            background: #08df2d;
            height: 100%;
        }

        .day {
            text-align: right;
            color: #555;
            font-size: 9px !important;
        }

        .back {
            position: fixed;
            left: 22px;
            bottom: 26px;
            background: #08df2d;
            border: 0;
            border-radius: 18px;
            padding: 7px 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .footer {
            text-align: center;
            padding: 28px;
            color: #777;
            font-size: 11px;
        }

        @media (max-width: 720px) {
            .layout {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .profile {
                max-width: 360px;
                width: 100%;
                margin: auto;
            }

            .farms {
                padding-top: 15px;
            }

            .farm-card {
                width: min(100%, 260px);
            }

            .farm-placeholder {
                height: 90px;
            }
        }

        @media (max-width: 480px) {
            main {
                padding: 0 16px;
            }

            .back {
                left: 16px;
                bottom: 16px;
            }
        }
</style>
    

<body>
    <div class="banner" aria-hidden="true"></div>

    <main>
        <div class="layout">
            <aside class="profile">
                <div class="avatar">
                    <?php if (!empty($profileImage)): ?>
                        <img src="Images/<?php echo htmlspecialchars($profileImage, ENT_QUOTES, 'UTF-8'); ?>" alt="Profile image">
                    <?php else: ?>
                        P
                    <?php endif; ?>
                </div>
                <h1>Fname Lname ✎</h1>
                <a class="email" href="mailto:s232424@gmail.com">s232424@gmail.com</a>
                <hr>

                <div class="detail">
                    <span>From</span>
                    <strong>Philippines</strong>
                </div>

                <div class="detail">
                    <span>Birthday</span>
                    <strong>Sept 12, 2006</strong>
                </div>

                <hr>

                <div class="detail">
                    <span>Member since</span>
                    <strong>September 2026</strong>
                </div>


        <!-- Modal -->
<div class="modal fade" id="insertdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertdataLabel">Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div id="content">
            <?php if (!empty($uploadMessage)): ?>
                <div class="alert alert-info" role="alert"><?php echo htmlspecialchars($uploadMessage, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>
            <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
            <input class="form-control" type="file" name="uploadfile" value="" accept="image/*" />
            </div>
            <div class="form-group modal-footer">
            <button type="submit" class="btn btn-outline-danger" name="remove_profile">Remove Picture</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit" name="upload">Save Changes</button>
            </div>
            </form>
            </div>
      </div>
    </div>
  </div>
</div>

                <!-- Button trigger modal -->
<button type="button" class="modal-dialog-centered outline" data-bs-toggle="modal" data-bs-target="#insertdata">
                  Edit
                </button>



            </aside>

            <section class="farms">
                <div class="farm-heading">
                    <h2>Farms:</h2>
                    <button class="green-button" type="button"
                        onclick="alert('Tower A-1\nHydroponic Rack\nButterhead Lettuce\nGrowth Stage: Vegetative\nDay 18 / 28')">
                        View All
                    </button>
                </div>

                <article class="farm-card">
                    <div class="farm-placeholder">Hydroponic Farm</div>

                    <div class="farm-info">
                        <h3>Tower A-1</h3>
                        <p>Hydroponic Rack</p>
                        <hr>
                        <p><b>Butterhead Lettuce</b></p>
                        <p>Growth Stage: Vegetative</p>

                        <div class="progress">
                            <span style="width: 64%;"></span>
                        </div>

                        <p class="day">Day 18 / 28</p>
                    </div>
                </article>
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <button class="back" type="button" onclick="history.back()">Go Back</button>
    <div class="footer"></div>
</body>
</html>




