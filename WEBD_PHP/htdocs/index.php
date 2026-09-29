<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VertiPlant | Login</title>
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
                <h2>Welcome Back</h2>
                <p class="subtitle">Sign in to access your farm operations.</p>
                <label for="email">Email:</label>
                <input id="email" name="email" type="email" required>
                <div class="password-label"><label for="password">Password:</label><a href="#">Forgot password?</a></div>
                <input id="password" name="password" type="password" required>
                <label class="remember"><input type="checkbox" name="remember"> Remember this device</label>
                <button type="submit">Log - in</button>
            </form>
        </section>
    </main>
    <?php require 'footer.php';?>
</div>
</body>

<script>
    
</script>
</html>