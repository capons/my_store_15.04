<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminPanel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
    <!--base style -->
    <link href="<?php echo base_url(); ?>style/admin_users.css" rel="stylesheet">
    <!--/base style -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php if($admin_header) echo $admin_header ;?>
    <!--end header -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Users</li>
                <li class="active">All users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!--MAIN CONTANT + all users data -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div><!-- /.box-header -->
                        <div class="row">
                            <div id="add_news_button" class="col-sm-6">
                                <label>
                                    <button id="admin_add_new_user" style="margin: 10px" type="button" class="btn btn-primary">New user</button>
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label style="float:right">
                                        <form method="post" class="sidebar-form">
                                            <div class="input-group">
                                                <input type="text" name="admin_search_user" class="form-control" placeholder="Search...">
                                                <span class="input-group-btn">
                                                    <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">

                            <!--table contains all user data -->
                            <table id="admin_users_data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($users_data)) {
                                    if ($this->uri->segment(3) == FALSE) {                //counter on the table row
                                        $num_rows = 1;
                                    }else {
                                        $num_rows = $this->uri->segment(3) + 1;
                                    }
                                    foreach ($users_data as $res) { ?>
                                        <tr class="row-store-news" id="row-user-data-<?php echo $res['id']; ?>">
                                            <td>
                                                <?php
                                                echo $num_rows;                          //display count of the table rows
                                                $num_rows++; ?>                          <!--increase the counter -->
                                            </td>
                                            <td><?php echo $res['name']; ?></td>
                                            <td><?php echo $res['email']; ?></td>
                                            <td><?php echo $res['tell']; ?></td>
                                            <td>
                                                <?php
                                                switch ($res['role']) {
                                                    case 1:
                                                        echo 'user';
                                                        break;
                                                    case 2:
                                                        echo 'advanced user';
                                                        break;
                                                    case 3:
                                                        echo 'moderator';
                                                        break;
                                                    case 4:
                                                        echo 'administrator';
                                                        break;
                                                    default:
                                                        echo 'default role';
                                                }
                                                ?>
                                            </td>
                                            <td class="row-news-button">
                                                <button id="user-edit-<?php echo $res['id']; ?>" onclick="send_edit_data(<?php echo $res['id']; ?>,'<?php echo $res['name']; ?>','<?php echo $res['pass']; ?>','<?php echo $res['email']; ?>','<?php echo $res['tell']; ?>','<?php echo $res['role']; ?>')" type="button" class="btn btn-primary btn-xs user-edit"><p>Edit</p></button>
                                                <button id="user-delete-<?php echo $res['id']; ?>" onclick="delete_user(<?php echo $res['id']; ?>)" type="button" class="btn btn-primary btn-xs user_delete"><p>Delete</p></button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>№</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Settings</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!--/table -->
                        </div><!-- /.box-body -->
                        <div style="display: flex;" class="row">
                            <div style="align-self: center" class="col-sm-5">
                                <div class="col-sm-12">
                                    <p style="margin: 0px">Showing 1 to 10 of <span><?php  echo $all_users_rows; ?></span> entries</p>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <!--FORM PAGINATION -->
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <!--Pagination link (->users/data) -->
                                    <?php echo $links; ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- footer-->
    <?php if($admin_footer) echo $admin_footer ;?>
    <!--end footer -->
    <!-- Control Sidebar -->
    <?php if($admin_control_sidebar) echo $admin_control_sidebar; ?>
    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
<!--Modal window (edit users data) -->
<div class="modal users">
    <div class="modal-content users">
        <button class="btn btn-primary close-modal">Close</button>
        <div style="margin-top: 10px" class="modal-head">
            <p id="info"></p>
        </div>
        <div class="modal-body">
            <!--form edit users data -->
            <form id="users_edit_form">
                <input class="form-control" id="modal_edit_user_id" type="hidden" name="modal_edit_user_id" value="">
                <div class="form-group">
                    <label>User name</label>
                    <input class="form-control" id="modal_edit_user_name" type="text" name="modal_edit_user_name" value="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" id="modal_edit_user_pass" type="password" name="modal_edit_user_pass" value="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" id="modal_edit_user_email" type="email" name="modal_edit_user_email" value="">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" id="modal_edit_user_tell" type="text" name="modal_edit_user_tell" value="">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="modal_edit_user_role" id="selected-role" class="form-control">
                        <option id="modal_edit_user_role"></option>
                        <option value="1">User</option>
                        <option value="2">Advanced user</option>
                        <option value="3">Moderator</option>
                        <option value="4">Administrator</option>
                    </select>
                </div>
                <button id="button_edit_user_data" style="line-height: 1" type="button" class="btn btn-primary">Edit</button>
            </form>
            <!--/form -->
            <!--add new user form -->
            <form id="add_new_user_form">
                <div class="form-group">
                    <label>User name</label>
                    <input class="form-control" id="modal_add_user_name" type="text" name="modal_add_user_name" value="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" id="modal_add_user_pass" type="password" name="modal_add_user_pass" value="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" id="modal_add_user_email" type="email" name="modal_add_user_email" value="">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" id="modal_add_user_tell" type="text" name="modal_add_user_tell" value="">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="modal_add_user_role" id="selected-new-role" class="form-control">
                        <option id="modal_add_user_role"></option>
                        <option value="1">User</option>
                        <option value="2">Advanced user</option>
                        <option value="3">Moderator</option>
                        <option value="4">Administrator</option>
                    </select>
                </div>
                <button id="button_add_user_data" style="line-height: 1" type="button" class="btn btn-primary">Add user</button>
            </form>
            <!--/form -->
        </div>
    </div>
</div><!--/modal -->
<!--modal delete_user -->
<div id="modal_delete_user_info" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="user_delete_info" style="text-align: center;font-weight: 700"></p>
            </div>
            <div class="modal-footer">
                <!--
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--/modal -->
<!--/Modal window -->
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!--Admin JS file -->
<script src="<?php echo base_url(); ?>js/admin_users.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
</body>
</html>
