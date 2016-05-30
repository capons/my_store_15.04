


<!--header-->
<?php if($header) echo $header; ?>
<!--end header -->
<!--modal window -->
<?php if($modal_window) echo $modal_window; ?>
<!-- ./modal window-->
<!--carusel section -->
<section>
    <div id="main-carusel" class="carousel slide sl-head" data-ride="carousel" > <!--data-interval="true" (disabled carusel auto slide) -->
        <!-- Indicators -->
        <!--
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        -->

        <!-- Wrapper for slides -->
        <div class="carousel-inner sl-head" role="listbox">
            <!-- First slide-->
            <?php
            if (isset($carusel_data)) {
                $isFirst = true; //variable to corect display carusel "active" clase
                foreach($carusel_data as $car_data) {
                    ?>
                    <div class="item wrapper-sl-head <?php if($isFirst === true) {echo 'active';} ?>">
                        <!--
                        <img style="min-height: 536px;" src="image/carusel_bg.png" alt="...">
                        -->
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-xs-6 carusel-left-wrapper">
                                    <div class="col-xs-12 sl-head-captive-wrapper">
                                        <p class="no-margin header-carisel-slide-t-c">We offer the best fashion
                                            decisions</p>
                                        <p class="header-carusel-slide-t-f">We'll make you better</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 carusel-right-wrapper">
                                    <div class="col-xs-12">
                                        <!--
                                        <img src="<?php// echo base_url(); ?>image/carusel-main-img.png" alt="..." class="img-circle image_full_w">
                                        -->
                                        <img src="<?php echo base_url(); ?>stock_image/thumbs/<?php echo $car_data['image_name']; ?>" alt="..." class="img-circle image_full_w">
                                        <div class="carusel-price-bl">
                                            <div class="carusel-product-details">
                                                <p class="no-margin"><?php if (mb_strlen($car_data['name'], 'UTF-8') > 15){ echo mb_substr($car_data['name'], 0, 15).'...';} else { echo $car_data['name']; } ?></p>
                                                <p class="no-margin"><?php echo $car_data['price']; ?> грн</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $isFirst = false; //change variable in the end of loop , for correctly display carusel
                }
            }
            ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#main-carusel" role="button" data-slide="prev">
            <span class="car_left_control" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#main-carusel" role="button" data-slide="next">
            <span class="car_right_control" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> <!-- ./carusel-->
</section>
<!--search section -->
<section class="s-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <form id="search-form" method="get" class="form-horizontal s-form">
                    <div class="form-group has-success has-feedback no-margin">
                        <label  class="control-label col-lg-3 s-label">SEARCH PRODUCT</label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input name="goods_search" type="search" class="form-control s-m-input" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                                <span class="input-group-addon no-padding no-border"><button class="no-padding no-border s-b-search"></button></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-4 s-control-wrapper">
                <button class="s-control-b-full">
                </button>
                <button class="s-control-b-mult">
                </button>
            </div>
        </div>
    </div>
</section>
<!--content -->
<section class="content-wrapper">
    <div class="container">
        <div class="row main-c-row">
            <!--product menu-->
            <div class="col-md-3">
                <div class="content-menu-t-wrapper">
                    <ul class="c-p-menu-title">
                        <li><p class="no-margin">PRODUCTS MENU</p></li>
                    </ul>
                    <ul class="c-p-main-menu">
                        <?php
                        if(isset($parent_categories)) {   //category name list
                            foreach ($parent_categories as $res) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>main/angel/<?php echo $res['code'].'/'.$res['id']; ?>" class="no-margin"><span class="menu-dot"></span><?php if (mb_strlen($res['name'], 'UTF-8') > 30){ echo mb_substr($res['name'], 0, 30).'...';} else { echo $res['name']; } ?><span class="p-menu-h-line" style="width: 3px;height: 36px;position: absolute;top:0px;right:0px;background-color: inherit;display: inline-block"></span></a>
                                </li>
                            <?php }
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-xs-12 no-padding c-review-wrapper">
                    <p class="happy-clients-t">OUR HAPPY CLIENTS</p>
                    <div class="col-xs-12 no-padding review-body">
                        <p class="no-margin c-review-text">
                            I am happy to see that fast web store!!!!!
                        </p>
                        <img class="c-review-arrow" src="<?php echo base_url(); ?>image/client-say-arrow1.png" alt="alt">
                    </div>
                </div>
                <div class="col-xs-12 no-padding c-review-name-body">
                    <p class="no-margin"><span class="client-icon"></span>Bogdan Dvinin, test company.</p>
                </div>
            </div>
            <!--product block -->
            <div class="col-md-9 main-product-wrapper">
                <div class="col-lg-12">
                    <p class="popular-product-p"><span>POPULAR</span> PRODUCTS NOW</p>
                </div>
                <!--Popular product -->
                <div class="col-lg-12 product-content-body">
                    <?php
                    //for($i=0 ; $i <=5 ; $i++) {
                        ?>
                    <?php
                    if(isset($shop_product)) {
                        foreach ($shop_product as $res) {
                            ?>
                            <div class="col-xs-4 no-padding product-presentation-body">
                                <!--product image -->
                                <div style="text-align: center;" class="col-xs-12 product-image-body">
                                        <img onclick="product_view(<?php echo $res['stock_id']; ?>)" class="img-thumbnail cont-m-image" src="<?php echo base_url(); ?><?php echo THUMBS.$res['image_name'];  ?>">
                                    <?php if($res['quantity'] == 0) { ?>
                                        <span class="label label-danger pr-end">Нет в наличии</span>
                                        <?php
                                    } ?>
                                </div>
                                <!--product title -->
                                <div class="col-xs-12 product-title">
                                    <a style="cursor: pointer" onclick="product_view(<?php echo $res['stock_id']; ?>)"><?php if (mb_strlen($res['name'], 'UTF-8') > 15){ echo mb_substr($res['name'], 0, 15).'...';} else { echo $res['name']; } ?></a>
                                </div>
                                <div class="product-bottom-line">
                                    <!--Border line -->
                                </div>
                                <div class="col-xs-12 no-padding">
                                    <div class="col-lg-6 no-padding">

                                        <div class="product-r-border">
                                            <!--Border line -->
                                        </div>
                                        <!--product price -->
                                        <p class="product-price"><?php echo $res['price']; ?> грн</p>
                                    </div>
                                    <div class="col-lg-6 no-padding product-buy-body">
                                        <!--
                                        <button></button>
                                        -->
                                        <form action="<?php echo base_url(); ?>main/basket" method="post"> <!--send form to basket controller -->
                                            <input type="hidden" name="add_to_basket" value="<?php echo $res['stock_id'].'|'.$res['name'].'|'.$res['quantity'].'|'.$res['price'].'|'.$res['image_name']; ?>">
                                            <input type="hidden" name="goods_url" value="<?php echo $this->uri->uri_string(); ?>">  <!--pass the URL of the page to the correct redirect -->
                                            <?php if($res['quantity'] > 0) { ?>
                                                <button class="bshop-b-b"  type="submit"></button>
                                            <?php } else { ?>
                                                <button class="bshop-b-b"  style="cursor: no-drop;opacity: 0.5" type="button" disabled></button>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <!--Goods pagination link -->
                    <div class="col-sx-12" >
                        <?php
                        if (!empty($this->uri->segment(4))) {
                            if(isset($links)) {
                                echo $links; //pagination
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>



    <!-- basket buyer modal -->
    <?php if($basket_view) echo $basket_view; ?>
    <!-- end basket modal -->
</section>
<!--end content -->
<!-- shop basket view-->
<?php if($basket_view) echo $basket_view; ?>
<!-- ./shop basket view-->
<!--section footer -->
<?php if($footer) echo $footer ;?>
<!--end section footer -->
</body>
</html>