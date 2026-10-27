<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once 'conn.php';

$registrationMessage = '';
$registrationMessageType = 'error';
$fName = '';
$lName = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fName = isset($_POST['fName']) && is_string($_POST['fName']) ? trim($_POST['fName']) : '';
    $lName = isset($_POST['lName']) && is_string($_POST['lName']) ? trim($_POST['lName']) : '';
    $email = isset($_POST['email']) && is_string($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) && is_string($_POST['password']) ? $_POST['password'] : '';

    if ($fName === '' || $lName === '' || $email === '' || $password === '') {
        $registrationMessage = 'Please complete all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $registrationMessage = 'Please enter a valid email address.';
    } else {
        try {
            mysqli_set_charset($conn, 'utf8mb4');

            $checkEmail = mysqli_prepare($conn, 'SELECT user_email FROM users WHERE user_email = ? LIMIT 1');
            mysqli_stmt_bind_param($checkEmail, 's', $email);
            mysqli_stmt_execute($checkEmail);
            mysqli_stmt_store_result($checkEmail);
            $emailAlreadyRegistered = mysqli_stmt_num_rows($checkEmail) > 0;
            mysqli_stmt_close($checkEmail);

            if ($emailAlreadyRegistered) {
                $registrationMessage = 'An account with this email already exists.';
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $insertUser = mysqli_prepare(
                    $conn,
                    'INSERT INTO users (user_fName, user_lName, user_email, user_pw) VALUES (?, ?, ?, ?)'
                );
                mysqli_stmt_bind_param($insertUser, 'ssss', $fName, $lName, $email, $passwordHash);
                mysqli_stmt_execute($insertUser);
                mysqli_stmt_close($insertUser);

                $registrationMessage = 'Your account has been created successfully.';
                $registrationMessageType = 'success';
                $fName = '';
                $lName = '';
                $email = '';
            }
        } catch (mysqli_sql_exception $exception) {
            if ((int) $exception->getCode() === 1062) {
                $registrationMessage = 'An account with this email already exists.';
            } else {
                error_log('Registration database error: ' . $exception->getMessage());
                $registrationMessage = 'Registration could not be completed. Please try again later.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VertiPlant | Register</title>
    <link rel="stylesheet" href="styling.css">
</head>
<body>
<div class="page">
    <?php require 'navigational.php';?>
    <main class="login-layout">
        <section class="hero">
            <div class="brand"><span class="brand-mark">♧</span><span>VertiPlant</span></div>
            <div class="hero-copy">
                <h1>Practical and reliable way to manage vertical farming.</h1>
                <p>Help vertical farm owners in managing crops and harvests in a more organized way.</p>
            </div>
        </section>
        <section class="form-side">
            <form class="login-card" action="" method="post">
                <h2>Welcome</h2>
                <p class="subtitle">Create a free account with us today!</p>
                <?php if ($registrationMessage !== ''): ?>
                    <p class="form-message <?= htmlspecialchars($registrationMessageType, ENT_QUOTES, 'UTF-8') ?>" role="<?= $registrationMessageType === 'success' ? 'status' : 'alert' ?>">
                        <?= htmlspecialchars($registrationMessage, ENT_QUOTES, 'UTF-8') ?>
                    </p>
                <?php endif; ?>
                <label for="fName">First Name:</label>
                <input id="fName" name="fName" type="text" value="<?= htmlspecialchars($fName, ENT_QUOTES, 'UTF-8') ?>" required>
                <label for="lName">Last Name:</label>
                <input id="lName" name="lName" type="text" value="<?= htmlspecialchars($lName, ENT_QUOTES, 'UTF-8') ?>" required>
                <label for="email">Email:</label>
                <input id="email" name="email" type="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>" required>
                <label for="password">Password:</label>
                <input id="password" name="password" type="password" required>
                <button type="submit">Register</button>
            </form>
        </section>
    </main>
    <?php require 'footer.php';?>
</div>
</body>
</html>