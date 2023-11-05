<?php

include 'extra/nav.php';
//ini_set('display_errors', 1);
$getid = $_SESSION["id"];
$sql2 = "SELECT COUNT(*) AS countpayment FROM users_data WHERE paymentstatus = 2 ";
$result2 = $db->query($sql2);
$row2 = $result2->fetch_assoc();
$sql3 = "SELECT COUNT(*) AS countpendingpayment FROM users_data WHERE paymentstatus = 1";
$result3 = $db->query($sql3);
$row3 = $result3->fetch_assoc();
$sql4 = "SELECT COUNT(*) AS countnotpayment FROM users_data WHERE paymentstatus = 0";
$result4 = $db->query($sql4);
$row4 = $result4->fetch_assoc();
$sql5 = "SELECT COUNT(*) AS countsubmit FROM users_data ";
$result5 = $db->query($sql5);
$row5 = $result5->fetch_assoc();
$sql = "SELECT COUNT(*) AS total FROM users where uid = 1";
$result = $db->query($sql);
$row = $result->fetch_assoc();

?>

<br>
<?php
if ($_SESSION["uid"] == 1) {
    ?>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?php echo $row5['countsubmit']; ?></h3>

                <p>Total Registration Submit</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fas "></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo $row2['countpayment']; ?></h3>

                <p>Total payment Done people</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fas "></i></a>
        </div>
    </div>
</div>
<?php }?>
<?php
if ($_SESSION["uid"] == 0) {
    ?>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $row['total']; ?></h3>

                <p>Total Logged People</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fas "></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?php echo $row5['countsubmit']; ?></h3>

                <p>Total Registration Submit</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fas "></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo $row2['countpayment']; ?></h3>

                <p>Total payment Done </p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fas "></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo $row3['countpendingpayment']; ?></h3>

                <p>Total payment Pending </p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fas "></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?php echo $row4['countnotpayment']; ?></h3>

                <p>Total not payment</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fas "></i></a>
        </div>
    </div>

</div>
<?php }?>
<?php include 'extra/fotter.php'?>