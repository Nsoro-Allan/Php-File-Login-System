<?php
    if(isset($_POST['login'])) {
        // Get the entered username and password
        $entered_username = $_POST['username'];
        $entered_password = $_POST['password'];

        // Create the filename based on the entered username
        $filename = $entered_username . '.txt';

        // Check if the file exists
        if(file_exists($filename)) {
            // Read the contents of the file
            $file_contents = file_get_contents($filename);

            // Extract the password from the file contents
            preg_match('/Password: (.+)/', $file_contents, $matches);
            $stored_password = isset($matches[1]) ? trim($matches[1]) : '';

            // Check if the entered password matches the stored password
            if($entered_password === $stored_password) {
                $_SESSION['username']=$entered_username;
                header("Location: dashboard.php");
                exit();
            } else {
                echo "<p><b>Incorrect password!<b></p>";
            }
        } else {
            echo "<p><b>User not found!<b></p>";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File System Login</title>
</head>
<body>
    <form action="" method="post">

        <div class="head"><h1>Login</h1></div>

        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="login">Login</button><br><br>

        <a href="./register.php">Register</a>

    </form>
</body>
</html>
