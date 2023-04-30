<?php 
include('../sidebar.php');
include('../html/dbcon.php');
$dashboard_data = "SELECT 
            (SELECT COUNT(*) FROM projects) AS project_count,
            (SELECT COUNT(*) FROM users) AS user_count,
            (SELECT COUNT(*) FROM supervisors) AS supervisor_count";
$result = mysqli_query($con, $dashboard_data);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch the counts from the result set
$row = mysqli_fetch_assoc($result);
$project_count = $row['project_count'];
$user_count = $row['user_count'];
$supervisor_count = $row['supervisor_count'];


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
		<section id="sarnuparyo">
            <main>
                <h1> Dashboard</h1>
                <ul class="box-info">
                	<li>
					<img src="../illustrations/supervisor.png" class="bx"></i>
					<span class="text">
						<h3><?php echo $supervisor_count; ?></h3>
						<p>Supervisors</p>
					</span>
				</li>
				<li>
					<img src="../illustrations/students.png" class="bx" ></i>
					<span class="text">
						<h3><?php echo $user_count; ?></h3>
						<p>Students</p>
					</span>
				</li>
				<li>
					<img src="../illustrations/project.png" class="bx" >
					<span class="text">
						<h3><?php echo $project_count; ?></h3>
						<p>Projects</p>
					</span>
				</li>
				
				
			</ul>
            
            <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>New Students</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Faculty</th>
								<th>Batch</th>
							</tr>
						</thead>
						<tbody>
 <?php 
 $recent_query = "SELECT * FROM users ORDER BY joined_at DESC LIMIT 5";
$recent_users_array = mysqli_query($con, $recent_query);
while($res= mysqli_fetch_array($recent_users_array)){
?><tr>
	<td><?php echo $res['username'];?></td>
	<td><?php echo $res['faculty'];?></td>
	<td><?php echo $res['batch'];?></td>

</tr>
<?php
}
?>
             
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Supervisors</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Supervisor1</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Supervisor2</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Supervisor3</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Supervisor4</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
            </main>
        </section>
</body>
</html>