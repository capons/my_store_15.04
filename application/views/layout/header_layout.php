<!--JS base_url GLOBAL -->
<script type="text/javascript">
    base_url = '<?=base_url()?>';
</script>
<!--shop basket icon -->
<div id="angel_basket" class="col-lg-1 col-md-1 col-sm-1 col-sx-1 shop_basket">
    <img src="<?php echo base_url(); ?>image/shop_basket.png">
    <?php if(isset($_SESSION['angel_basket'])){ ?> <!--display count goods in basket -->
        <span class="badge">
            <?php
            if(isset($_SESSION['angel_basket'])){
                echo count($_SESSION['angel_basket']); //show goods count in basket
            }
            ?>
        </span>
    <?php } ?>
</div>
<!--end shop pasket icon-->

<!--header layout -->
<section>
    <div class="container-fluid header">
        <div id="header-bg" class="row">
            <div id="header-decor" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">

            </div>
            <div id="header-content" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                <div id="header-content-info" class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                        <p>Украинские</p>
                        <p>ангелочки</p>
                        <p>интернет-магазин детских товаров</p>
                    </div>
                </div>
                <div id="footer_cloud" class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
                    <img alt="alt" src="<?php echo base_url(); ?>image/header_children.png">
                </div>
            </div>
        </div>
        <div id="header-menu-link-container" class="row">
            <div id="menu-link-decorline" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">

            </div>
            <nav id="navbar-container" class="navbar navbar-default">
                <div class="container-fluid nav">
                    <div class="navbar-collapse" id="bs-example-navbar-collapse-2">
                        <ul id="header-menu" class="nav navbar-nav">
                            <li >
                                <img id="header-heart-f" alt="disabled" src="<?php echo base_url(); ?>image/header_heart.png">
                                <a id="no-margin" class="header-link" href="<?php echo base_url(); ?>">Главная</a>
                            </li>
                            <li>
                                <img id="header-heart" alt="disabled" src="<?php echo base_url(); ?>image/header_heart.png">
                                <a id="no-margin" class="header-link" href="<?php echo base_url(); ?>services">Товары и услуги</a>
                            </li>
                            <li>
                                <img id="header-heart" alt="disabled" src="<?php echo base_url(); ?>image/header_heart.png">
                                <a id="no-margin" class="header-link" href="#">О нас</a>
                            </li>
                            <li>
                                <img id="header-heart" alt="disabled" src="<?php echo base_url(); ?>image/header_heart.png">
                                <a id="no-margin" class="header-link" href="<?php echo base_url(); ?>goods">Заказ и доставка</a>
                            </li>
                            <li>
                                <img id="header-heart" alt="disabled" src="<?php echo base_url(); ?>image/header_heart.png">
                                <a id="no-margin" class="header-link" href="<?php echo base_url(); ?>contacts">Контакты</a>
                            </li>
                            <li>
                                <img id="header-heart-l" alt="disabled" src="<?php echo base_url(); ?>image/header_heart.png">
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="menu-link-decorline" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">

            </div>
        </div>
    </div>
</section>