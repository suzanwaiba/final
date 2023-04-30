<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="../project-creating-form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <?php
    include '../html/dbcon.php';
    if(isset($_POST['create_project'])){
        $project_title = mysqli_real_escape_string($con, $_POST['project_title']);
        $project_details = mysqli_real_escape_string($con, $_POST['project_details']);
        $objective = mysqli_real_escape_string($con, $_POST['objective']);
        $scope = mysqli_real_escape_string($con, $_POST['scope']);
        $project_type = mysqli_real_escape_string($con, $_POST['project_type']);
        $supervisor = mysqli_real_escape_string($con, $_POST['supervisor']);
        $team_member1 = mysqli_real_escape_string($con, $_POST['team_member1']);
        $team_member2 = mysqli_real_escape_string($con, $_POST['team_member2']);
        $team_member3 = mysqli_real_escape_string($con, $_POST['team_member3']);
        $team_member4 = mysqli_real_escape_string($con, $_POST['team_member4']);
       
   
        $insertquery= "insert into projects(project_name, project_details, objective, scope, project_type, supervisor, member1, member2, member3, member4) values('$project_title', '$project_details','$objective', '$scope', '$project_type', '$supervisor', '$team_member1', '$team_member2', '$team_member3', '$team_member4')";
        $querycheck= mysqli_query($con, $insertquery);

        if($querycheck){
            $project_id = mysqli_insert_id($con);
             $team_insertquery ="insert into teams(team_name, project_id, member1, member2, member3, member4,supervisor)values('$project_title', $project_id, '$team_member1', '$team_member2', '$team_member3', '$team_member4', '$supervisor')";

        $team_insertquery_check=mysqli_query($con,$team_insertquery);
        if($team_insertquery_check){
        ?><script>alert("team inserted");</script>
        <?php
        }else{
            ?><script>alert("team insertion failed");</script>
            <?php
        }
            ?>
            <script>
                alert("Project created ..!");
                // location.replace("../html/supervisor_home.php");
            </script>
            <?php
        }else{
            ?>
    <script>
        alert("Project creation failed!");
    </script>

    <?php
        }
    }
    ?>
    <a href="javascript:history.back()">
  <i class="fa-solid fa-xmark"></i>
</a>
    <div class="container">
        <header>Create project</header>

        <form action="" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Project details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Project title</label>
                            <input type="text" placeholder="Weather App" name="project_title" required>
                        </div>

                        <div class="input-field">
                            <label>Project details</label>
                            <input type="text" placeholder="Recording weather info in database..." name="project_details"required>
                        </div>

                        <div class="input-field">
                            <label>Objective</label>
                            <input type="text" placeholder="To develop system capable of..." name="objective" required>
                        </div>
                        <div class="input-field">
                            <label>Scope</label>
                            <input type="text" placeholder="Efficient managegement, collabo..." name="scope" required>
                        </div>


                        <div class="input-field">
                            <label>Project type</label>
                            <select id="project_type" name="project_type" required>
            <option value="" disabled selected>Select</option>
            <option value="webApplication">Web Application</option>
            <option value="ecommerce">E-commerce</option>
            <option value="software_development">Software Development</option>
            <option value="networking">Networking</option>
            <option value="ai">Artificial Intelligence</option>
            </select>
                        </div>
                        <div class="input-field">
                            <label> Supervisor</label>
                            <select name="supervisor" id="team_members" required>
                            <option value="" disabled selected>Select from users</option>
                            <?php
                            // Connecting to the database and retrieve the list of available users
                            include '../html/dbcon.php';
                            $result = mysqli_query($con, "SELECT * FROM supervisors");
                            // Loop through the results and create an option for each user
                            while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['supervisor_id'] . "'>" . $row['supervisor_name'] . "</option>";
                            }
                            ?>
                            </select>
                        </div>
                        
                    </div>
                </div>
                        <!-- second fields -->
                <div class="details personal">
                    <span class="title">Team members</span>
                    <div class="fields">

                        <div class="input-field">
                            <label>Member 1</label>
                            <select name="team_member1" id="team_members" required>
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

                        <div class="input-field">
                            <label>Member 2</label>
                            <select name="team_member2" id="team_members" required>
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

                        <div class="input-field">
                            <label>Member 3</label>
                            <select name="team_member3" id="team_members" required>
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
                        <div class="input-field">
                            <label>Member 4</label>
                            <select name="team_member4" id="team_members"required>
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
                    </div>
                    <button class="btn" name="create_project">
                        <span class="btntext">Create</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>