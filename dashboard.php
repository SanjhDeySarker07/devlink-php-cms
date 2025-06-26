<?php session_start(); if(!isset($_SESSION['loggedin'])) { header('Location: login.php'); exit; } ?>
<?php include '../includes/header.php'; ?>
<h2>Welcome to Admin Dashboard</h2>
<a href='logout.php'>Logout</a>
<?php include '../includes/footer.php'; ?>