<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bshop</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Parisienne' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>style/new_style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>js/main_angel.js"></script>
    <!--libs for input mask -->
    <script src="<?php echo base_url(); ?>libs/jquery_masked_library/src/jquery.maskedinput.js" type="text/javascript"></script>
    <!--JS base_url GLOBAL -->
    <script type="text/javascript">
        base_url = '<?=base_url()?>';
    </script>
    <!--shop basket icon -->
</head>
<body>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <p class="no-margin w-title"><span style="color:red">b</span>Shop</p>
            </div>
            <div id="basket-wreaper" class="col-lg-8">
                <ul>
                    <li>
                        <button id="s-join" class="btn b_full_container">Join</button>
                    </li>
                    <li>
                        <?php
                        if(!isset($_SESSION['marker']['user'])) {
                            ?>
                            <button id="s-sign-in" class="btn b_full_container">Sign in</button>
                            <?php
                        } else { ?>
                            <form style="height: 100%" method="post" action="main/logout" class="form-horizontal">
                                <input type="hidden" class="form-control"  name="s-log-out" value="<?php echo $_SESSION['marker']['user']['id'] ?>">
                                <button type="submit" id="s-log-out" class="btn b_full_container">Log out</button>
                            </form>

                        <?php
                        }
                        ?>
                    </li>
                    <li>
                        <button id="s-shop-bag" class="btn b_full_container"><p class="no-margin"><span id="angel_basket">Shopping Bag</span><span id="b-t-order">
                                    (
                                    <?php
                                    if(isset($_SESSION['angel_basket'])){
                                        echo '<span style="margin-left: -3px;">';
                                        echo count($_SESSION['angel_basket']); //show goods count in basket
                                        echo '</span>';
                                    } else {
                                        echo '<span style="margin-left: -3px;">';
                                        echo 0;
                                        echo '</span>';
                                    }
                                    ?>
                                    )</span><span id="shop_bag"></span></p>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--
    <div style="margin-right: 0px" class="row">
        <div id="nav-wreaper" class="col-xs-12">
            <div class="container">
                <nav style="padding-left: 9px;" class="navbar navbar-default no-margin">
                    <div class="container-fluid no-padding">
                        <!-- Brand and toggle get grouped for better mobile display -->
    <!--
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
    <!--
                        <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a  href="#">Link </a></li>
                                <li><a href="#">Link</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
     <!--               </div><!-- /.container-fluid -->
      <!--          </nav>
            </div>
        </div>
    </div>-->
</header>

