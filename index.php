<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Form Login </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="konten">
             <div class="kepala">
                <div class="lock"></div>
                <h2 class="judul">Log In</h2>
        </div>
        <div class="artikel">
            <form class="" action="login.php" method="post">
            <div class="grup">
                <label for="username">Username</label>
                <input type="text" name="username" required autofocus>
            </div>                
            <div class="grup">
                <label for="password">Password</label>
                <input type="password" name="password" required autofocus>
            </div>
            <div class="grup">
                    <input type="submit" name="submit" value="Masuk">
        </form>
        <br>
    </div>
    </body>
</html>