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
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <h2>Basic form</h2>
                                <small>Individual form controls receive some global styling. All textual &lt;input>,
                                    &lt;textarea>, and &lt;select> elements with .form-control are set to width: 100%;
                                    by default. Wrap labels and controls in .form-group for optimum spacing.
                                </small>
                            </div>
                            <div class="box-divider m-a-0"></div>
                            <div class="box-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                               placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <input type="file" id="exampleInputFile" class="form-control">
                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Check me out
                                        </label>
                                    </div>
                                    <button type="submit" class="btn white m-b">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <h2>Horizontal form</h2>
                                <small>Use Bootstrap's predefined grid classes to align labels and groups of form
                                    controls in a horizontal layout by adding .form-horizontal to the form. Doing so
                                    changes .form-groups to behave as grid rows, so no need for .row.
                                </small>
                            </div>
                            <div class="box-divider m-a-0"></div>
                            <div class="box-body">
                                <form role="form">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 form-control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail3"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 form-control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword3"
                                                   placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 form-control-label">File</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 form-control-label">Select</label>
                                        <div class="col-sm-10">
                                            <select class="form-control c-select">
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 form-control-label">Textarea</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-md">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn white">Sign in</button>
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