<?php include '../extra/nav.php'?>

<?php
if ($_SESSION["uid"] == 1) {
//ini_set('display_errors', 1);

    ?>


<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <caption>
                    <h1><b>MASUM ICT ACADEMY</b></h1>
                </caption>
                <p color="red" class="title">Registration Form</p>
                <form method="POST">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">first name</label>
                                <input class="input--style-4" type="text" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">last name</label>
                                <input class="input--style-4" type="text" name="last_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
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
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Phone Number</label>
                                <input class="input--style-4" type="number" name="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="label">Subject</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="subject" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                <option>ICT</option>
                                <option>Bangla</option>
                                <option>English</option>
                                <option>Physics</option>
                                <option>Biology</option>
                                <option>Math</option>
                                <option>Chemistrty</option>

                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Password</label>

                        <input class="input--style-4" type="Password" placeholder="Enter your Password" name="Password"
                            required><br>
                        <div>

                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit" required>Submit</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php

}
?>


<?php include '../extra/fotter.php';?>