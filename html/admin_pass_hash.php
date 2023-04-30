<?php
include './dbcon.php';
$password1 = "supervisor1";
$password2 = "supervisor2";
$password3 = "supervisor3";
$password4 = "supervisor4";


$hashed_password1 = password_hash($password1, PASSWORD_BCRYPT);
$hashed_password2 = password_hash($password2, PASSWORD_BCRYPT);
$hashed_password3 = password_hash($password3, PASSWORD_BCRYPT);
$hashed_password4 = password_hash($password4, PASSWORD_BCRYPT);

$sql1 = "INSERT INTO supervisors (supervisor_name, supervisor_email, supervisor_password)
VALUES ('Supervisor1', 'supervisor1@gmail.com', '$hashed_password1')";

$sql2 = "INSERT INTO supervisors (supervisor_name, supervisor_email, supervisor_password)
VALUES ('Supervisor2', 'supervisor2@gmail.com', '$hashed_password2')";

$sql3 = "INSERT INTO supervisors (supervisor_name, supervisor_email, supervisor_password)
VALUES ('Supervisor3', 'supervisor3@gmail.com', '$hashed_password3')";

$sql4 = "INSERT INTO supervisors (supervisor_name, supervisor_email, supervisor_password)
VALUES ('Supervisor4', 'supervisor4@gmail.com', '$hashed_password4')";

if (mysqli_query($con, $sql1) && mysqli_query($con, $sql2) && mysqli_query($con, $sql3) && mysqli_query($con, $sql4)) {
    echo "Records created successfully";
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
}

mysqli_close($con);

?>