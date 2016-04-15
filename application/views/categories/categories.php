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
    <link href="<?php echo base_url(); ?>style/categories.css" rel="stylesheet">

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
                Categories
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Categories</li>
                <li class="active"><a href="<?php echo base_url(); ?>categories/main">Main</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!--MAIN CONTANT -->


            <!--MAIN CONTANT + ORDERS -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-lg-3">
                                    <span style="margin-right: 5px" class="fa fa-files-o"></span>
                                    <h3 class="box-title">Categories append</h3>
                                </div>
                                <div class="col-lg-9">

                                </div>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="well"> <!--orders filter -->
                                <div class="row">
                                    <form onsubmit="return validate_goods_add();" id="new-goods-form" method="post" enctype="multipart/form-data"> <!--enctype for multiple upload -->
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label>Category name</label>
                                                <input name="new_category_name" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Parent category</label>
                                                <select name="parent_category" class="form-control">
                                                    <option></option>
                                                    <?php
                                                    if (isset($parent_categories)) {
                                                        foreach ($parent_categories as $res) {
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
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label>Category description</label>
                                                <textarea style="height: 108px" name="new_category_desc" class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <button name="new_cat_button" id="new_cat_button" style="float: left" class="btn btn-primary btn-sm" type="submit"><!--form filter send form button -->
                                                <span style="margin-right: 3px" class="glyphicon glyphicon-plus"></span>Append
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
                                    <th>Category name</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($parent_child_categories)) {
                                    foreach ($parent_child_categories as $res) { ?>                  <!--$user_orders (order row information) -->
                                        <tr class="row-store-news" id="row-user-data-<?php echo $res['childId']; ?>">
                                        <td style="vertical-align: middle">
                                            <form>
                                                <input type="checkbox">
                                            </form>
                                        </td>
                                        <td style="vertical-align: middle"><?php if(empty($res['parentName'])) { ?><a href="<?php echo base_url(); ?>categories/main"><?php echo $res['childName'];?></a><?php } else { echo $res['parentName'].'&emsp;'.'>'.'&emsp;' ?><a href="<?php echo base_url(); ?>categories/main"><?php echo $res['childName']; ?></a><?php }; ?></td>
                                    <td style="vertical-align: middle" class="row-news-button">
                                        <button id="product-edit-<?php echo $res['childId']; ?>" onclick="send_edit_data(<?php echo $res['childId']; ?>,'<?php echo $res['childName']; ?>')"  type="button" class="btn btn-primary btn-xs user-edit"><p style="margin: 0px">Edit</p></button>
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
                                    <p style="margin: 0px">Showing 1 to <?php  echo count($parent_child_categories); ?> of <span><?php if (isset($all_cat_count)){ echo $all_cat_count; }  ?></span> entries</p>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <!--PAGINATION Link (->categories/main) -->
                                <?php if(isset($links)) { echo $links; } ?>
                            </div>
                        </div>
                    </div><!-- /.box -->
                    <div class="box"> <!-- .box  (Show parent category tree)-->
                        <div class="box-header">
                            <div class="row">
                                <div class="col-lg-4">
                                    <span style="margin-right: 5px" class="glyphicon glyphicon-random"></span>
                                    <h3 class="box-title">Categories tree</h3>
                                </div>
                                <div class="col-lg-8">

                                </div>
                            </div>
                            <div style="margin-top: 10px" class="row">
                                <div class="col-lg-4">
                                    <span style="margin-right: 5px" class="glyphicon glyphicon-hand-right"></span>
                                    <h3 class="box-title">Drag and drop to change the tree</h3>
                                </div>
                                <div class="col-lg-8">

                                </div>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="well">
                                <!--show category tree -->
                                <div id="cat_tree_div" class="row">
                                    <?php
                                    if(isset($tree)){         //category-tree recursiv function category/main
                                        echo $tree;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div> <!-- /.box-body -->
                    </div>
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
<!--Start modal window section -->
<!--Modal window (edit/delete orders) -->
<div class="modal users">
    <div class="modal-content users">
        <button class="btn btn-primary close-modal">Close</button>
        <div style="margin-top: 10px" class="modal-head">
            <p id="info"></p>
        </div>
        <div class="modal-body">
            <!--form edit orders data -->
            <form id="category_edit_form">
                <input class="form-control" id="edit_category_id" type="hidden" name="edit_category_id">
                <div class="form-group">
                    <label>Category name</label>
                    <input class="form-control" id="edit_category_name" name="edit_category_name">
                </div>
                <button id="button_edit_product_data" style="line-height: 1" type="button" class="btn btn-primary">Edit</button>
            </form>
            <!--/form -->
        </div>
    </div>
</div><!--/modal -->
<div id="modal-admin-orders-info" class="modal fade" tabindex="-1" role="dialog"> <!--modal to show information to user -->
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
                if(isset($user_info)){
                    echo $user_info;
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
<!--modal shaw change category parent -->
<div id="modal_edit_cat_parent" class="modal fade" tabindex="-1" role="dialog">
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
<!--End modal window section -->
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!--Admin JS file -->
<script src="<?php echo base_url(); ?>js/categories.js"></script>
<script src="<?php echo base_url(); ?>libs/jquery_sortable_list/jquery-sortable-lists.js"></script> <!--libs sortable category -->

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
