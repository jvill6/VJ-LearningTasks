<?php
session_start();

if (isset($_SESSION['user_email'])) {
    header('Location: Dashboard.php');
    exit;
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once 'conn.php';

$loginMessage = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) && is_string($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) && is_string($_POST['password']) ? $_POST['password'] : '';

    if ($email === '' || $password === '') {
        $loginMessage = 'Please enter your email and password.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $loginMessage = 'Please enter a valid email address.';
    } else {
        try {
            mysqli_set_charset($conn, 'utf8mb4');
            $statement = mysqli_prepare(
                $conn,
                'SELECT user_fName, user_lName, user_pw FROM users WHERE user_email = ? LIMIT 1'
            );
            mysqli_stmt_bind_param($statement, 's', $email);
            mysqli_stmt_execute($statement);
            mysqli_stmt_bind_result($statement, $firstName, $lastName, $passwordHash);
            $userFound = mysqli_stmt_fetch($statement);
            mysqli_stmt_close($statement);

            if ($userFound && is_string($passwordHash) && password_verify($password, $passwordHash)) {
                session_regenerate_id(true);
                $_SESSION['user_email'] = $email;
                $_SESSION['user_fName'] = $firstName;
                $_SESSION['user_lName'] = $lastName;

                header('Location: Dashboard.php');
                exit;
            }

            $loginMessage = 'The email or password is incorrect.';
        } catch (mysqli_sql_exception $exception) {
            error_log('Login database error: ' . $exception->getMessage());
            $loginMessage = 'Login could not be completed. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VertiPlant | Login</title>
    <link rel="stylesheet" href="styling.css">
    <link rel="icon" href="Images/logoicon.png">


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
                <h2>Welcome Back</h2>
                <p class="subtitle">Sign in to access your farm operations.</p>
                <?php if ($loginMessage !== ''): ?>
                    <p class="form-message error" role="alert"><?= htmlspecialchars($loginMessage, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endif; ?>
                <label for="email">Email:</label>
                <input id="email" name="email" type="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>" required>
                <div class="password-label"><label for="password">Password:</label><a href="#">Forgot password?</a></div>
                <input id="password" name="password" type="password" required>
                <label class="remember"><input type="checkbox" name="remember"> Remember this device</label>
                <button type="submit">Log in</button>
            </form>
        </section>
    </main>
    <?php require 'footer.php';?>
</div>

</body>


</html>