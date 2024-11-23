<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get & Post</title>
</head>
<body>
    <!-- <form action="process.php" method="get"> -->
    <form action="process.php" method="post">
    <label for="username">User Name:</label>
    <input type="text" name="username" id="username" placeholder="Your Name" > <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" placeholder="Enter Password" > <br>
    <input type="submit" name="submit" value="Log In">
    </form>
</body>
</html>