<?php
session_start();
include('../includes/db_connect.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // User not logged in open login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#introduction">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section id="introduction">
        <h1>Welcome to My Portfolio</h1>
        <p>I'm <?php echo $_SESSION['username']; ?>, a Web Programmer.</p>
    </section>

    <section id="about">
        <h2>About Me</h2>
        <p>Information about yourself, your career goals, and your professional journey.</p>
    </section>

    <section id="skills">
        <h2>Skills</h2>
        <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
        </ul>
    </section>

    <section id="projects">
        <h2>Projects</h2>
        <ul>
            <li>Project 1 - Brief description. <a href="#">Link</a></li>
            <li>Project 2 - Brief description. <a href="#">Link</a></li>
        </ul>
    </section>

    <section id="contact">
        <h2>Contact Me</h2>
        <form action="submit_form.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea>
            <button type="submit">Send</button>
        </form>
    </section>
</body>
</html>