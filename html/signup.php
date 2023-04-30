<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Create New Account</title>
    <?php include '../config.php';?>
    <link rel="stylesheet" href="../css/loginsignup.css?v=<?=$version?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php
    include './dbcon.php';
    if(isset($_POST['create'])){
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['password']);
      $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
      $faculty = mysqli_real_escape_string($con, $_POST['faculty']);
      $batch = mysqli_real_escape_string($con, $_POST['batch']);

      $pass = password_hash($password, PASSWORD_BCRYPT);
      $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
// checking if email is already present or not
      $emailquery = "select * from users where email='$email' ";
      $query = mysqli_query($con, $emailquery);

      $emailcount = mysqli_num_rows($query);

      if($emailcount>0){
        ?>
    <script>
        alert("Email already exists !");
    </script>
    <?php
      
      }
      else{
        if($password === $cpassword){
          $insertquery = "insert into users(username, email, password, cpassword, faculty, batch) values('$username','$email','$pass','$cpass','$faculty','$batch')";
        $iquery = mysqli_query($con, $insertquery);
          if($iquery){
    ?>
    <script>
        alert("Account has been created !");
        location.replace("./login.php");
    </script>
    <?php
}else{
    ?>
    <script>
        alert("Failed to sign up !");
    </script>
    <?php

}

        }else{
          ?>
    <script>
        alert("Password not matched !");
    </script>
    <?php
        }
      }

    
    }
    ?>
    <div class="signup-box">
      <h1>Sign Up</h1>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label>Username</label>
        <input type="text" name="username" placeholder="John Doe" autocomplete="off" required/>
        <label>Email</label>
        <input type="email" name="email" placeholder="johndoe@gmail.com" autocomplete="off" required />
        <label>Password</label>
        <input type="password" name="password" placeholder="" autocomplete="off" required/>
        <label>Confirm Password</label>
        <input type="password" name="cpassword" placeholder="" required/>
        <label for="faculty">Faculty:</label>
          <select id="faculty" name="faculty" required>
            <option value="" disabled selected>Select</option>
            <option value="Information Technology">DIT</option>
            <option value="Civil Engineering">DCE</option>
            <option value="Electrical Engineering">DEE</option>
            <option value="Geomatics Engineering">DGE</option>
            <option value="Hotel Management">DHM</option>
          </select>
          <label for="batch">Batch:</label>
          <select id="batch" name="batch" required>
            <option value="" disabled selected>Select</option>
            <option value="2076">2076</option>
            <option value="2077">2077</option>
            <option value="2078">2078</option>
            <option value="2079">2079</option>
          </select>
        <button type="submit" name="create">Sign Up</button>
      </form>
      
    </div>
    <p class="para-2">
      Already have an account? <a href="login.php">Login here</a>
    </p>  
  </body>
</html>

