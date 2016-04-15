<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>style/contacts.css" rel="stylesheet">
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
                            <span  class="input-group-addon" id="sizing-addon1"><button type="submit" ><img alt="alt" src="image/search_icon.png"></button></span>
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
                            <div id="contacts-line" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                            </div>
                            <div id="contacts-header" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                                <p>Контактная информация компании</p>
                                <p>Интернет-магазин новых детских товаров</p>
                                <p><<Украинские ангелочки>></p>
                            </div>
                            <div id="contacts-line" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                            </div>
                            <div id="contacts-info" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                                <p>Интернет-магазин новых детских товаров <<Украинские ангелочки>></p>
                                <p><strong>Екатерина</strong></p>
                                <p><strong>Украина</strong></p>
                                <p>Доставка товаров ТК (транспортной компанией) во все города Украины - Полтава, Кировоград, Николаев, Одесса, Днепропетровск,
                                    Черкассы, Киев, Луцк, Суммы, Львов, Черновци, Ровно, Кременчуг, Чернигов, Житомир, Харьков, Мариуполь, Мелитополь, Ивано-франковск,
                                    Запорожье, Херсон и далее
                                </p>
                                <p><strong>+38(096)250-65-07</strong></p>
                                <p><strong>+38(095)060-77-30</strong></p>
                                <p><strong>+38(093)615-26-22</strong></p>
                            </div>
                            <div id="contacts-form-body" class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
                                <form id="contacts-form" action="" method="post">
                                    <div class="form-group">
                                        <label>Обратная связь</label>
                                        <input type="text" class="form-control" name="gb_name" placeholder="Ваше имя">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="gb_email" placeholder="Вам E-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" name="gb_tell" placeholder="Номер телефона">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="gb_message" placeholder="Ваше сообщение"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default"><img alt="alt" src="image/contacts_form_button.png"></button>
                                    </div>
                                </form>
                            </div>
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