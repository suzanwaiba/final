<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
    echo "you are logged out !";
    exit;
}
include './dbcon.php';
$username= $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Home - CPM</title>
</head>
<body>
    <?php
    include './greeting.php';
    ?>
    <div class="home_content">
        <div class="heading">
            <h3>Home</h3>
            <div class="logout"><a href="./logout.php">Logout</a>
            </div>
        </div>

        <div class="body">
            <div class="date"><?php echo $date;?></div>
            <h1><?php echo $greeting ; echo $username ; ?></h1>
            
        </div>
        <div class="col">
				<div class="card card1">
					<h3>Projects</h3> <br>
                    <?php
                    // Construct the SQL query to retrieve the projects involving the logged-in user
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
                    <!-- <p>You don't have any projects yet !</p> -->
                    <!-- <img src="../illustrations/Whoosh/VR.png" alt="" width="200" height="250"> -->
					<!-- <button><i class="fa-solid fa-plus"></i>Create Project</button> -->
                    <a href="../project-creating-form.php"><button>Make Request</button></a>
				</div>
				<div class="card card2">
					<h3>Your team members</h3><br>
					<?php
// execute the SQL query and store the team_member in a variable
$team_member = mysqli_query($con, "SELECT 
    p.project_id, 
    p.project_name, 
    u1.username AS member1_name, 
    u2.username AS member2_name, 
    u3.username AS member3_name, 
    u4.username AS member4_name 
FROM 
    projects p 
    LEFT JOIN users AS u1 ON p.member1 = u1.user_id 
    LEFT JOIN users AS u2 ON p.member2 = u2.user_id 
    LEFT JOIN users AS u3 ON p.member3 = u3.user_id 
    LEFT JOIN users AS u4 ON p.member4 = u4.user_id 
WHERE 
    p.member1 = '{$_SESSION['user_id']}' 
    OR p.member2 = '{$_SESSION['user_id']}' 
    OR p.member3 = '{$_SESSION['user_id']}' 
    OR p.member4 = '{$_SESSION['user_id']}';
");
// check if there is any error in executing the query

if (!$team_member) {
  die("Failed to execute query: " . mysqli_error($con));
}

// loop through the rows in the team_member and display the data
while ($row = mysqli_fetch_assoc($team_member)) {
  // echo "Project ID: " . $row["project_id"] . "<br>";
  // echo "Project Name: " . $row["project_name"] . "<br>";
  echo "Member 1: " . $row["member1_name"] . "<br>";
  echo "Member 2: " . $row["member2_name"] . "<br>";
  echo "Member 3: " . $row["member3_name"] . "<br>";
  echo "Member 4: " . $row["member4_name"] . "<br><br>";
}

// close the database connection
mysqli_close($con);
?>



                    
                    <button style="cursor:pointer;"id="openFormBtn">Manage team</button>
				</div>






                <div class="card card3">
					<h3>Your Tasks</h3>
					<p></p>
					<a href="task-creating-form.php"><button>Create Tasks</button></a>
                    <a href="taskview.php"><button>View Tasks</button></a>
                    <!-- <button style="cursor:pointer;"id="openFormBtn">Create group</button> -->
				</div>
                <div class="card card4">
					<h3>Your Group</h3>
					<p></p>
					<a href="#"></a>
                    <!-- <button style="cursor:pointer;"id="openFormBtn">Create group</button> -->
				</div>
				
				
			</div>

            <form action= "" id="myForm" class="form">
                <h3>Poject details</h3>
            <div class="form-group">
                <label>Member 1</label>
                        <select name="team_members" id="team_members">
                            <option value="" disabled selected>Select from users</option>
                            <?php
                            // Connecting to the database and retrieve the list of available users
                            include '../html/dbcon.php';
                            $result = mysqli_query($con, "SELECT * FROM users");
                            // Loop through the results and create an option for each user
                            while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['user_id'] . "'>" . $row['username'] . "</option>";
                            }
                            ?>
                        </select>
            </div>
            <div class="form-group">
                <label for="">Member 2</label>
                            <select name="team_members" id="team_members">
                            <option value="" disabled selected>Select from users</option>
                            <?php
                            // Connecting to the database and retrieve the list of available users
                            include './html/dbcon.php';
                            $result = mysqli_query($con, "SELECT * FROM users");
                            // Loop through the results and create an option for each user
                            while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['user_id'] . "'>" . $row['username'] . "</option>";
                            }
                            ?>
                            </select>
            </div>
            <div class="form-group">
                <label for="">Member 3</label>
                            <select name="team_members" id="team_members">
                            <option value="" disabled selected>Select from users</option>
                            <?php
                            // Connecting to the database and retrieve the list of available users
                            include './html/dbcon.php';
                            $result = mysqli_query($con, "SELECT * FROM users");
                            // Loop through the results and create an option for each user
                            while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['user_id'] . "'>" . $row['username'] . "</option>";
                            }
                            ?>
                            </select>
            </div>
            <div class="form-group">
                <label for="">Member 4</label>
                            <select name="team_members" id="team_members">
                            <option value="" disabled selected>Select from users</option>
                            <?php
                            // Connecting to the database and retrieve the list of available users
                            include './html/dbcon.php';
                            $result = mysqli_query($con, "SELECT * FROM users");
                            // Loop through the results and create an option for each user
                            while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['user_id'] . "'>" . $row['username'] . "</option>";
                            }
                            ?>
                            </select>
            </div>
            <div class="operations">
            <button type="submit" id="submitTeam">Submit</button>
            <button type="button" id="closeFormBtn">Close</button>
            </div>
            
</form>
    </div>
    <script src="../js/home.js"></script>
</body>
</html>