<?php
session_start();

require 'functions.php';

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM user");
while ($row = mysqli_fetch_assoc($result)) {

  if ($row["username"] == $username && $row["password"] == $password) {
    $_SESSION['session_username'] = true;
    header("Location: admin.php");
    exit;
  } else {
    header("location:login.php?failed");
  }
}
$error = true;
