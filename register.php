
<?php
    if(isset($_POST['register'])) {
        // Get the username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Create a string to store user data
        $user_data = "Username: $username\nPassword: $password\n\n";

        // Create a filename using the username
        $filename = $username . '.txt';

        // Write user data to a file
        file_put_contents($filename, $user_data, FILE_APPEND);

        echo "<p><b>Registration successful!<b></p>";
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File System Register</title>
</head>
<body>
    <form action="" method="post">

        <div class="head"><h1>Register</h1></div>

        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="register">Register</button><br><br>

        <a href="./index.php">Login</a>

    </form>

</body>
</html>
