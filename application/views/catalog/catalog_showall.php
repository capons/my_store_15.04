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
    <link href="<?php echo base_url(); ?>style/catalog_showall.css" rel="stylesheet">
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
                <li class="active"><a href="<?php echo base_url(); ?>catalog/showall">All product</a></li>  <!--echo name of "$this->uri->segment(2)" -->
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
                                    <h3 class="box-title">Catalog list</h3>
                                </div>
                                <div class="col-lg-9">

                                </div>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="well"> <!--orders filter -->
                                <div class="row">
                                    <form onsubmit="return filter_check()" id="filter-product-form" method="post">
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <!--<form id="filter-form-first">-->
                                            <div class="form-group">
                                                <label>Product name</label>
                                                <input name="ad_product_name" type="text" class="form-control" placeholder="Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Model</label>
                                                <input name="ad_product_model" type="text" class="form-control" placeholder="Model">
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <!-- <form id="filter-form-second"> -->
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input name="ad_product_price" type="text"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input name="ad_product_quantity" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <!-- <form id="filter-form-second"> -->
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="ad_product_cat" class="form-control">
                                                    <option></option>
                                                    <?php
                                                    if (isset($goods_categories)) {
                                                        foreach ($goods_categories as $res) {
                                                            ?>
                                                            <option
                                                                value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <button name="product_filter_button" id="filter-product-b" style="float: right" class="btn btn-primary btn-sm" type="submit"><!--form filter send form button -->
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
                                    <th>
                                        <form>
                                            <input type="checkbox">
                                        </form>
                                    </th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Model</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($all_product)) {
                                    foreach ($all_product as $res) { ?>                  <!--$user_orders (order row information) -->
                                        <tr class="row-store-news" id="row-user-data-<?php  echo $res['stock_id']; ?>">
                                            <td style="vertical-align: middle">
                                                <form>
                                                    <input type="checkbox">
                                                </form>
                                            </td>
                                            <td><img style="width: 50px" src="<?php echo base_url(); ?><?php echo THUMBS.$res['image_name']; ?>" alt="alt"></td> <!--THUMBS define in config/constants -->
                                            <td style="vertical-align: middle"><?php echo $res['name']; ?></td>
                                            <td style="vertical-align: middle"><?php echo $res['model']; ?></td>
                                            <td style="vertical-align: middle"><?php echo $res['price']; ?></td>  <!--round order sum -->
                                            <td style="vertical-align: middle">
                                                <?php echo $res['quantity']; ?>
                                            </td>
                                            <td style="vertical-align: middle" class="row-news-button">
                                                <button id="product-edit-<?php echo $res['stock_id']; ?>" onclick="send_edit_data(<?php echo $res['stock_id']; ?>,'<?php echo $res['name']; ?>', '<?php echo $res['model']; ?>','<?php echo $res['description']; ?>', '<?php  echo $res['price']; ?>', '<?php echo $res['quantity']; ?>')" type="button" class="btn btn-primary btn-xs user-edit"><p style="margin: 0px">Edit</p></button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                            <!--/table -->

                        </div><!-- /.box-body -->
                        <div style="display: flex;" class="row">
                            <div style="align-self: center" class="col-sm-5">
                                <div class="col-sm-12">
                                    <p style="margin: 0px">Showing 1 to 5 of <span><?php if(isset($all_product_rows)) { echo $all_product_rows; } ?></span> entries</p>
                                </div>
                            </div>
                            <div class="col-sm-7">

                                <!--FORM PAGINATION -->
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <!--PAGINATION Link (->news/data) -->
                                    <?php if(isset($links)) { echo $links; } ?>
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
<div id="modal-admin-orders-error-info" class="modal fade" tabindex="-1" role="dialog"> <!--modal to show error information to user -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title"></h4>
            </div>
            <div id="admin-orders-error-info" class="modal-body">
                <?php
                if(isset($stock_save_info)){
                    echo $stock_save_info;
                }
                $img_upload_error = $this->session->flashdata('stock_save_info');
                if(isset($img_upload_error)){
                    echo $img_upload_error;
                    $this->session->unset_userdata('stock_save_info');
                }
                ?>
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
            <form id="product_edit_form">
                <input class="form-control" id="edit_product_id" type="hidden" name="edit_product_id">
                <input class="form-control" id="edit_product_date" type="hidden" name="edit_product_date" value="<?php echo date("Y-m-d H:i:s"); ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" id="edit_product_name" name="edit_product_name">
                </div>
                <div class="form-group">
                    <label>Model</label>
                    <input class="form-control" id="edit_product_model" name="edit_product_model">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input class="form-control" id="edit_product_desc" name="edit_product_desc">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" id="edit_product_price" name="edit_product_price">
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input class="form-control" id="edit_product_quantity" name="edit_product_quantity">
                </div>
                <button id="button_edit_product_data" style="line-height: 1" type="button" class="btn btn-primary">Edit</button>
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
<script src="<?php echo base_url(); ?>js/catalog_showall.js"></script>

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
