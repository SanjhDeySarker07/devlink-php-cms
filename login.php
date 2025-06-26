<?php session_start(); include '../db/db.php'; if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username']; $password = $_POST['password'];
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param('s', $username); $stmt->execute(); $result = $stmt->get_result();
  if($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if(password_verify($password, $user['password'])) {
      $_SESSION['loggedin'] = true;
      header('Location: dashboard.php'); exit;
    } else { echo 'Invalid password.'; }
  } else { echo 'User not found.'; }
}
?>
<form method='POST'>
<input type='text' name='username' placeholder='Username' required><br>
<input type='password' name='password' placeholder='Password' required><br>
<button type='submit'>Login</button>
</form>