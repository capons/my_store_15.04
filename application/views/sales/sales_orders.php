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
    <link href="<?php echo base_url(); ?>style/admin_sales_orders.css" rel="stylesheet">
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
                <?php if($this->uri->segment(1)){echo  ucfirst(strtolower($this->uri->segment(1)));}?>          <!--echo name of "$this->uri->segment(1)" -->
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><?php if($this->uri->segment(1)){echo  ucfirst(strtolower($this->uri->segment(1)));}?></li>                 <!--echo name of "$this->uri->segment(1)" -->
                <li class="active"><a href="<?php echo base_url(); ?>sales/orders"><?php if($this->uri->segment(1)){echo  ucfirst(strtolower($this->uri->segment(2)));} ?></a></li>  <!--echo name of "$this->uri->segment(2)" -->
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!--MAIN CONTANT + ORDERS -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-lg-3">
                                    <span style="margin-right: 5px" class="glyphicon glyphicon-th-list"></span>
                                    <h3 class="box-title">Order list</h3>
                                </div>
                                <div class="col-lg-9">

                                </div>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="well"> <!--orders filter -->
                                <div class="row">
                                    <form onsubmit="return filter_check()" id="filter-order-form" method="post">
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <!--<form id="filter-form-first">-->
                                                <div class="form-group">
                                                    <label>Order id</label>
                                                    <input name="order_id" type="text" class="form-control" placeholder="Order id">
                                                </div>
                                                <div class="form-group">
                                                    <label>Customer</label>
                                                    <input name="customer" type="text" class="form-control" placeholder="Customer">
                                                </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                           <!-- <form id="filter-form-second"> -->
                                                <div class="form-group">
                                                    <label>Order status</label>
                                                    <select name="order_status" class="form-control">
                                                        <option></option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input name="filter_total" type="text" class="form-control"  placeholder="Total">
                                                </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                           <!-- <form id="filter-form-third">-->
                                                <div class="form-group">
                                                    <label>Date Added</label>
                                                    <div class="input-group">
                                                        <input name="date_add" id="filter-date-add" type="date"  class="form-control" placeholder="Date added">
                                                        <span style="margin: 0px;padding: 0px" class="input-group-addon"><button id="filter-d-add" data-datepick="rangeSelect: false, minDate: 'new Date()'"  type="button" style="border: none;padding: 8px;"><span class="glyphicon glyphicon-calendar"></span></button></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Modified</label>
                                                    <div class="input-group">
                                                        <input name="date_modify" id="filter-date-mod"  type="date" class="form-control" placeholder="Date modified">
                                                        <span style="margin: 0px;padding: 0px" class="input-group-addon"><button id="filter-d-mod" data-datepick="rangeSelect: false, minDate: 'new Date()'"  type="button" style="border: none;padding: 8px;"><span class="glyphicon glyphicon-calendar"></span></button></span>
                                                    </div>
                                                </div>
                                        </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <button name="order_filter_button" id="filter-orders-b" style="float: right" class="btn btn-primary btn-sm" type="submit"><!--form filter send form button -->
                                                    <span style="margin-right: 3px" class="glyphicon glyphicon-search"></span>Filter
                                                </button>
                                            </div>
                                    </form><!-- </form>-->
                                </div><!--.row -->
                            </div> <!--end orders filter -->
                            <!--table contains all user data -->
                            <table id="admin_users_data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Order id</th>
                                    <th>Costumer</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Date Added</th>
                                    <th>Date Modified</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($user_orders)) {
                                    if ($this->uri->segment(3) == FALSE) {                //counter on the table row
                                        $num_rows = 1;
                                    }else {
                                        $num_rows = $this->uri->segment(3) + 1;
                                    }
                                    foreach ($user_orders as $res) { ?>                  <!--$user_orders (order row information) -->
                                        <tr class="row-store-news" id="row-user-data-<?php echo $res['order_id']; ?>">
                                            <td>
                                                <?php
                                                echo $num_rows;                          //display count of the table rows
                                                $num_rows++; ?>                          <!--increase the counter -->
                                            </td>
                                            <td><?php echo $res['order_id']; ?></td>
                                            <td><?php echo $res['customer']; ?></td>
                                            <td><?php echo $res['order_status']; ?></td>
                                            <td><?php echo number_format((float)$res['sum'], 2, '.', ''); ?></td>  <!--round order sum -->
                                            <td>
                                                <?php echo $res['date_add']; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($res['date_modify'] == '0000-00-00'){ //if date have no data - echo empty string
                                                    echo '';
                                                } else {
                                                    echo $res['date_modify'];
                                                }
                                                ?>
                                            </td>
                                            <td class="row-news-button">
                                                <form style="display: inline-block" method="GET">
                                                    <input name="order" type="hidden" value="<?php echo $res['order_id'] ?>">
                                                    <button id="order-view-<?php echo $res['order_id'] ?>" type="submit" class="btn btn-primary btn-xs user-view"><p>View</p></button>
                                                </form>
                                                <button id="user-edit-<?php echo $res['order_id']; ?>" onclick="send_edit_data(<?php echo $res['order_id']; ?>,'<?php echo $res['order_status']; ?>')" type="button" class="btn btn-primary btn-xs user-edit"><p>Edit</p></button>
                                                <button id="user-delete-<?php echo $res['order_id']; ?>" onclick="delete_order(<?php echo $res['order_id']; ?>,'<?php echo $res['order_status']; ?>')" type="button" class="btn btn-primary btn-xs user_delete"><p>Delete</p></button>
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
                                    <th>Order id</th>
                                    <th>Costumer</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Date Added</th>
                                    <th>Date Modified</th>
                                    <th>Settings</th>
                                </tr>
                                </tfoot>
                            </table>
                            <!--/table -->

                        </div><!-- /.box-body -->
                        <div style="display: flex;" class="row">
                            <div style="align-self: center" class="col-sm-5">
                                <div class="col-sm-12">
                                    <p style="margin: 0px">Showing 1 to 10 of <span><?php if(isset($all_orders)){ echo $all_orders; }  ?></span> entries</p>
                                </div>
                            </div>
                            <div class="col-sm-7">

                                <!--FORM PAGINATION -->
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <!--PAGINATION Link (->news/data) -->
                                    <?php  echo $links; ?>
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
<div id="modal-admin-orders-info" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="admin-orders-info" style="text-align: center;font-weight: 700"></p>
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
<!--Modal window (edit/delete orders) -->
<div class="modal users">
    <div class="modal-content users">
        <button class="btn btn-primary close-modal">Close</button>
        <div style="margin-top: 10px" class="modal-head">
            <p id="info"></p>
        </div>
        <div class="modal-body">
            <!--form edit orders data -->
            <form id="users_edit_form">
                <input class="form-control" id="modal_edit_user_id" type="hidden" name="edit_order_id" value="">
                <input class="form-control" id="edit_order_date" type="hidden" name="edit_order_date" value="<?php echo date("Y-m-d H:i:s"); ?>">
                <div class="form-group">
                    <label>Status</label>
                    <select name="edit_order_status" id="selected-role" class="form-control">
                        <option id="modal_edit_user_role"></option>
                        <option id="paid" value="Paid">Paid</option>
                        <option id="not_paid" value="Not paid">Not paid</option>
                    </select>
                </div>
                <button id="button_edit_user_data" style="line-height: 1" type="button" class="btn btn-primary">Edit</button>
            </form>
            <!--/form -->
        </div>
    </div>
</div><!--/modal -->
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
<script src="<?php echo base_url(); ?>js/admin_orders.js"></script>

<!--CALENDAR -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>libs/calendar/jquery.datepick.css">
<script type="text/javascript" src="<?php echo base_url(); ?>libs/calendar/jquery.plugin.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>libs/calendar/jquery.datepick.js"></script>
<!--/CALENDAR -->

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
