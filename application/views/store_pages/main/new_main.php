


<!--header-->
<?php if($header) echo $header ;?>
<!--end header -->
<!--carusel section -->
<section>
    <div id="carousel-example-generic" class="carousel slide sl-head" data-ride="carousel" data-interval="false">
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
            <div  class="item wrapper-sl-head active">
                <!--
                <img style="min-height: 536px;" src="image/carusel_bg.png" alt="...">
                -->
                <div class="carousel-caption">
                    <div class="row">
                        <div class="col-xs-6 carusel-left-wrapper">
                            <div class="col-xs-12 sl-head-captive-wrapper">
                                <p class="no-margin header-carisel-slide-t-c">We provide worlds</p>
                                <p class="no-margin header-carisel-slide-t-c">Top fashion for less</p>
                                <p class="no-margin header-carisel-slide-t-c">fashionpress.</p>
                                <p class="header-carusel-slide-t-f">FashionPress the name of hi class fashion web.</p>
                            </div>
                        </div>
                        <div class="col-xs-6 carusel-right-wrapper">
                            <div class="col-xs-12">
                                <img  src="image/carusel-main-img.png" alt="..." class="img-circle image_full_w">
                                <div class="carusel-price-bl">
                                    <div class="carusel-product-details">
                                        <p class="no-margin">Product name</p>
                                        <p class="no-margin">price $</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Second Slide -->
            <div style="min-height: 536px;height: 536px;" class="item">
                <!--
                <img src="..." alt="...">
                -->
                <div class="carousel-caption">
                    1234556456456
                </div>

            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="car_left_control" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="car_right_control" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<!--search section -->
<section class="s-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <form action="" method="get" class="form-horizontal s-form">
                    <div class="form-group has-success has-feedback no-margin">
                        <label  class="control-label col-lg-3 s-label">SEARCH PRODUCT</label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" class="form-control s-m-input" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
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
        <div class="row">
            <!--product menu-->
            <div class="col-sm-3">
                <div class="content-menu-t-wrapper">
                    <ul class="c-p-menu-title">
                        <li><p class="no-margin">PRODUCTS MENU</p></li>
                    </ul>
                    <ul class="c-p-main-menu">
                        <?php
                        if(isset($parent_categories)) {   //category name list
                            foreach ($parent_categories as $res) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>main/angel/<?php echo $res['code'].'/'.$res['id']; ?>" class="no-margin"><span class="menu-dot"></span><?php if (mb_strlen($res['name'], 'UTF-8') > 40){ echo mb_substr($res['name'], 0, 40).'...';} else { echo $res['name']; } ?><span class="p-menu-h-line" style="width: 3px;height: 36px;position: absolute;top:0px;right:0px;background-color: inherit;display: inline-block"></span></a>
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
                        <img class="c-review-arrow" src="image/client-say-arrow1.png" alt="alt">
                    </div>
                </div>
                <div class="col-xs-12 no-padding c-review-name-body">
                    <p class="no-margin"><span class="client-icon"></span>Bogdan Dvinin, test company.</p>
                </div>
            </div>
            <!--product block -->
            <div class="col-sm-9 main-product-wrapper">
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
                                    <img class="img-thumbnail" src="<?php echo base_url(); ?><?php echo THUMBS.$res['image_name'];  ?>">
                                </div>
                                <!--product title -->
                                <div class="col-xs-12 product-title">
                                    <!--
                                    <p>Kids Moon Colorblock Footer Tights</p>
                                    -->
                                    <a style="cursor: pointer" onclick="product_view(<?php echo $res['stock_id']; ?>)"><?php echo $res['name']; ?></a>
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
                                                <button class="bshop-b-b"  style="cursor: no-drop" type="button" disabled></button>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-lg-12">
                    <p class="popular-product-p"><span>POPULAR</span> PRODUCTS NOW</p>
                </div>
                <!--Popular product -->
                <div class="col-lg-12 product-content-body">
                    <?php
                    for($i=0 ; $i <=5 ; $i++) {
                        ?>
                        <div class="col-xs-4 no-padding product-presentation-body">
                            <!--product image -->
                            <div class="col-xs-12 product-image-body">
                                <img src="image/product_img.png">
                            </div>
                            <!--product title -->
                            <div class="col-xs-12 product-title">
                                <p>Kids Moon Colorblock Footer Tights</p>
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
                                    <p class="product-price">
                                        $ 8.99</p>
                                </div>
                                <div class="col-lg-6 no-padding product-buy-body">
                                    <button></button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>



    <!-- basket buyer modal -->
    <?php if($basket_view) echo $basket_view; ?>
    <!-- end basket modal -->
</section>
<!--end content -->
<!--section footer -->
<?php if($footer) echo $footer ;?>
<!--end section footer -->
</body>
</html>