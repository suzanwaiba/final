<?php 
session_start();
include '../config.php';
include './dbcon.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="../css/loginsignup.css?v=<?=$version?>" />
</head>
  <body>
<?php
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $user_search = "select * from users where email= '$email'";
  $query = mysqli_query($con, $user_search);
  $email_count = mysqli_num_rows($query);
  if($email_count){
    $email_pass = mysqli_fetch_assoc($query);
    $db_pass= $email_pass['password'];
    $_SESSION['username']=$email_pass['username'];
    $_SESSION['user_id']=$email_pass['user_id'];
    $pass_decode = password_verify($password, $db_pass);
    if($pass_decode){ 
      echo "login success!";
      ?>
      <script>
        location.replace("./home.php");
      </script>
      <?php
    } else{
echo "password incorrect";
    }
      
  }else{
    echo "invalid email";
  }
}
?>


    <div class="login-box">
      <h1>Login</h1>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label>Email</label>
        <input type="email" name="email" autocomplete="off"/>
        <label>Password</label>
        <input type="password" name="password" autocomplete="off" />
        <button type="submit" name="login">Login</button>
      </form>
    </div>
    <p class="para-2">
      Don't have an account? <a href="signup.php">Sign Up Here</a>
      <a href="supervisorlogin.php">Admin Login</a>
    </p>
  </body>
</html>