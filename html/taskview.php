<?php
include '../usersidebar.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tasks</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<?php
include 'dbcon.php';?>
  <section id="sarnuparyo">
    <main>
       <div style="display: flex; justify-content: space-between;">
      <header>Tasks List</header>
      <header><a href="task-creating-form.php">Create Task</a></header>
    </div>
    <table class="content-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Assigned to </th>
            <th>Start Date</th>
            <th>End Date</th>
          </tr>
        </thead>
        <tbody>
          <?php 
              $selectquery = "select * from tasks";
              $query = mysqli_query($con, $selectquery);
              $num = mysqli_num_rows($query);
              if (mysqli_num_rows($query) > 0) {
              while($res = mysqli_fetch_array($query)){
              ?><tr>
                <td><?php echo $res['task_name'];?></td>
                <td><?php echo $res['task_description'];?></td>
                <td><?php echo $res['assigned_to'];?></td>
                <td><?php echo $res['start_date'];?></td>
                <td><?php echo $res['end_date'];?></td>
              </tr>
              <?php
              }
          }
              	else {
  echo "No tasks found.";
}
              
          ?>
        </tbody>
      </table>
      </main>
      </section>
</body>
</html>