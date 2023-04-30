
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php  include '../sidebar.php';
              include '../html/dbcon.php';?>
  <section id="sarnuparyo">
    <main>
      <header>Students List</header>
    <table class="content-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Faculty</th>
            <th>Batch</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php 
              $selectquery = " select * from users";
              $query = mysqli_query($con, $selectquery);
              $num = mysqli_num_rows($query);
              while($res = mysqli_fetch_array($query)){
              ?><tr>
                <td><?php echo $res['user_id'];?></td>
                <td><?php echo $res['username'];?></td>
                <td><?php echo $res['email'];?></td>
                <td><?php echo $res['faculty'];?></td>
                <td><?php echo $res['batch'];?></td>
                <td><a href="delete.php?idth=<?php echo $res['user_id']?>"><img src="../illustrations/delete.png" width="20" height="20"></a></td>
              </tr>
              <?php
              }
          ?>
        </tbody>
      </table>
      </main>
      </section>
</body>
</html>

