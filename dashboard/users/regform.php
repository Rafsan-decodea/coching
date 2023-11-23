<?php include '../extra/nav.php'?>

<?php
if ($_SESSION["uid"] == 1) {
//ini_set('display_errors', 1);
$uid = $_SESSION["uid"];
$sql = "SELECT * from users_data where uid = $uid ";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    ?>

Registration Succesfully Done 

<?php include '../extra/fotter.php'; } else { ?>
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
                                <input class="input--style-4" type="text" value="<?php echo $_SESSION["name"]?>" name="firstname" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">last name</label>
                                <input class="input--style-4" type="text" name="lastname" required>
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
                                        <input type="radio" checked="checked" name="gender" required>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">Female
                                        <input type="radio" name="gender" required>
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
                                <input class="input--style-4" max="11" type="text" name="phone" required>
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
                                <option >ICT</option>
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
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="submit" required>Submit</button>
                            </div>
                </form>
                <?php 
                  if(isset($_POST["submit"])){
                        $id = $_SESSION["id"];
                        $fristname = $_POST["firstname"];
                        $lastname = $_POST["lastname"];
                        $birthday = $_POST["birthday"];
                        $gender = $_POST["gender"];
                        $email = $_POST["email"];
                        $phone = $_POST["phone"];
                        $subject = $_POST["subject"];
                        $subject = implode(',', $subject);
                        $sql = "insert into users_data (uid,lastname,gender,birthday,email,phone,subject) values ($id,'$lastname','$gender','$birthday','$email','$phone','$subject')";
                        $db->insert($sql);
                        $sql2 = "update users set name='$fristname' where id = $id";
                        $db->update($sql2);
                        $_SESSION["name"]= $fristname;
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