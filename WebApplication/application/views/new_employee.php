<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--    Head-->
    <?php include 'common/head.php' ?>
</head>
<body>
<div class="app" id="app">
    <!--    Sidebar-->
    <?php include 'common/aside.php' ?>
    <!--    Content-->
    <div id="content" class="app-content box-shadow-z0" role="main">
        <!--        Header-->
        <?php include 'common/header.php' ?>
        <div ui-view class="app-body" id="view">
            <!--            Content-->
            <div class="padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h2>New Employee</h2>
                                <small>New employee registration form.
                                </small>
                            </div>
                            <div class="box-divider m-a-0"></div>
                            <div class="box-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="padding">
                                                <div class="form-group row form-sub-group">
                                                    <small>Login</small>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputUsername" class="col-sm-2 form-control-label">Username</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputUsername"
                                                               placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-2 form-control-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="inputPassword"
                                                               placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="box-divider m-a-0"></div>
                                                </div>
                                                <div class="form-group row form-sub-group">
                                                    <small>Personal</small>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputFirstName" class="col-sm-2 form-control-label">First
                                                        name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputFirstName"
                                                               placeholder="First name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputMiddleName" class="col-sm-2 form-control-label">Middle
                                                        name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputMiddleName"
                                                               placeholder="Middle name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputLastName" class="col-sm-2 form-control-label">Last
                                                        name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputLastName"
                                                               placeholder="Last name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputDob" class="col-sm-2 form-control-label">Date of
                                                        birth</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputDob"
                                                               placeholder="Date of birth">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputGender"
                                                           class="col-sm-2 form-control-label">Gender</label>
                                                    <div class="col-sm-10">
                                                        <div class="radio radio-inline">
                                                            <label class="ui-check ui-check-md">
                                                                <input type="radio" name="a" checked="true" >
                                                                <i class="dark-white"></i>
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <label class="ui-check ui-check-md">
                                                                <input type="radio" name="a">
                                                                   <i class="dark-white"></i>
                                                                Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputNic"
                                                           class="col-sm-2 form-control-label">NIC</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputNic"
                                                               placeholder="NIC">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputProfilePicture"
                                                           class="col-sm-2 form-control-label">Profile picture</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row m-t-md">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn white">Register</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="padding">
                                                <div class="form-group row form-sub-group">
                                                    <small>Contact</small>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputTelephone" class="col-sm-2 form-control-label">Telephone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputTelephone"
                                                               placeholder="Telephone">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputAddress" class="col-sm-2 form-control-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputAddress"
                                                               placeholder="Address">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                           class="col-sm-2 form-control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail"
                                                               placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="box-divider m-a-0"></div>
                                                </div>
                                                <div class="form-group row form-sub-group">
                                                    <small>Role</small>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputRole"
                                                           class="col-sm-2 form-control-label">Role</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control c-select">
                                                            <option>Doctor</option>
                                                            <option>Receptionist</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Foot-->
<?php include 'common/foot.php' ?>
</body>
</html>