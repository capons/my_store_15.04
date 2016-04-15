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
    <link href="<?php echo base_url(); ?>style/admin_sales_orders_view.css" rel="stylesheet">
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
                        <ul id="order_details_ul" class="nav nav-tabs">
                            <li id="order_details" class="active">
                                <a style="padding: 10px" ><button style="border: none;background-color: inherit">Order Details</button></a>
                            </li>
                            <li id="order_product_details">
                                <a style="padding: 10px"><button style="border: none;background-color: inherit">Product</button></a>
                            </li>
                        </ul><!-- /.nav -->

                        <table id="order_detailes_show" style="margin-top: 20px" class="table table-bordered">
                            <?php
                            foreach($order_view[0] as $key=>$value){
                                if(!empty($value)) { //if array value (empty) do not display
                                    ?>
                                    <tr>
                                        <td style="width: 20%"><?php echo $key.':'; ?></td>
                                        <td><?php echo $value; ?></td>
                                    </tr>
                                    <?php
                                }
                            } ?>
                        </table><!-- /#order_detailes_show -->

                        <table id="order_product_show" style="margin-top: 20px" class="table table-bordered">
                            <tr>
                                <th>
                                    <p>Category</p>
                                </th>
                                <th>
                                    <p>Model</p>
                                </th>
                                <th>
                                    <p>Quantity</p>
                                </th>
                                <th>
                                    <p>Unit Price</p>
                                </th>
                                <th>
                                    <p>Total</p>
                                </th>
                            </tr>
                            <?php
                            $total_order_price = array(); // array containes all product sum price
                            foreach($order_view_product as $res) {
                                $total_order_price[] = $res['total'];
                                ?>
                                <tr>
                                    <td>
                                        <p><?php echo $res['categories'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $res['name'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $res['quantity'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo '$'.$res['price'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo '$'.$res['total'] ?></p>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td colspan="4">
                                    <p style="text-align: right">Total order price</p>
                                </td>
                                <td>
                                    <p>
                                        <?php
                                        if(!empty($total_order_price)){
                                            echo '$'.(array_sum($total_order_price));
                                        }
                                        ?>
                                    </p>
                                </td>
                            </tr>
                        </table><!-- /#order_detailes_show -->

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
