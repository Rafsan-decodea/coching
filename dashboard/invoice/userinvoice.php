<?php
ini_set('display_errors', 1);

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/route/function.php';
$routes = include $_SERVER['DOCUMENT_ROOT'] . '/route/routes.php';
run('/db', $routes);
$db = new DB();

if (!isset($_SESSION["id"])) {
    run("/", $routes);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Download From</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/dashboard/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dashboard/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/dashboard/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/dashboard/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>

<body>
    <?php

$id = $_SESSION["id"];
$sql = "select * from users_data  where uid = $id";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    ?>

    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="">
                <div class="card rounded-3">
                    <img src="logo.png" class="" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                        alt="Sample photo">
                    <div class="card-body p-4 p-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Left div -->
                                <div class="mb-3 text-left">
                                    <img height="150" width="120" id="imagePreview"
                                        src="/dashboard/images/<?php echo $row["picture"]; ?>" alt="Image Preview"
                                        class="img-fluid border border-primary">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-right">
                                    <?php if ($row["paymentstatus"] == 0) {?>
                                    <img height="200" width="200" id="imagePreview" src="/dashboard/invoice/unpaid.jpg"
                                        alt="Image Preview" class="img-fluid border border-primary">
                                    <?php }if ($row["paymentstatus"] == 1) {?>
                                    <img height="200" width="200" id="imagePreview" src="/dashboard/invoice/pending.jpg"
                                        alt="Image Preview" class="img-fluid border border-primary">
                                    <?php }if ($row["paymentstatus"] == 2) {?>
                                    <img height="200" width="200" id="imagePreview" src="/dashboard/invoice/paid.jpg"
                                        alt="Image Preview" class="img-fluid border border-primary">
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <!-- <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3> -->

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input disabled type="text" id="name" value="<?php echo $_SESSION["name"]; ?>" name="name"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Father Name</label>
                            <input disabled type="text" id="name" value="<?php echo $row["fathername"]; ?>" name="name"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Phone:</label>
                            <input disabled type="text" id="name" value="<?php echo $_SESSION["phone"]; ?>" name="name"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="batch">Batch:</label>
                            <input disabled type="text" value="<?php echo $row["batch"]; ?>" id="batch" name="batch"
                                class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <input disabled type="text" value="<?php echo $row["gender"]; ?>" id="batch" name="batch"
                                class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="present_address">Present Address:</label>

                            <input id="present_address" disabled value="<?php echo $row["presentaddress"]; ?>"
                                name="present_address" class="form-control" rows="3" required />
                        </div>

                        <div class="form-group">
                            <label for="permanent_address">Parmanent Address:</label>
                            <input disabled id="permanent_address" value="<?php echo $row["parmanentaddress"]; ?>"
                                name="permanent_address" class="form-control" rows="3" required />
                        </div>

                        <div class="form-group">
                            <label for="children">Children:</label>
                            <input type="number" disabled id="children" value="<?php echo $row["children"]; ?>"
                                name="children" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="children">Total Payment</label>
                            <input type="text" disabled id="children" value="<?php echo $row["payamount"]; ?> TK"
                                name="children" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="current_status">Current job:</label>
                            <input type="text" disabled id="children" value="<?php echo $row["currentjob"]; ?>"
                                name="children" class="form-control" required>
                        </div>

                        <button onClick="window.print()" class="btn btn-primary">Print PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }
$result->free();?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#printButton').click(function() {
            window.frames[0].print(); // This triggers the print dialog for the iframe
        });
    });
    </script>


</body>

</html>

<script src="/dashboard/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Bootstrap 4 -->
<script src="/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/dashboard/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/dashboard/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/dashboard/plugins/moment/moment.min.js"></script>
<script src="/dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/dashboard/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dashboard/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dashboard/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dashboard/dist/js/pages/dashboard.js"></script>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->


<!-- <div class="container ">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="">
                <div class="card rounded-3">
                    <img src="logo.png" class="" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                        alt="Sample photo">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

                        <div class="form-outline mb-4">
                            <p style="size: 200;">নাম</p>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">

                            </div>
                        </div>
                        <div class=" mb-4 ">
                            <div class="">

                            </div>
                        </div>
                        <div class=" mb-4 ">
                            <div class="">

                            </div>
                        </div>

                        <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row mb-4 pb-2 pb-md-0 mb-md-5">

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div> -->