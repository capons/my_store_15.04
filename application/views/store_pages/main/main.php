


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
                    <form id="search-form" method="get" class="form-horizontal">
                        <div class="input-group">
                            <span  class="input-group-addon" id="sizing-addon1"><button type="submit" ><img alt="alt" src="<?php echo base_url(); ?>image/search_icon.png"></button></span>
                            <input name="goods_search" type="search" class="form-control" placeholder="Поиск товара">
                        </div>
                    </form>
                </div>
                <div id="content_left_body" class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                    <div class="panel panel-default">
                        <div class="panel-heading first-sidebar">Товары и услуги</div>
                        <div class="panel-body first-sidebar">
                            <ul id="g-and-s">
                                <?php
                                if(isset($parent_categories)) {   //category name list
                                    foreach ($parent_categories as $res) { ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>main/angel/<?php echo $res['code'].'/'.$res['id']; ?>">- <?php echo $res['name']; ?></a> <!--//send uri variable to main/angel controller (uri segment(3) send category name and uri segment (4) send category id for database filter search) -->
                                        </li>
                                    <?php };
                                }; ?>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12" style="border: 1px solid rgb(78,151,108);background-color: rgb(244,251,247);padding: 0px">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 right-sidebar-title">
                            <p>С любовью и заботой о ваших малышах интернет-магазин <<Украинские ангелочки>> предлагает разнообразные товары, облегчающие жизнь родителей и радующие деток! Смотрите-выбирайте-спрашивайте, мы с удовольсвием поможем и найдем вам именно то,что порадует ваших ангелов!</p>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 populare-goods">
                            <p>Популярные товары:</p>
                        </div>
                        <!--start loop goods -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 populare-goods-body">
                            <?php
                            if(isset($shop_product)) {
                                foreach ($shop_product as $res) {
                                    ?>
                                    <div id="goods_body" class="col-lg-4 col-md-4 col-sm-4 col-sx-4">

                                        <div style="margin: 0px;background-color: inherit; padding: 20px; border-radius: 1px; border-bottom: medium none;" id="goods_thumb_img" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 thumbnail">
                                            <img class="img-thumbnail" src="<?php echo base_url(); ?><?php echo THUMBS.$res['image_name'];  ?>">
                                            <?php if($res['quantity'] == 0) { ?>
                                                <span style="position: absolute;width: 100px;left: 50%;margin-left: -50px;" class="label label-danger">Нет в наличии</span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div style="margin: 0px;background-color: inherit; border-radius: 0px; border-bottom: medium none; border-top: medium none;" id="goods_description_block" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 thumbnail">
                                            <a style="cursor: pointer" onclick="product_view(<?php echo $res['stock_id']; ?>)"><?php echo $res['name']; ?></a>
                                            <p><?php echo $res['price']; ?> грн.</p>
                                        </div>
                                        <div style="margin: 0px;background-color: inherit; padding: 5px; border-radius: 0px; border-top: medium none;" id="goods_buy_button" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 thumbnail">
                                            <form action="<?php echo base_url(); ?>main/basket" method="post"> <!--send form to basket controller -->
                                                <input type="hidden" name="add_to_basket" value="<?php echo $res['stock_id'].'|'.$res['name'].'|'.$res['quantity'].'|'.$res['price'].'|'.$res['image_name']; ?>">
                                                <input type="hidden" name="goods_url" value="<?php echo $this->uri->uri_string(); ?>">  <!--pass the URL of the page to the correct redirect -->
                                                <?php if($res['quantity'] > 0) { ?>
                                                    <button  type="submit"><img alt="alt" src="<?php echo base_url(); ?>image/goods_buy.png"></button>
                                                <?php } else { ?>
                                                    <button  style="cursor: no-drop" type="button" disabled><img alt="alt" src="<?php echo base_url(); ?>image/goods_buy.png"></button>
                                                <?php } ?>
                                            </form>
                                        </div>


                                    </div>
                                <?php }
                            }?>
                            <!--Goods pagination link -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12" >
                                <?php
                                if (!empty($this->uri->segment(4))) {
                                    if(isset($links)) {
                                        echo $links; //pagination
                                    }
                                }
                                ?>

                            </div>
                        </div>
                        <!--end of loop goods -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                            <?php
                            $about_goods = array (
                                'В ассортименте нашего магазина представлены качественные товары известных европейских фирм.
                                Вегда в наличии для украинских ангелочков универсальные коляски Tutek и Verdi, а также многие другие.',
                                'Если перед вами стоит выбор прогулочной коляски или коляски-трости, то мы с удовольсвием подберем вам самую удобную, практичную и красивую!',
                                'Особенный подход необходим, безусловно, и в выборе детской кроватки с постельным комплектом.
                                С балдахином или без, на шарнирах, окрашенная в европейском дизайне TM Woodman или королевская от TM Веселка? Конечно, это важно!',
                                'Не забываем и о безопасности малышейв путешествиях в автомобилях: детские автокресла Coletto (и не только) c европейскими сертификатами безопасности всегда в наличии для любого возраста вашего чада.',
                                'Для мам, любящих комфорт во всем - пеленальные комоды и столики - для красивого интерьера и чтобы спина не болела наклоняться за малышом для ухода.',
                                'В полгодика ваш ребенок захочет самостоятельности и тут важно вовремя успеть выбрать для него удобный и функциональный детский стульчик для кормления.
                                Он может быть деревяннымб, как например, стульчики фирмы Darian и пластиковым стационарным типа Chicco Polly или функциональным как детский стульчик-трансформер Alexis.
                                Такие виды стульчиков удобно превращаються в парту для игр и учебы, до тех пор, пока вы не захотите пересадить ребенка за более взрослую детскую парту.',
                                'Для подвижных игр всегда в ассортименте детский автотранспорт - от электромобилей до детских велосипедов всех диаметров колес.
                                Одним словом, в интернет магазине "Украинские ангелочки" есть все! Товары для новорожденных и до их совершеннолетия.',
                                'На сайте представлены не все товары, которые мы можем вам предложить.
                                Пожалуйста, спрашивайте то, что вас интересует! Возможно мы сможем найти его именно для вас и по хорошей цене! Растите ваших деток с нами, а мы всегда будем стараться для них!',
                                'Доставка товаров осуществляется со складов по всей Украине, такими транспортными компаниями как Интайм, Новая почта, Автолюкс, Деливери.',
                                'Уважаемые покупатели, помните, что покупки через интернет-магазин "Украинские ангелочки" не только безопасно, но и выгодно! Мы всегда стремимся порадовать вас и ваших ангелочков!',
                                'Пожалуйста, спрашивайте товар, который вас интересует! Мы найдем его именно для Вас и по хорошей цене! А также поможем выбрать, если сомневаетесь в ассортименте.',
                                'Для Вас всегда в наличии: универсальные коляски, прогулочные коляски, коляска-трость, детские кроватки, автокресла, пеленальные комоды, стульчики для кормления, товары для новорожденных, одежда, матрасы, манежы, кенгуру, ходунки, качели, постельное белье, шезлонги, велосипеды, самокаты, детские парты и многое другое.'
                            );
                            foreach ($about_goods as $row){
                                ?>
                                <p class="right-sidebar-slogan"><?php echo $row; ?></p>
                            <?php }; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--end content right column -->
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