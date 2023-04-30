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
    <title>Supervisor Login</title>
    <link rel="stylesheet" href="../css/loginsignup.css?v=<?=$version?>" />
</head>
  <body>
<?php
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $supervisor_search = "select * from supervisors where supervisor_email= '$email'";
  $query = mysqli_query($con, $supervisor_search);
  $email_count = mysqli_num_rows($query);
  if($email_count){
    $email_pass = mysqli_fetch_assoc($query);
    $db_pass= $email_pass['supervisor_password'];
    $_SESSION['username']=$email_pass['supervisor_name'];
    $pass_decode = password_verify($password, $db_pass);
    if($pass_decode){ 
      echo "login success!";
      ?>
      <script>
        location.replace("./supervisor_home.php");
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
        <input type="email" name="email" />
        <label>Password</label>
        <input type="password" name="password" />
        <button type="submit" name="login">Login</button>
      </form>
    </div>
    <p class="para-2">
      Don't have an account? <a href="signup.php">Sign Up Here</a>
      <a href="login.php"> User Login</a>
    </p>
  </body>
</html>