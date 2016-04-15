<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>style/main_complete_pp.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>js/main_complete_pp.js"></script>
    <!--libs for input mask -->
    <script src="<?php echo base_url(); ?>libs/jquery_masked_library/src/jquery.maskedinput.js" type="text/javascript"></script>
</head>
<body>
<div id="order-complete-m" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div style="width: 700px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button style="margin-top: 3px;" type="button" class="close" id="close-complete" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php if(!isset($user_info)) { ?> <!--true if payment error == false -->
                    <h4 style="text-align: center;" class="modal-title">Спасибо за покупку <?php if(isset($b_name)) echo $b_name; ?>, пожалуйста запомните номер вашего заказа</h4>
                <?php } ?>
            </div>
            <?php if(!isset($user_info)) { ?> <!--true if payment error == false -->
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="text-align: center;font-size: 33px;">Номер заказа</th>
                        </tr>
                        <tr>
                            <td style="font-weight: 700;font-size: 33px;text-align: center"><?php if(isset($b_order))  echo $b_order;  ?></td>
                        </tr>
                    </table>
                </div>
            <?php } else { ?>
                <div id="admin-orders-error-info" class="modal-body">
                    <?php
                    if(isset($user_info)){
                        echo $user_info;
                    }
                    ?>
                </div>
            <?php } ?>
            <div class="modal-footer">
                <!--
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<!--
<div id="modal-admin-orders-error-info" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
-->

</body>
</html>