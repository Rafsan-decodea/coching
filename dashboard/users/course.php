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
<h1>Your Course From Private youtube Channel </h1><br>
<iframe width="420" height="315" src="https://www.youtube.com/embed/DWdAziaDwWc?autoplay=1&mute=1">
</iframe>
<iframe width="420" height="315" src="https://www.youtube.com/embed/DWdAziaDwWc?autoplay=1&mute=1">
</iframe>
<iframe width="420" height="315" src="https://www.youtube.com/embed/DWdAziaDwWc?autoplay=1&mute=1">
</iframe>
<iframe width="420" height="315" src="https://www.youtube.com/embed/DWdAziaDwWc?autoplay=1&mute=1">
</iframe>
<?php }?>


<?php } ?>

<?php   include '../extra/fotter.php';?>