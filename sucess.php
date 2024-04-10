<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<body>

    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h1>Welcome, $username!</h1>";
    } else {
        echo "<h1>Welcome, Guest!</h1>";
    }
    ?>

    
    <div class="alert alert-info" role="alert">
        ✅Form recieved a successful request.
    </div>
</body>
</html>