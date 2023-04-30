<?php 
include '../sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project requests</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include '../html/dbcon.php';?>
  <section id="sarnuparyo">
    <main>
      <header>New project requests</header>
    <table class="content-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Project type</th>
            <th>Member 1</th>
            <th>Member 2</th>
            <th>Member 3</th>
            <th>Member 4</th>
          </tr>
        </thead>
        <tbody>
          <?php 
$selectquery = "SELECT pr.project_id, pr.project_name, pr.project_details, pr.project_type, u1.username AS member1_name, u2.username AS member2_name, u3.username AS member3_name, u4.username AS member4_name
                 FROM project_requests pr
                 LEFT JOIN users u1 ON pr.member1 = u1.user_id
                 LEFT JOIN users u2 ON pr.member2 = u2.user_id
                 LEFT JOIN users u3 ON pr.member3 = u3.user_id
                 LEFT JOIN users u4 ON pr.member4 = u4.user_id";
$query = mysqli_query($con, $selectquery);
$num = mysqli_num_rows($query);
while($res = mysqli_fetch_array($query)){ ?>
  <tr>
    <td><?php echo $res['project_id'];?></td>
    <td><?php echo $res['project_name'];?></td>
    <td><?php echo $res['project_details'];?></td>
    <td><?php echo $res['project_type'];?></td>
    <td><?php echo $res['member1_name'];?></td>
    <td><?php echo $res['member2_name'];?></td>
    <td><?php echo $res['member3_name'];?></td>
    <td><?php echo $res['member4_name'];?></td>
  </tr>
<?php } ?>

        </tbody>
      </table>
      </main>
      </section>
</body>
</html>
