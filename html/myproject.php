<?php
include '../usersidebar.php';
include'dbcon.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<section id="sarnuparyo">
	<main>
		<?php
		$sql = "SELECT * FROM projects WHERE member1 = '{$_SESSION['user_id']}' OR member2 = '{$_SESSION['user_id']}' OR member3 = '{$_SESSION['user_id']}' OR member4 = '{$_SESSION['user_id']}'";
// Execute the query
$result = mysqli_query($con, $sql);
if (!$result) {
  die("Query failed: " . mysqli_error($con));
}

// Check if any results were returned
if (mysqli_num_rows($result) > 0) {
  // Output the projects
  while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="project_data id">
        ID<br>
        <?php $_SESSION['project_id']=$row["project_id"];
        echo  $row["project_id"] ; ?>
        </div>

        <div class="project_data name">
        Project <br>
        <?php echo  $row["project_name"] ; ?>
        </div>

        <div class="project_data description">
        Details <br>
        <?php echo  $row["project_details"] ; ?>
        </div><br>
<?php
    // echo "Project Name: " . $row["project_name"] . "<br>";
    // echo"Type: ".$row["project_type"]."<br>";
    // echo"Details:".$row["project_details"]."<br>";

  }
} else {
  echo "No projects found.";
}

// Close the database connection
// mysqli_close($con);
?>
	</main>
</section>
</body>
</html>
