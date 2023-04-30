<?php
include '../html/dbcon.php';
$id= $_GET['idth'];
$deletequery = "delete from users where user_id= $id";
$querycheck = mysqli_query($con, $deletequery);
if($querycheck){
    ?>
    <script>alert('Deleted');</script>
    <?php
}
header('location:studentlist.php');

?>