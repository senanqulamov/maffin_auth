<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maffin Registration Form</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<div class="login-container">
    <form autocomplete="off" method="post" action="/register">
        <h2>
            <?php if (!empty($error)): ?>
                <b style="color: #884444">
                    <?= $error ?>
                </b>
            <?php else: ?>
                Registration Form of Maffin
            <?php endif; ?>
        </h2>
        <div class="input-group">
            <input type="text" name="username" placeholder=" " required>
            <label for="user">Maffin Name</label>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder=" " required>
            <label for="pass">Your password</label>
        </div>
        <button type="submit" class="btn">Register</button>
        <a href="/login">Login</a>
    </form>
</div>
</body>
</html>