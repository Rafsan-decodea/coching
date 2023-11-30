<?php include '../extra/nav.php'?>

<?php
if ($_SESSION["uid"] == 1) {
    ini_set('display_errors', 0);
    $uid = $_SESSION["id"];
    $sql = "SELECT * from users_data where uid = $uid ";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        ?>

<br><br>
<table class="table table-striped table-bordered table-responsive">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">mobilenumber</th>
            <th scope="col">Father Name</th>
            <th scope="col">Mother Name</th>
            <th scope="col">gender</th>
            <th scope="col">Present Address</th>
            <th scope="col">Parmanent Address</th>
            <th scope="col">Pay Amount</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Action/Trasection ID</th>
        </tr>
        <?php

        $id = $_SESSION["id"];
        $sql = "select * from users_data  where uid = $id";
        $result = $db->query($sql);
        ?>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) {?>
        <tr>

            <th scope="row"><?php echo $number += 1; ?></th>
            <td><?php echo $row["phone"]; ?></td>
            <td><?php echo $row["fathername"]; ?></td>
            <td><?php echo $row["mothername"]; ?></td>
            <td><?php echo $row["gender"]; ?></td>
            <td><?php echo $row["presentaddress"]; ?></td>
            <td><?php echo $row["parmanentaddress"]; ?></td>
            <td><?php echo $row["payamount"]; ?></td>
            <td>
                <?php if ($row["paymentstatus"] == 3) {?>
                <center>
                    <p class='badge text bg-danger'>Reject</p>
                </center>
            <td> <button class="btn btn-primary " id="rejectresone" data-toggle="modal" data-target="#rejectresone">See
                    Resone</button>
            </td>
            <div class="modal fade" id="rejectresone" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <cernter>
                                <h5 class="modal-title" id="exampleModalLabel">Payment Rejected</h5>
                            </cernter>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Bkash_Payment_Reject_Resone
                            </h3><br>
                            <center>
                                <h4><?php echo $row["rejectreson"]; ?></h4>
                            </center>
                            <br>

                        </div>
                        <div class="modal-body">
                            <form id="payform" method="post" action="/dashboard/users/regform.php"
                                enctype="multipart/form-data" class="px-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ReSubmit Bkash Transection ID</label>
                                    <input class="form-control" required name="bkashid" id="emailid"
                                        aria-describedby="emailHelp" Name placeholder="Bkash Transection id">
                                </div>
                                <button data-bind="" name="bikassubmit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                        <?php

            if (isset($_POST["bikassubmit"])) {
                $getid = $_SESSION["id"];
                $bkashid = $_POST["bkashid"];
                $sql = "UPDATE users_data set bkashid='$bkashid',paymentstatus=1 where uid = $getid";
                $db->insert($sql);
                echo " <meta http-equiv='refresh' content='0'>";
            }

            ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            document.getElementById("makePaymentButton").addEventListener("click", function() {
                $('#paymentModal').modal('show');
            });
            </script>
            <?php }?>

            <?php if ($row["paymentstatus"] == 2) {?>
            <center>
                <p class='badge text bg-primary'>Done</p>
            </center>
            <td> <a href="<?php run('/userinvoice', $routes)?>"><button class="btn btn-primary">Download
                        Form</button></a>
            </td>
            <?php }?> <?php

            if ($row["paymentstatus"] == 1) {
                ?> <center>
                <p class='badge text bg-warning'>Pending</p>
                <td><?php echo $row["bkashid"]; ?></td>
            </center>

            <?php }if ($row["paymentstatus"] == 0) {?>
            <button class="badge makepayment bg-info" id="makePaymentButton" data-toggle="modal"
                data-target="#paymentModal">Make Payment</button>
            <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <cernter>
                                <h5 class="modal-title" id="exampleModalLabel">Payment info</h5>
                            </cernter>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Bkash_Payment_INFO
                                জামাল উদ্দিন আহাম্মদ (সহকারী প্রধান শিক্ষক) : <br><br>
                                <center><mark>01927163143</mark></center>
                            </h3><br>
                            <center>
                                <h4><?php echo $row["payamount"]; ?>/- এই নম্বর এ বিকাশ করে ট্রান্সেকশন আইডি টি সাবমিট
                                    করুন । </h4>
                            </center>
                            <br>
                            <h4>
                                <p style="color:red">উল্লেখ : পেমেন্ট সম্পূর্ণ করার পরে আপনি আপনার ইনফরমেশন আর
                                    এডিট
                                    করতে
                                    পারবেন না ।</p>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form id="payform" method="post" action="/dashboard/users/regform.php"
                                enctype="multipart/form-data" class="px-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bkash Number</label>
                                    <input class="form-control" required type="number" name="bkashnumber" id="emailid"
                                        aria-describedby="emailHelp" Name placeholder="Bkash number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bkash Transection ID</label>
                                    <input class="form-control" required name="bkashid" id="emailid"
                                        aria-describedby="emailHelp" Name placeholder="Bkash Transection id">
                                </div>
                                <button data-bind="" name="bikassubmit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <script>
                        function showConfirmation() {
                            var isConfirmed = window.confirm("Are you sure you want to submit this form?");
                            if (isConfirmed) {
                                var form = document.getElementById("payform");
                                form.submit();
                            } else {
                                // If the user clicks "Cancel" in the confirmation dialog, do nothing or take any other action.
                            }
                        }
                        </script>
                        <?php

                if (isset($_POST["bikassubmit"])) {
                    $getid = $_SESSION["id"];
                    $bkashid = $_POST["bkashid"];
                    $bkashnumber = $_POST["bkashnumber"];
                    $sql = "UPDATE users_data set bkashid='$bkashid',bikasnumber='$bkashnumber',paymentstatus=1 where uid = $getid";
                    $db->insert($sql);
                    echo " <meta http-equiv='refresh' content='0'>";
                }

                ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            document.getElementById("makePaymentButton").addEventListener("click", function() {
                $('#paymentModal').modal('show');
            });
            </script>

            </td>
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <h6>Edit Data</h6>
                </button></td>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/dashboard/users/regform.php" enctype="multipart/form-data"
                                class="px-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input class="form-control" value="<?php echo $_SESSION["name"] ?>" name="name"
                                        id="emailid" aria-describedby="emailHelp" Name placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Father Name</label>
                                    <input class="form-control" value="<?php echo $row["fathername"] ?>"
                                        name="fathername" id="emailid" aria-describedby="emailHelp" Name
                                        placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CurrentJob</label>
                                    <input class="form-control" value="<?php echo $row["currentjob"] ?>"
                                        name="currentjob" id="emailid" aria-describedby="emailHelp" Name
                                        placeholder="Your Job">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Batch</label>
                                    <input class="form-control" value="<?php echo $row["batch"] ?>" name="batch"
                                        id="emailid" aria-describedby="emailHelp" Name placeholder="Your batch">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Present Address</label>
                                    <input class="form-control" value="<?php echo $row["presentaddress"]; ?>"
                                        name="presentaddress" id="emailid" aria-describedby="emailHelp" Name
                                        placeholder="Your Present Address">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Parmanent Address</label>
                                    <input class="form-control" value="<?php echo $row["parmanentaddress"]; ?>"
                                        name="parmanentaddress" id="emailid" aria-describedby="emailHelp" Name
                                        placeholder="Parmanent Address">
                                </div>
                                <div class="mb-3">
                                    <label for="imageInput" class="form-label">Update Image</label>
                                    <input type="file" name="image" class="form-control" id="imageInput"
                                        accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <img height="200" width="300" id="imagePreview"
                                        src="/dashboard/images/<?php echo $row["picture"]; ?>" alt="Image Preview"
                                        class="img-fluid">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Children</label>
                                    <input class="form-control" value="<?php echo $row["children"]; ?>" name="children"
                                        id="emailid" aria-describedby="emailHelp" Name placeholder="Children">
                                </div>
                                <button onclick="" data-bind="" name="submit" class="btn btn-primary">update</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php

                if (isset($_POST["submit"])) {
                    $id = $_SESSION["id"];
                    $name = $_POST["name"];
                    $fathername = $_POST["fathername"];
                    $batch = $_POST["batch"];
                    //$gender = $_POST["gender"];
                    $presentaddress = $_POST["presentaddress"];
                    $parmanentaddress = $_POST["parmanentaddress"];
                    $children = $_POST["children"];
                    $currentjob = $_POST["currentjob"];
                    $payamount = 700 + $children * 400;
                    $randomName = '';
                    $existingImagePath = $_SERVER['DOCUMENT_ROOT'] . '/dashboard/images/' . $row["picture"];

                    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        if (file_exists($existingImagePath)) {
                            $tempFile = $_FILES['image']['tmp_name'];
                            $randomName = 'image_' . uniqid() . '.jpg';
                            $targetFile = '../images/' . $randomName;
                            if ($_FILES["image"]["size"] > 500000) { // 500 KB in bytes
                                echo "<a style='color:red'>Sorry, your file is too large. It must be under 500 KB</a>";
                                exit();
                            }
                            if (move_uploaded_file($tempFile, $targetFile)) {

                                $sql = "UPDATE  users_data set batch='$batch',fathername='$fathername',presentaddress='$presentaddress',parmanentaddress='$parmanentaddress',children=$children,picture='$randomName',currentjob='$currentjob',payamount=$payamount where uid = $id";
                                unlink($existingImagePath);
                                $db->update($sql);
                                $getid = $_SESSION["id"];
                                $sql2 = "UPDATE  users set name='$name' where id=$getid";
                                $db->update($sql2);
                                $_SESSION["name"] = $name;
                                echo " <meta http-equiv='refresh' content='0'>";
                            } else {
                                echo "Image upload failed.";
                            }
                        } else {
                            echo "<a style='color:red'>No image selected or an error occurred.</a>";
                        }
                    } else {
                        $getid = $_SESSION["id"];
                        $sql = "UPDATE  users_data set batch='$batch',fathername='$fathername',presentaddress='$presentaddress',parmanentaddress='$parmanentaddress',children=$children,currentjob='$currentjob',payamount=$payamount where uid = $getid";
                        $db->update($sql);
                        $sql2 = "UPDATE  users set name='$name' where id=$getid";
                        $db->update($sql2);
                        $_SESSION["name"] = $name;
                        echo " <meta http-equiv='refresh' content='0'>";

                    }

                }

                ?>

        </tr>
        <?php }
            $result->free();?>
    </tbody>
</table>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");

    imageInput.addEventListener("change", function() {
        const file = imageInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            imagePreview.src = "";
        }
    });
});
</script>

<?php include '../extra/fotter.php';}} else {?>
<div class=" p-t-130 p-b-100 font-poppins">
    <center>
        <caption>
            <h1><b>MASUM ICT ACADEMY</b></h1>
        </caption>
    </center>
    <br>
    <style>
    .center {
        width: 688px;
        /* Adjust the width as needed */
        margin: 0 auto;
    }
    </style>
    <div class="wrapper center wrapper--w688">
        <div class="card card-4">
            <div class="card-body">
                <img src="/media/logo.jpg" align="right" height="130" width="130">

                <center>
                    <h3>
                        <p style="color:red">Registration Form</p>
                    </h3>
                </center>
                <br>

                <form method="POST" action="/dashboard/users/regform.php">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">first name</label>
                                <input class="input--style-4" type="text" value="<?php echo $_SESSION["name"] ?>"
                                    name="firstname" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">last name</label>
                                <input class="input--style-4" type="text" name="lastname" required>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Father Name</label>
                                <input class="input--style-4" type="text" name="fathername" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Mother Name </label>
                                <input class="input--style-4" type="text" name="mothername" required>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Present Address</label>
                                <input class="input--style-4" type="text" name="presentaddress" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Parmanent Address </label>
                                <input class="input--style-4" type="text" name="parmanentaddress" required>
                            </div>
                        </div>
                    </div>
                    <div class="row   ">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Birthday</label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" type="text" name="birthday" required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Gender</label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45">Male
                                        <input type="radio" checked="checked" value="male" name="gender" required>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">Female
                                        <input type="radio" value="female" name="gender" required>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row   ">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Phone Number</label>
                                <input class="input--style-4" max="11" type="text"
                                    value="<?php echo $_SESSION['phone']; ?>" name="phone" required>
                            </div>
                        </div>
                    </div>
                    <label class="label">Subject </label>
                    <style>
                    select[multiple] {
                        width: 200px;
                        /* Set your desired width */
                    }

                    select option:selected {
                        background-color: black;
                        color: white;
                    }
                    </style>
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script>
                    $(document).ready(function() {
                        $('select[multiple]').on('change', function() {
                            $('option:selected', this).css('background-color', 'black').css('color',
                                'white');
                            $('option:not(:selected)', this).css('background-color', '').css('color',
                                ''); // Reset other options
                        });
                    });
                    </script>
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select style="color:black" name="subject[]" multiple="multiple" size="4" required>
                                <option>ICT</option>
                                <option>Bangla</option>
                                <option>English</option>
                                <option>Physics</option>
                                <option>Biology</option>
                                <option>Math</option>
                                <option selected="selected">Chemistry</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>

                    <div class="input-group col-md-6">

                        <div>

                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="submit"
                                    required>Submit</button>
                            </div>
                </form>
                <?php
if (isset($_POST["submit"])) {
        $id = $_SESSION["id"];
        $fristname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $birthday = $_POST["birthday"];
        $gender = $_POST["gender"];
        $fathername = $_POST["fathername"];
        $mothername = $_POST["mothername"];
        $presentaddress = $_POST["presentaddress"];
        $parmanentaddress = $_POST["parmanentaddress"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $subject = $_POST["subject"];
        $subject = implode(',', $subject);
        $sql = "insert into users_data (uid,lastname,gender,fathername,mothername,presentaddress,parmanentaddress,birthday,email,phone,subject) values ($id,'$lastname','$gender','$fathername','$mothername','$presentaddress','$parmanentaddress','$birthday','$email','$phone','$subject')";
        $db->insert($sql);
        $sql2 = "update users set name='$fristname' where id = $id";
        $db->update($sql2);
        $_SESSION["name"] = $fristname;
        echo " <meta http-equiv='refresh' content='0'>";
    }
        ?>

            </div>
        </div>
    </div>
</div>



<?php
}
    include '../extra/fotter.php';
}
?>