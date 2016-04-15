<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>style/goods_page.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>js/script_v1.js"></script>
</head>
<body>
<!--header-->
<?php if($header) echo $header ;?>
<!--end header -->
<!--content -->
<section>
    <div class="container angel">
        <div class="row">
            <!--content left column -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-sx-4">
                <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                    <form id="search-form" method="post" action="" class="form-horizontal">
                        <div class="input-group">
                            <span  class="input-group-addon" id="sizing-addon1"><button type="submit" ><img alt="alt" src="<?php echo base_url(); ?>image/search_icon.png"></button></span>
                            <input type="search" class="form-control" placeholder="Поиск товара">
                        </div>
                    </form>
                </div>
                <div id="content_left_body" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                    <div class="panel panel-default frame">
                        <div class="panel-heading first-sidebar">Товары и услуги</div>
                        <div class="panel-body first-sidebar">
                            <?php
                            $goods_category = array(
                                'РАСПРОДАЖА','Коляски детские универсальные','Аксессуары для детских колясок',
                                'Коляски детские прогулочные,трости','Стульчики детские для кормления','Автокресла детские',
                                ' Манежи детские','Велосипеди детские',' Кроватки детские','Матрасы детские',
                                'Постельные комплексы в детскую кроватку','Кенгуру детские,рюкзаки,сумки-переноски,меховые конверты',
                                'Мебель детская: парты, мольберты, доски для рисования','Пеленальные комоды,столики,доски',
                                'Шезлонги ,качели ,качалки','Молокоотсосы и аксессуары для грудного вскармивания',
                                'Подростковые и двухъярусные кровати','Транспорт детский (толокары, каталки, электромобили)');
                            ?>
                            <ul id="g-and-s">
                                <?php
                                foreach($goods_category as $res){ ?>
                                    <li>
                                        <a href="#">- <?php echo $res; ?></a>
                                    </li>
                                <?php }; ?>
                            </ul>
                        </div>
                        <div class="panel-heading second-sidebar"></div>
                        <div class="panel-body second-sidebar">
                            <?php
                            $interest_category = array(
                                'Фотогалерея','Новости','Статьи','Заказ и доставка товара','Отзывы','Часто задаваемые вопросы'
                            );
                            ?>
                            <ul id="g-and-s">
                                <?php
                                foreach($interest_category as $res){ ?>
                                    <li>
                                        <a href="#">- <?php echo $res; ?></a>
                                    </li>
                                <?php }; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default contacts">
                        <div class="panel-heading">Контакты</div>
                        <div id="angel-contacts" class="panel-body">
                            <p>Интернет магазин детских товаров <<Украинские ангелочки>></p>
                            <p>Телефоны:</p>
                            <p>+38(096)250-65-07</p>
                            <p>+38(095)060-77-30</p>
                            <p>+38(093)625-26-22</p>
                            <p>Контактное лицо: <span>Екатерина</span> </p>
                            <p>Адрес: <span>доставка по всей Укриане - Житомир, Киев, Львов, Запорожье, Харьков, Тернополь, Полтава, Кременчуг, Днепропетровск, Ужгород, Винница, Белая церковь, Одесса, Луцк, Черновци, Чернигов, Ровно, Херсон, Кировоград, Сумы и другие</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end content left column -->
            <!--content right column -->
            <div class="col-lg-8 col-md-8 col-sm-8 col-sx-8">
                <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                    <div id="goods-container" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                        <div id="goods-container-body" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                            <div class="row">
                                <div id="goods-main-img" class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
                                    <img alt="alt" src="<?php echo base_url(); ?>image/goods_1.png">
                                </div>
                                <div id="buy-goods-body" class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
                                    <div id="buy-goods-price" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                                        <p>5796 грн.</p>
                                    </div>
                                    <div id="buy-goods-form-block" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                                        <form id="buy-goods-top-form" class="form-inline">
                                            <input type="hidden" class="form-control" name="buy_goods">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default"><img alt="alt" src="<?php echo base_url(); ?>image/goods_buy_2.png"></button>
                                                <button type="submit" class="btn btn-default"><img alt="alt" src="<?php echo base_url(); ?>image/goods_read.png"></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="select-goods-block" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="#"><img alt="alt" src="<?php echo base_url(); ?>image/goods_2.png"></a>
                                                </td>
                                                <td>
                                                    <a href="#"><img alt="alt" src="<?php echo base_url(); ?>image/goods_2.png"></a>
                                                </td>
                                                <td>
                                                    <a href="#"><img alt="alt" src="<?php echo base_url(); ?>image/goods_2.png"></a>
                                                </td>
                                                <td>
                                                    <a href="#"><img alt="alt" src="<?php echo base_url(); ?>image/goods_2.png"></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                                <p>Описание</p>
                            </div>
                            <div id="contacts-line" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                            </div>
                            <div id="buy-goods-details" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                                <p id="goods-detailes-title">Универсальная коляска Anmar MARSEL</p>
                                <p id="goods-main-detailes">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                                    Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                                </p>
                                <p id="goods-detailes-first-title">Описание люльки:</p>
                                <ul class="goods-info">
                                    <li>
                                        <p>-Характеристика 1</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 2</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 3</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 4</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 5</p>
                                    </li>
                                </ul>
                                <p id="goods-detailes-first-title">Описание прогулочного блока:</p>
                                <ul class="goods-info">
                                    <li>
                                        <p>-Характеристика 1</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 2</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 3</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 4</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 5</p>
                                    </li>
                                </ul>
                                <p id="goods-detailes-first-title">Шасси:</p>
                                <ul class="goods-info">
                                    <li>
                                        <p>-Характеристика 1</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 2</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 3</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 4</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 5</p>
                                    </li>
                                </ul>
                                <p id="goods-detailes-first-title">Передние колеса:</p>
                                <ul class="goods-info">
                                    <li>
                                        <p>-Характеристика 1</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 2</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 3</p>
                                    </li>
                                </ul>
                                <p id="goods-detailes-first-title">Задние колеса:</p>
                                <ul class="goods-info">
                                    <li>
                                        <p>-Характеристика 1</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 2</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 3</p>
                                    </li>
                                </ul>
                                <p id="goods-detailes-first-title">В комплекте:</p>
                                <ul class="goods-info">
                                    <li>
                                        <p>-Характеристика 1</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 2</p>
                                    </li>
                                    <li>
                                        <p>-Характеристика 3</p>
                                    </li>
                                </ul>
                                <p id="goods-detailes-main">Вес коляски - 12кг</p>
                            </div>
                            <div id="social-body" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                                <table>
                                    <tr>
                                        <td>
                                            <a href=""><img alt="alt" src="<?php echo base_url(); ?>image/vk_img.png"></a>
                                        </td>
                                        <td>
                                            <a href=""><img alt="alt" src="<?php echo base_url(); ?>image/od_img.png"></a>
                                        </td>
                                        <td>
                                            <a href=""><img alt="alt" src="<?php echo base_url(); ?>image/fb_img.png"></a>
                                        </td>
                                        <td>
                                            <a href=""><img alt="alt" src="<?php echo base_url(); ?>image/tw_img.png"></a>
                                        </td>
                                        <td>
                                            <a href=""><img alt="alt" src="<?php echo base_url(); ?>image/g_img.png"></a>
                                        </td>
                                        <td>
                                            <a href=""><img alt="alt" src="<?php echo base_url(); ?>image/mail_img.png"></a>
                                        </td>
                                        <td>
                                            <a href=""><img alt="alt" src="<?php echo base_url(); ?>image/main_1_img.png"></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 populare-goods-body">
                            <!--start loop goods -->
                            <?php
                            $rows_goods = 3;
                            for ($i = 0; $i < $rows_goods; $i++) {
                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-sx-4">
                                    <table id="first-cell">
                                        <tr>
                                            <td>
                                                <img src="<?php echo base_url(); ?>image/photo1.png">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">Прогулочная коляска Quatro Jimmy</a>
                                                <p>2822,4 грн.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <form style="text-align: center" action="" method="post">
                                                    <input type="hidden">
                                                    <button style="border: none;background-color: inherit;padding: 0px" type="submit"><img alt="alt" src="<?php echo base_url(); ?>image/goods_buy.png">
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
                            }
                            ?>
                            <!--end of loop goods -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end content right column -->
        </div>
    </div>
</section>
<!--end content -->
<!--section footer -->
<?php if($footer) echo $footer ;?>
<!--end section footer -->

</body>
</html>