<!--basket modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div id="rotate"><!--Rotate animation when work ajax -->
        </div>
        <div class="modal-content">
            <div style="border-bottom: none" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="basket-m-title">Корзина</h4>
                <?php if(isset($_SESSION['angel_basket'])) { ?>
                    <button style="display: none;border-radius: 5px;margin-top: 5px;" id="back-to-first" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span></button>
                    <button style="display: none;border-radius: 5px;margin-top: 5px;" id="back-to-second" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span></button>
                <?php } ?>
            </div>
            <div class="modal-body">
                <!--Modal info display-->
                <div id="basket-error-info" style="position: fixed;display: none;background-color: white;width: 300px;left: 50%;margin-left: -150px;height: 50px;top: 50%;margin-top: -25px;">
                    <!--
                    <p style="display: table-cell;vertical-align: middle;text-align: center"></p>
                    -->
                    <p style="display: table-cell;vertical-align: middle;text-align: center" class="alert alert-danger" role="alert"></p>
                </div>
                <!-- -->

                <!-- #basket-body display all basket goods info -->
                <div style="overflow: hidden;" id="basket-body">
                    <?php if(isset($_SESSION['angel_basket'])) { ?>
                        <table class="table table-hover">
                            <tr>
                                <th>№</th>
                                <th></th>
                                <th>Название</th>
                                <th>Количество</th>
                                <th style="width: 100px">Сумма</th>
                            </tr>
                            <?php
                            $total_order_sum = '';  //sum basket goods price
                            if (isset($_SESSION['angel_basket'])) {
                                $num_rows = '';    //variable to indicates the number of rows
                                foreach ($_SESSION['angel_basket'] as $key=>$g_res) {
                                    $total_order_sum += ($g_res['price']*$g_res['quantity']); //variable indicates all basket goods total price
                                    $num_rows ++;  //increase the value
                                    ?>
                                    <tr id="basket-row-<?php echo $key; ?>">
                                        <td class="t_vertical"><?php echo $num_rows; ?></td>
                                        <td class="t_vertical"><img style="width: 50px;height: 50px" alt="alt" src="<?php echo base_url(); ?><?php echo THUMBS.$g_res['img']; ?>"></td> <!-- THUMBS -> global variable wich containes path to image Thumbnail -->
                                        <td class="t_vertical"><?php echo $g_res['name']; ?></td>
                                        <td class="t_vertical">
                                            <!-- data change by js/main_angel.js -->
                                            <form class="form-horizontal basket-goods-data">
                                                <div style="margin-bottom: 0px" class="form-group">
                                                    <label onclick="basket_minus(<?php echo $key; ?>);" id="b-goods-minus-<?php echo $key; ?>" class="col-sm-2 control-label glyphicon glyphicon-minus basket-goods-edit"></label>
                                                    <div class="col-sm-4">
                                                        <input id="b-goods-quantity-<?php echo $key; ?>" type="text" data-price="<?php echo $g_res['price']; ?>" class="form-control" name="basket_goods_quantity_<?php echo $key; ?>" value="<?php echo $g_res['quantity'] ?>">
                                                    </div>
                                                    <label onclick="basket_plus(<?php echo $key; ?>);" id="b-goods-plus-<?php echo $key; ?>" class="col-sm-2 control-label glyphicon glyphicon-plus basket-goods-edit"></label>
                                                </div>
                                            </form>
                                        </td>
                                        <td id="goods-total-price-<?php echo $key; ?>" class="t_vertical"><?php echo ($g_res['price']*$g_res['quantity']).' '.'грн'; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    <?php } else { ?>
                        <h3 style="margin: 0px">Нет товара</h3>
                    <?php } ?>
                        <?php if(isset($_SESSION['angel_basket'])) { ?>
                            <h3 style="text-align: right">И того: <span data-total_sum="<?php echo $total_order_sum; ?>" id="total-basket-goods-sum"><?php echo $total_order_sum.' '.'грн'; ?></span></h3> <!-- $total_order_sum line 24 -->
                        <?php } ?>
                </div> <!-- -/#basket-body -->
                <!--block to create order from basket goods -->
                <div style="display: none" id="create-order">
                    <form id="basket-order-form" class="form-horizontal">
                        <div class="form-group">
                            <div style="float:none; margin: 0 auto" class="col-sm-8">
                                <p style="border-bottom: 1px solid rgb(204, 204, 204); padding-bottom: 17px;">Контактные данные</p>
                            </div>
                        </div>
                        <div class="form-group order-name">
                            <!--
                            <label class="col-sm-4 control-label">Ваше имя</label>
                            -->
                            <div style="float:none; margin: 0 auto" class="col-sm-8">
                                <input type="text" name="b_order_name" class="form-control" value="Богдан" placeholder="Инициалы">
                            </div>
                        </div>
                        <div class="form-group order-email">
                            <!--
                            <label class="col-sm-4 control-label">Email</label>
                            -->
                            <div style="float:none; margin: 0 auto" class="col-sm-8">
                                <input type="email" name="b_order_email" class="form-control" value="bog@ram.ru" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group order-phone">
                            <!--
                            <label class="col-sm-4 control-label">Ваш телефон</label>
                            -->
                            <div style="float:none; margin: 0 auto" class="col-sm-8">
                                <input id="i-buyer-phone" type="text" name="b_order_phone" class="form-control" placeholder="Телефон"> <!--input form mask in js/main_angel.js in bottom -->
                            </div>
                        </div>
                        <div class="form-group order-city">
                            <!--
                            <label class="col-sm-4 control-label">Ваш город</label>
                            -->
                            <div style="float:none; margin: 0 auto" class="col-sm-8">
                                <input type="text" name="b_order_city" class="form-control" value="Запорожье" placeholder="Город проживания">
                            </div>
                        </div>
                        <div class="form-group order-address">
                            <!--
                            <label class="col-sm-4 control-label">Ваш город</label>
                            -->
                            <div style="float:none; margin: 0 auto" class="col-sm-8">
                                <input type="text" name="b_order_address" class="form-control" value="sdfdsfsdf" placeholder="Адрес">
                            </div>
                        </div>
                        <div class="form-group order-comment">
                            <!--
                            <label class="col-sm-4 control-label">Ваш коментарий</label>
                            -->
                            <div style="float:none; margin: 0 auto" class="col-sm-8">
                                <textarea class="form-control" name="b_order_comment" value="sdfsdfdsfsdf" placeholder="Коментарий к заказу" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div> <!-- -/#create-order -->
                <!--delivery block -->
                <div style="display: none" id="delivery-block">
                    <form id="delivery-form" class="form-horizontal">
                        <div class="form-group">
                            <div style="float:none; margin: 0 auto" class="col-sm-8">
                                <p style="border-bottom: 1px solid rgb(204, 204, 204); padding-bottom: 17px;">Доставка</p>
                            </div>
                        </div>
                        <div class="radio">
                            <div style="display: table;padding: 5px;" class="col-sm-offset-2 col-sm-10">
                                <label style="display: table-cell; vertical-align: middle;">
                                    <input type="radio" name="order_delivery" id="nova_poshta_d_check" value="need_delivery">
                                    Новая почта
                                </label>
                                <label style="display: none" id="nova-poshta-delivery-address">
                                    <select id="werhouse-address" style="width: 205px;" class="werhouse-address">
                                        <option>

                                        </option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="radio">
                            <div style="display: table;padding: 5px;" class="col-sm-offset-2 col-sm-10">
                                <label>
                                    <input type="radio" name="order_delivery" id="by_himself" value="itself">
                                    Самовывоз
                                </label>
                            </div>
                        </div>
                        <div style="margin-top: 50px;" class="form-group">
                            <div style="float:none; margin: 0 auto" class="col-sm-8">
                                <p style="border-bottom: 1px solid rgb(204, 204, 204); padding-bottom: 17px;">Оплата</p>
                            </div>
                        </div>
                        <div class="radio">
                            <div style="display: table;padding: 5px;" class="col-sm-offset-2 col-sm-10">
                                <label>
                                    <input type="radio" name="order_pay" id="pay_cash" value="pay_cash">
                                    Наличными
                                </label>
                            </div>
                        </div>
                        <div class="radio">
                            <div style="display: table;padding: 5px;" class="col-sm-offset-2 col-sm-10">
                                <label>
                                    <input type="radio" name="order_pay" id="pay_pay_pal" value="PayPal">
                                    PayPal
                                </label>
                            </div>
                        </div>
                    </form>
                </div> <!-- -/#delivery-block -->
            </div>
            <div style="border-top: none" class="modal-footer">
                <form id="form-clear-basket" method="post" action="<?php echo base_url(); ?>main/basket">
                    <input type="hidden" name="basket_sess_dest" value="unset">
                    <input type="hidden" name="u_goods_url" value="<?php echo $this->uri->uri_string(); ?>">  <!--pass the URL of the page to the correct redirect -->
                    <button style="float: left" type="submit" class="btn btn-default btn-lg" >Очистить корзину</button>
                </form>
                <button id="b-close-basket" type="button" class="btn btn-default btn-lg" data-dismiss="modal">Закрыть</button>      <!--PayPal close button -->
                <button id="submit-b-form" type="button" class="btn btn-primary btn-lg">Оформить заказ</button> <!--button to display form "#create-order" js/main_angel.js-->
                <button style="display: none;float: right" id="submit-b-order" type="button" class="btn btn-primary btn-lg">Оформить заказ</button> <!--button to display "#delivery-block"  js/main_angel.js -->
                <button style="display: none;float: right" id="submit-b-order-accept" type="button" class="btn btn-primary btn-lg">Подтвердить заказ</button> <!--button to confirm order js/main_angel.js -->
                <button style="display: none;float: right;margin-left: 5px;" id="pay-pal-pay-b" type="submit" data-pp-total-sum='<?php echo $total_order_sum; ?>' name="METHOD" class="btn btn-primary btn-lg">Pay</button>  <!-- -/PayPal pay button ("show if select PayPal") -->
            </div>
        </div>
    </div>
</div>
<!--end modal -->