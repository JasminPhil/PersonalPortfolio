<?php
include('../includes/db_connect.php');
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if a user/passwords exists
        //Load from DB
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        //compare
        if ($user && password_verify($password, $user['password'])) {
            // Set username to session and redirect to index.php
            $_SESSION['username'] = $user['username'];

            header("Location: index.php");
            exit();
        } else {
            echo "Invalid username or password! Try again or register a account :)"

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/reg.css">
</head>
<body>
<div class="container">
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h2>Login</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn">Login</button>
        <p class="form-note">Don't have an account? <a href="register.php">Register</a></p>
    </form>
</div>
</body>
</html>