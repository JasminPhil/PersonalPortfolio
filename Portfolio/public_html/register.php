<?php
include('../includes/db_connect.php');

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $hashedPassword, $email);

    $username = $_POST['username'];
    $password = $_POST['password'];
    // Hash password needed for password_verify()
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/reg.css">
</head>
<body>
<div class="container">
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h2>Registration</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email" required>
        </div>
        <button type="submit" class="btn">Register</button>
        <p class="form-note">Already have an account? <a href="login.php">Login</a></p>
    </form>
</div>
</body>
</html>