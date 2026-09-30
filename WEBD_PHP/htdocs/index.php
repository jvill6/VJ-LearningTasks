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
            <form class="login-card" action="" method="post" onsubmit="return validateLoginForm();">
                <h2>Welcome Back</h2>
                <p class="subtitle">Sign in to access your farm operations.</p>
                <label for="email">Email:</label>
                <input id="email" name="email" type="email" required>
                <div class="password-label"><label for="password">Password:</label><a href="#">Forgot password?</a></div>
                <input id="password" name="password" type="password" required>
                <label class="remember"><input type="checkbox" name="remember"> Remember this device</label>
                <p class="invalidText" style="color: red; display: none;">Invalid input</p>
                <button type="submit">Log in</button>
            </form>
        </section>
    </main>
    <?php require 'footer.php';?>
</div>

<script>
    function validateLoginForm() {
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const invalidText = document.querySelector('.invalidText');

        if (email === '' || password === '') {
            invalidText.style.display = 'block';
            return false;
        }

        invalidText.style.display = 'none';
        window.location.href = 'Dashboard.php';
        return false;
    }
</script>

</body>


</html>