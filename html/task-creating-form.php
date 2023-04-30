<?php 
session_start();
include('../usersidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
		<section id="sarnuparyo">
            <main>
                <div class="task_panel">
                <div style="display: flex; justify-content: space-between;">
                    <header> Create Tasks</header>
                    <header> <a href="taskview.php"> View mine</a></header>
</div>
                    <form action="" method="post">
                        <div class= "details tasks">
                            <span  class= "title">Task details</span>
                            <div class = "fields">
                                <div class="input-field">
                                    <label>Project</label>
                                    <select name="inproject" id="inproject" required>
                            <option value="" disabled selected>Your project</option>
                            <?php
                            // Connecting to the database and retrieve the list of available users
                            include 'dbcon.php';
                            $result = mysqli_query($con, "SELECT * FROM projects");
                            // Loop through the results and create an option for each 
                            while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['project_id'] . "'>" . $row['project_name'] . "</option>";
                            }
                            ?>
                            </select>
                                </div>
                                  <div class="input-field">
                                    <label>Task name</label>
                                    <input type="text" name="task_name" required>
                                </div>
                                <div class="input-field">
                                    <label>Description</label>
                                    <input type="text" name="task_description" required>
                                </div>
                                <div class="input-field">
                                    <label>Assign to</label>
                                     <select name="assigned_to" id="assigned_to" required>
    <option value="" disabled selected>Select team members</option>
    <?php
    // Connecting to the database and retrieve the list of available team members for the given project_id
    $project_id = $_SESSION['project_id']; // replace with the actual project_id
    $result = mysqli_query($con, "SELECT DISTINCT u.username
                              FROM teams t
                              JOIN users u ON t.member1=u.user_id OR t.member2=u.user_id OR t.member3=u.user_id OR t.member4=u.user_id
                              WHERE t.project_id=$project_id");
    // Loop through the results and create an option for each team member
    while($row = mysqli_fetch_array($result)) {
        // concatenate the team members' names
        $assigned_to = $row['username'];
        if (!empty($row['member2'])) {
            $assigned_to .= ', ' . mysqli_fetch_array(mysqli_query($con, "SELECT username FROM users WHERE user_id=".$row['member2']))['username'];
        }
        if (!empty($row['member3'])) {
            $assigned_to .= ', ' . mysqli_fetch_array(mysqli_query($con, "SELECT username FROM users WHERE user_id=".$row['member3']))['username'];
        }
        if (!empty($row['member4'])) {
            $assigned_to .= ', ' . mysqli_fetch_array(mysqli_query($con, "SELECT username FROM users WHERE user_id=".$row['member4']))['username'];
        }
        // create an option with the team members' names as the label and the member id as the value
        echo "<option value='" . $row['member1'] . "'>" . $assigned_to . "</option>";
    }
    ?>
</select>



                                </div>

                                 <div class="input-field">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" required>
                                </div>
                                 <div class="input-field">
                                    <label>End Date</label>
                                    <input type="date" name="end_date" required>
                                </div>

                            </div>
                            <button class="btn" name="create_task">
                        <span class="btntext">Create 	task</span>
                       <img src="../illustrations/send-message.png"class="create-task"alt="">
                    </button>
                        </div>

                    </form>
                </div>
            </main>
        </section>
</body>
</html>
    <?php
    if(isset($_POST['create_task'])){
        $project_title = mysqli_real_escape_string($con, $_POST['inproject']);
        $task_name = mysqli_real_escape_string($con, $_POST['task_name']);
        $task_description = mysqli_real_escape_string($con, $_POST['task_description']);
        $assigned_to = mysqli_real_escape_string($con, $_POST['assigned_to']);
        $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
        $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
  
   
        $insertquery= "insert into tasks(project_id, task_name, task_description, assigned_to, start_date, end_date) values('$project_title', '$task_name','$task_description', '$assigned_to', '$start_date', '$end_date')";
        $querycheck= mysqli_query($con, $insertquery);
        if($querycheck){
        ?><script>alert("Task created successfully.");</script>
        <?php 
        }else{
        ?><script>alert("Failed to create task.");</script>
        <?php
        }
        }
        ?>