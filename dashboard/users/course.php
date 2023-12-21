<?php include '../extra/nav.php'?>

<?php 
if ($_SESSION["uid"] == 1) {
    ini_set('display_errors', 0);
    $uid = $_SESSION["id"];
    $sql = "SELECT * from users_data where uid = $uid ";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
?>

<?php if($row["paymentstatus"]==2) {?>

Comming Soon ....

<?php }?>


<?php } ?>

<?php   include '../extra/fotter.php';?>