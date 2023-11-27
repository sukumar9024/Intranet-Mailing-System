<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    // Check if the "email" key exists in the $_POST array
    $email = isset($_POST["email"]) ? $mysqli->real_escape_string($_POST["email"]) : null;
    
    $sql = sprintf("SELECT * FROM users
                    WHERE email = '%s'",
                   $email);
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc(); 
    if ($user) {
        
        if (isset($_POST["password"]) && $_POST["password"] === $user["password"]) {
            session_start();
            // Set a longer session cookie expiration time (e.g., 1 day)
            //$session_duration = 86400; // 1 day in seconds
            //session_set_cookie_params($session_duration);

            // Store user information in the session
            $_SESSION["email"] = $user["email"];
            header("Location: allmails.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form method="post">
      <h1>Login</h1>
      <div class="input-box">
        <input type="email" placeholder="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Don't have an account? <a href="signup.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>
