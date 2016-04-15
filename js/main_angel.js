var main = (function () {
    doConstruct = function () {
        this.init_callbacks = [];
    };
    doConstruct.prototype = {
        add_init_callback : function (func) {
            if (typeof(func) == 'function') {
                this.init_callbacks.push(func);
                return true;
            }
            else {
                return false;
            }

        }
    };
    return new doConstruct;
})();
$(document).ready(function () {
    $.each(main.init_callbacks, function (index, func) {
        func();
    });
});
var goods = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.ajax_respons_rotaite); //animation while ajax respons
        main.add_init_callback(this.basket_modal); //show basket modal
        main.add_init_callback(this.list_basket_back); //list basket menu back
        main.add_init_callback(this.order_formalization); // show form to creat order
    };
    doConstruct.prototype = {
        ajax_respons_rotaite: function (){ //ajax respons rotate
            $( document ).ajaxStart(function() {
                $( "#rotate" ).show();
            });
            $( document ).ajaxStop(function() {
                $( "#rotate" ).hide();
            });
        },
        basket_modal: function () { //show basket modal
            $("#angel_basket").click(function(){
                //hiding unnecessary elements of the basket
                if($("#basket-body").css("display") == 'none'){      //if hide - show
                    $("#basket-body").slideToggle("fast");          //show basket orders body if hiden
                };
                if($("#create-order").css("display") == 'block') {  //hide if visible order form
                    $("#create-order").slideToggle("fast");
                    $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                }
                if($("#form-clear-basket").css("display") == 'none'){ //if button invisible
                    $("#form-clear-basket").slideToggle("fast");      //made visible
                }
                if($("#submit-b-form").css("display") == 'none') {   //if button has display none
                    $("#submit-b-form").toggleClass("hiden");        //show button
                }
                if($("#submit-b-order").css("display") == 'block') {  //if button has display block
                    $("#submit-b-order").toggleClass("visible");      //hide button
                }
                if($('#delivery-block').css("display") == 'block') { //if visible
                    $('#delivery-block').removeClass("hiden");        //hide block
                    $('#delivery-block').css("display","none");      //hide block
                    $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                }
                if($('#submit-b-order-accept').css("display") == 'block') { //if visible
                    $('#submit-b-order-accept').toggleClass("visible");     //hide block
                }
                if($('#pay-pal-pay-b').css("display") == 'block') {     //hide button 'PayPal pay'
                    $('#pay-pal-pay-b').toggleClass("visible");
                }
                if($('#back-to-first').css("display") == 'block') {      //hide button #back-to-first if visible
                    $('#back-to-first').slideToggle("fast");
                }
                if($('#back-to-second').css("display") == 'block') {      //hide button #list-b-back if visible
                    $('#back-to-second').slideToggle("fast");
                }
                $('#myModal').modal('show'); //show basket modal
            });
        },
        list_basket_back: function(){     //list basket menu back
            $('#back-to-first').click(function(){                   //if click return to basket order first step
                $('#create-order').slideToggle("slow");           //hide form to create order
                $('#back-to-first').slideToggle("slow");            //hide #list-b-back
                $("#submit-b-order").toggleClass("visible");      //hide button to creat order
                $("#submit-b-form").toggleClass("hiden");         //show button
                setTimeout(function(){
                    $("#basket-body").slideToggle("slow");         //show basket body to display goods info
                },1000);
            });
            $('#back-to-second').click(function(){                  //if click return to basket order second step
                $('#back-to-second').slideToggle("fast");          //hide button
                $('#delivery-block').slideToggle("slow");           //hide form to create order
                $('#submit-b-order').toggleClass("visible");        //show button


                $('#submit-b-order-accept').toggleClass("visible");//hide button
                setTimeout(function(){
                    $('#back-to-first').slideToggle("slow");           //show button
                    $("#create-order").slideToggle("slow");        //show previous basket menu
                },1000);
            });
        },
        order_formalization: function (){ //show form to create order
            $('#submit-b-form').click(function(){
                //send ajax to check product quontity and next list show
                $.ajax({
                    url: base_url+'/main/order', //base_url Global variable containes base_path => header_layout.php
                    //url: 'http://localhost/bogdan/STORE/main/order',
                    type: 'POST',
                    data: {one_quantity_check:''}, //send empty post request for check session basket goods quontity
                    success: function(msg) {
                        var respons_data = JSON.parse(msg); //decode json
                        switch (respons_data[0]){       //needed array cell
                            case 'quantity_error':            //if basket goods quontity response false
                                $('#basket-error-info > p').html('Извините на складе недостаточно товара'); //insert php validate error
                                $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                setTimeout(function () {                                 //hide display error block
                                    $('#basket-error-info').toggleClass("class_basket_info");
                                    $('#basket-error-info').css("display","none");
                                    $('#basket-error-info > p').html('');
                                }, 5300);
                                break;
                            case 'quantity_positive':        //if basket goods quantity response true go to next step
                                $("#basket-body").slideToggle("slow");         //hide basket body to display goods info
                                $("#basket-m-title").html("Оформление заказа");//change modal title
                                $("#form-clear-basket").css("display","none"); //hide button to empty the basket
                                $("#submit-b-form").toggleClass("hiden");      //hide button
                                $("#submit-b-order").toggleClass("visible");   //show button to creat order
                                setTimeout(function(){
                                    $('#create-order').slideToggle("slow");    //show form to create order
                                    $('#back-to-first').slideToggle("slow");  //shaw #list-b-back
                                },1000);
                                break;
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(thrownError);
                    }
                });
            });
            $("#submit-b-order").click(function() {
                var buyer_name = $("input[name='b_order_name']").val(); //Obtain data from the form
                var buyer_email = $("input[name='b_order_email']").val();
                var buyer_phone = $("input[name='b_order_phone']").val();
                var buyer_city = $("input[name='b_order_city']").val();
                var buyer_comment = $("textarea[name='b_order_comment']").val();
                var buyer_address = $("input[name='b_order_address']").val();
                //validate form data
                if (buyer_name.length == 0) {
                    $('.form-group.order-name').toggleClass('has-error');
                    setTimeout(function () {
                        $('.form-group.order-name').toggleClass('has-error');
                    }, 3300);
                    return false;
                }
                if (buyer_email.length == 0) {
                    $('.form-group.order-email').toggleClass('has-error');
                    setTimeout(function () {
                        $('.form-group.order-email').toggleClass('has-error');
                    }, 3300);
                    return false;
                }
                if (buyer_email.indexOf('.', 0) == -1 || buyer_email.indexOf('@', 0) == -1) {
                    $('.form-group.order-email').toggleClass('has-error');
                    setTimeout(function () {
                        $('.form-group.order-email').toggleClass('has-error');
                    }, 3300);
                    return false;
                }
                if (buyer_phone.length == 0) {
                    $('.form-group.order-phone').toggleClass('has-error');
                    setTimeout(function () {
                        $('.form-group.order-phone').toggleClass('has-error');
                    }, 3300);
                    return false;
                }
                if (buyer_city.length == 0) {
                    $('.form-group.order-city').toggleClass('has-error');
                    setTimeout(function () {
                        $('.form-group.order-city').toggleClass('has-error');
                    }, 3300);
                    return false;
                }
                if ($.isNumeric(buyer_city)) {                        //validate input (only string)
                    $('.form-group.order-city').toggleClass('has-error');
                    setTimeout(function () {
                        $('.form-group.order-city').toggleClass('has-error');
                    }, 3300);
                    return false;
                }
                if (buyer_address.length == 0) {
                    $('.form-group.order-address').toggleClass('has-error');
                    setTimeout(function () {
                        $('.form-group.order-address').toggleClass('has-error');
                    }, 3300);
                    return false;
                }
                if (buyer_comment.length > 100) {
                    $('.form-group.order-comment').toggleClass('has-error');
                    setTimeout(function () {
                        $('.form-group.order-comment').toggleClass('has-error');
                    }, 3300);
                    return false;
                }
                $.ajax({
                    //url: './main/order',
                    url: base_url+'/main/order', //base_url Global variable containes base_path => header_layout.php
                    type: 'POST',
                    data: {buyer_name:buyer_name,buyer_email:buyer_email,buyer_phone:buyer_phone,buyer_city:buyer_city,buyer_address:buyer_address,buyer_comment:buyer_comment}, 
                    success: function(msg) {
                        var respons_data = JSON.parse(msg); //decode json
                        //true if the buyer insert into input correct city name
                        switch (respons_data[0]){       //needed array cell 
                            case 'positive':            //if API NovaPoshta response positive main/order
                                var elements = $();
                                $.each(respons_data[1], function (index, value) { //add array to <option> to append into html
                                    elements = elements.add('<option>' + value + '</option>');
                                });
                                $('#werhouse-address').append(elements);
                                $('#create-order').slideToggle("slow");          //hide block
                                $('#back-to-first').slideToggle("slow");         //hide button
                                setTimeout(function () {
                                    $('#delivery-block').slideToggle("slow");    //show form to create order
                                    $('#submit-b-order').removeClass("visible");
                                    $('#back-to-second').slideToggle("slow");    //show button "slide back to second basket order menu"
                                    if($("#pay_pay_pal").prop('checked') == true){
                                        $('#pay-pal-pay-b').toggleClass("visible"); //if checked PayPal checkbox "show PayPal form button"
                                    } else {
                                        $('#submit-b-order-accept').toggleClass("visible");
                                    }
                                }, 1000);
                                break;
                            case 'error_city':        ////if API NovaPoshta response negative main/order (show input to add buyer address)
                                $('#nova-poshta-delivery-address').html(                //change form input
                                    '<input style="width: 203px;" id="np_error_werhouse" name="werhouse-address" class="form-control werhouse-address" placeholder="Oтделениe новой почты">'
                                );
                                $('#create-order').slideToggle("slow");
                                setTimeout(function () {
                                    $('#delivery-block').slideToggle("slow");    //show form to create order
                                    $('#submit-b-order').removeClass("visible");
                                    //$('#submit-b-order-accept').toggleClass("visible");
                                    if($("#pay_pay_pal").prop('checked') == true){
                                        $('#pay-pal-pay-b').toggleClass("visible"); //if checked PayPal checkbox "show PayPal form button"
                                    } else {
                                        $('#submit-b-order-accept').toggleClass("visible");
                                    }
                                }, 1000);
                                break;
                            case 'error_input':
                                $('#basket-error-info > p').html(respons_data[1]); //insert php validate error
                                $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                setTimeout(function () {                                 //hide display error block
                                    $('#basket-error-info').toggleClass("class_basket_info");
                                    $('#basket-error-info').css("display","none");
                                    $('#basket-error-info > p').html('');
                                }, 5300);
                                break;
                            case 'quantity_error':
                                $('#basket-error-info > p').html(respons_data[1]); //insert php validate error
                                $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                setTimeout(function () {                                 //hide display error block
                                    $('#basket-error-info').toggleClass("class_basket_info");
                                    $('#basket-error-info').css("display","none");
                                    $('#basket-error-info > p').html('');
                                    //hiding unnecessary elements of the basket if isset quantity error
                                    if($("#basket-body").css("display") == 'none'){      //if hide - show
                                        $("#basket-body").slideToggle("fast");          //show basket orders body if hiden
                                    };
                                    if($("#create-order").css("display") == 'block') {  //hide if visible order form
                                        $("#create-order").slideToggle("fast");
                                        $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                    }
                                    if($("#form-clear-basket").css("display") == 'none'){ //if button invisible
                                        $("#form-clear-basket").slideToggle("fast");      //made visible
                                    }
                                    if($("#submit-b-form").css("display") == 'none') {   //if button has display none
                                        $("#submit-b-form").toggleClass("hiden");        //show button
                                    }
                                    if($("#submit-b-order").css("display") == 'block') {  //if button has display block
                                        $("#submit-b-order").toggleClass("visible");      //hide button
                                    }
                                    if($('#delivery-block').css("display") == 'block') { //if visible
                                        $('#delivery-block').removeClass("hiden");        //hide block
                                        $('#delivery-block').css("display","none");      //hide block
                                        $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                    }
                                    if($('#submit-b-order-accept').css("display") == 'block') { //if visible
                                        $('#submit-b-order-accept').toggleClass("visible");     //hide block
                                    }
                                    if($('#pay-pal-pay-b').css("display") == 'block') {     //hide button 'PayPal pay'
                                        $('#pay-pal-pay-b').toggleClass("visible");
                                    }
                                    if($('#back-to-first').css("display") !== 'none') {      //hide button #back-to-first if visible
                                        $('#back-to-first').css("display","none");
                                    }
                                    if($('#back-to-second').css("display") !== 'none') {      //hide button #list-b-back if visible
                                        $('#back-to-second').css("display","none");
                                    }
                                }, 5300);
                                break;
                            default:
                                $('#basket-error-info > p').html('Попробуйте еще раз'); //insert php validate error
                                $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                setTimeout(function () {                                 //hide display error block
                                    $('#basket-error-info').toggleClass("class_basket_info");
                                    $('#basket-error-info').css("display","none");
                                    $('#basket-error-info > p').html('');
                                }, 5300);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.responseText);
                        //alert(thrownError);
                    }
                });

            });
            $('#submit-b-order-accept').click(function(){
                $("#submit-b-order-accept").attr('disabled', 'disabled'); // button click switch off


                var delivery_type_np = $("#nova_poshta_d_check"); //delivery checkbox
                var delivery_type_ms = $("#by_himself");          //delivery checkbox
                var payment_method_cash = $("#pay_cash");         //payment method
                var payment_method_paypal = $("#pay_pay_pal");    //payment method
                var delivery_address = $("input[name='werhouse-address']").val(); //if the buyer wants to deliver the goods himself
                var np_delivery_address = $("#werhouse-address").val();           //if buyer wants to deliver by NovaPoshta
                if(delivery_type_np.prop('checked') == false && delivery_type_ms.prop('checked') == false) {
                    $('#basket-error-info > p').html('Выберите тип доставки'); //insert php validate error
                    $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                    $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {                                 //hide display error block
                        $('#basket-error-info').toggleClass("class_basket_info");
                        $('#basket-error-info').css("display","none");
                        $('#basket-error-info > p').html('');
                        $('#submit-b-order-accept').removeAttr('disabled');
                    }, 5300);
                    return false;
                }
                if(payment_method_cash.prop('checked') == false && payment_method_paypal.prop('checked') == false) { //if payment method select false
                    $('#basket-error-info > p').html('Выберите тип оплаты'); //insert php validate error
                    $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                    $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {                                 //hide display error block
                        $('#basket-error-info').toggleClass("class_basket_info");
                        $('#basket-error-info').css("display","none");
                        $('#basket-error-info > p').html('');
                        $('#submit-b-order-accept').removeAttr('disabled');
                    }, 5300);
                    return false;
                } else {
                    if(payment_method_cash.prop('checked') == true){
                        var payment_method = payment_method_cash.val();  //variable containes payment method
                    }
                    if(payment_method_paypal.prop('checked') == true){
                        var payment_method = payment_method_paypal.val();//variable containes payment method
                    }
                }
                if(delivery_type_np.prop('checked') == true) { //if NovaPoshta checked
                    if($('#np_error_werhouse').length == 1) { //if api 2.0 NovaPOshta respones false
                        if (delivery_address.length == 0) {

                            $('#basket-error-info > p').html('Введите адрес отделения новой почты'); //insert error reporting
                            $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                            $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                            setTimeout(function () {                                 //hide display error block
                                $('#basket-error-info').toggleClass("class_basket_info");
                                $('#basket-error-info').css("display","none");
                                $('#basket-error-info > p').html('');
                                $('#submit-b-order-accept').removeAttr('disabled');
                            }, 5300);
                            return false;
                        }
                    }
                    if($('#np_error_werhouse').length == 0) { //if api 2.0 NovaPOshta respones true
                        if (np_delivery_address.length == 0) {

                            $('#basket-error-info > p').html('Выберите адрес доставки'); //insert error reporting
                            $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                            $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                            setTimeout(function () {                                 //hide display error block
                                $('#basket-error-info').toggleClass("class_basket_info");
                                $('#basket-error-info').css("display","none");
                                $('#basket-error-info > p').html('');
                                $('#submit-b-order-accept').removeAttr('disabled');
                            }, 5300);
                            return false;
                        }
                    }
                    if($('#np_error_werhouse').length ==1) { // if the client had written the delivery address
                        $.ajax({
                            //url: './main/order',
                            url: base_url+'/main/order', //base_url Global variable containes base_path => header_layout.php
                            type: 'POST',
                            data: {order_delivery_s:delivery_address,payment_method:payment_method}, //send delivery address
                            success: function(msg) {
                                var respons_data = JSON.parse(msg); //decode json

                                switch (respons_data[0]){       //needed array cell
                                    case 'successfully':
                                        //ДОДЕЛАТЬ ОТВЕТ СОЗДАНИЯ ОРДЕРА ПРИ ВВЕДЕНИИ АДРЕСА В РУЧНУЮ

                                        //window.location.replace('./main/complete');
                                        window.location.replace(base_url+'main/complete');



                                        $('#submit-b-order-accept').removeAttr('disabled'); //button click on

                                        //alert(respons_data[1]);
                                        break;
                                    case 'quantity_error':

                                        $('#basket-error-info > p').html(respons_data[1]); //insert php validate error
                                        $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                        $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                        setTimeout(function () {                                 //hide display error block
                                            $('#basket-error-info').toggleClass("class_basket_info");
                                            $('#basket-error-info').css("display","none");
                                            $('#basket-error-info > p').html('');
                                            //hiding unnecessary elements of the basket if isset quantity error
                                            if($("#basket-body").css("display") == 'none'){      //if hide - show
                                                $("#basket-body").slideToggle("fast");          //show basket orders body if hiden
                                            };
                                            if($("#create-order").css("display") == 'block') {  //hide if visible order form
                                                $("#create-order").slideToggle("fast");
                                                $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                            }
                                            if($("#form-clear-basket").css("display") == 'none'){ //if button invisible
                                                $("#form-clear-basket").slideToggle("fast");      //made visible
                                            }
                                            if($("#submit-b-form").css("display") == 'none') {   //if button has display none
                                                $("#submit-b-form").toggleClass("hiden");        //show button
                                            }
                                            if($("#submit-b-order").css("display") == 'block') {  //if button has display block
                                                $("#submit-b-order").toggleClass("visible");      //hide button
                                            }
                                            if($('#delivery-block').css("display") == 'block') { //if visible
                                                $('#delivery-block').removeClass("hiden");        //hide block
                                                $('#delivery-block').css("display","none");      //hide block
                                                $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                            }
                                            if($('#submit-b-order-accept').css("display") == 'block') { //if visible
                                                $('#submit-b-order-accept').toggleClass("visible");     //hide block
                                            }
                                            if($('#pay-pal-pay-b').css("display") == 'block') {     //hide button 'PayPal pay'
                                                $('#pay-pal-pay-b').toggleClass("visible");
                                            }
                                            if($('#back-to-first').css("display") !== 'none') {      //hide button #back-to-first if visible
                                                $('#back-to-first').css("display","none");
                                            }
                                            if($('#back-to-second').css("display") !== 'none') {      //hide button #list-b-back if visible
                                                $('#back-to-second').css("display","none");
                                            }
                                            $('#submit-b-order-accept').removeAttr('disabled'); //button click on
                                        }, 5300);
                                        break
                                    case 'error_input':
                                        $('#basket-error-info > p').html(respons_data[1]); //insert error reporting
                                        $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                        $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                        setTimeout(function () {                                 //hide display error block
                                            $('#basket-error-info').toggleClass("class_basket_info");
                                            $('#basket-error-info').css("display","none");
                                            $('#basket-error-info > p').html('');
                                            $('#submit-b-order-accept').removeAttr('disabled');
                                        }, 5300);
                                        break;
                                    case 'db_error':
                                        $('#basket-error-info > p').html('Ошибка соединения, попробуйте еще раз'); //insert error reporting
                                        $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                        $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                        setTimeout(function () {                                 //hide display error block
                                            $('#basket-error-info').toggleClass("class_basket_info");
                                            $('#basket-error-info').css("display","none");
                                            $('#basket-error-info > p').html('');
                                            $('#submit-b-order-accept').removeAttr('disabled');
                                        }, 5300);
                                        break;
                                }
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                                //alert(thrownError);
                            }
                        });


                    }

                    if($('#np_error_werhouse').length == 0) { // if the client had selected NovaPOshta delivery address
                        $.ajax({
                            //url: './main/order',
                            url: base_url+'/main/order', //base_url Global variable containes base_path => header_layout.php
                            type: 'POST',
                            data: {order_delivery_s:np_delivery_address,payment_method:payment_method}, //send delivery address
                            success: function(msg) {
                                var respons_data = JSON.parse(msg); //decode json
                                //ОТВЕТ ПРИ СОЗДАНИИ ОРДЕРА НУЖНО ДОДЕЛАТЬ ПРИ ПРАВЕЛЬНОМ ВВЕДЕНИИ ГОРОДА



                                switch (respons_data[0]){       //needed array cell
                                    case 'successfully':
                                        //ДОДЕЛАТЬ ОТВЕТ СОЗДАНИЯ ОРДЕРА ПРИ ВВЕДЕНИИ АДРЕСА В РУЧНУЮ
                                        //Redirect на страницу ОТОБРАЖЕНИЯ ЗАКАЗА ПОКУПАТЕЛЯ


                                        //window.location.replace('./main/complete');
                                        window.location.replace(base_url+'main/complete');

                                        $('#submit-b-order-accept').removeAttr('disabled'); //button click on
                                        break;
                                    case 'quantity_error':
                                        //show error block and hide unnecessary elements
                                         $('#basket-error-info > p').html(respons_data[1]); //insert php validate error
                                         $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                         $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                         setTimeout(function () {                                 //hide display error block
                                         $('#basket-error-info').toggleClass("class_basket_info");
                                         $('#basket-error-info').css("display","none");
                                         $('#basket-error-info > p').html('');
                                         //hiding unnecessary elements of the basket if isset quantity error
                                         if($("#basket-body").css("display") == 'none'){      //if hide - show
                                         $("#basket-body").slideToggle("fast");          //show basket orders body if hiden
                                         };
                                         if($("#create-order").css("display") == 'block') {  //hide if visible order form
                                         $("#create-order").slideToggle("fast");
                                         $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                         }
                                         if($("#form-clear-basket").css("display") == 'none'){ //if button invisible
                                         $("#form-clear-basket").slideToggle("fast");      //made visible
                                         }
                                         if($("#submit-b-form").css("display") == 'none') {   //if button has display none
                                         $("#submit-b-form").toggleClass("hiden");        //show button
                                         }
                                         if($("#submit-b-order").css("display") == 'block') {  //if button has display block
                                         $("#submit-b-order").toggleClass("visible");      //hide button
                                         }
                                         if($('#delivery-block').css("display") == 'block') { //if visible
                                         $('#delivery-block').removeClass("hiden");        //hide block
                                         $('#delivery-block').css("display","none");      //hide block
                                         $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                         }
                                         if($('#submit-b-order-accept').css("display") == 'block') { //if visible
                                         $('#submit-b-order-accept').toggleClass("visible");     //hide block
                                         }
                                         if($('#pay-pal-pay-b').css("display") == 'block') {     //hide button 'PayPal pay'
                                         $('#pay-pal-pay-b').toggleClass("visible");
                                         }
                                             if($('#back-to-first').css("display") !== 'none') {      //hide button #back-to-first if visible
                                                 $('#back-to-first').css("display","none");
                                             }
                                             if($('#back-to-second').css("display") !== 'none') {      //hide button #list-b-back if visible
                                                 $('#back-to-second').css("display","none");
                                             }
                                             $('#submit-b-order-accept').removeAttr('disabled'); //button click on
                                         }, 5300);

                                        break;
                                    case 'error_input':
                                        $('#basket-error-info > p').html(respons_data[1]); //insert error reporting
                                        $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                        $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                        setTimeout(function () {                                 //hide display error block
                                            $('#basket-error-info').toggleClass("class_basket_info");
                                            $('#basket-error-info').css("display","none");
                                            $('#basket-error-info > p').html('');
                                            $('#submit-b-order-accept').removeAttr('disabled');  //button click on
                                        }, 5300);
                                        break;
                                    case 'db_error':
                                        $('#basket-error-info > p').html('Ошибка соединения, попробуйте еще раз'); //insert error reporting
                                        $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                        $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                        setTimeout(function () {                                 //hide display error block
                                            $('#basket-error-info').toggleClass("class_basket_info");
                                            $('#basket-error-info').css("display","none");
                                            $('#basket-error-info > p').html('');
                                            $('#submit-b-order-accept').removeAttr('disabled');  //button click on
                                        }, 5300);
                                        break;
                                }
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                                //alert(thrownError);
                            }
                        });
                    }
                }
                if(delivery_type_ms.prop('checked') == true){ // if client checked #by_himself ('take the goods' himself)

                    $.ajax({
                        //url: './main/order',
                        url: base_url+'/main/order', //base_url Global variable containes base_path => header_layout.php
                        type: 'POST',
                        data: {order_delivery_s:delivery_type_ms.val(),payment_method:payment_method}, //send delivery address
                        success: function(msg) {
                            var respons_data = JSON.parse(msg); //decode json
                            //console.log(respons_data);
                            //ДОДЕЛАТЬ ОТВЕТ ЕСЛИ КЛИЕНТ ВЫБРАЛ ДОСТАВКУ ЗАБРАТЬ САМОМУ
                            //Переадресация на страницу отображения заказа


                            switch (respons_data[0]){       //needed array cell
                                case 'successfully':
                                    //ДОДЕЛАТЬ ОТВЕТ СОЗДАНИЯ ОРДЕРА ПРИ ВВЕДЕНИИ АДРЕСА В РУЧНУЮ
                                    //Redirect на страницу ОТОБРАЖЕНИЯ ЗАКАЗА ПОКУПАТЕЛЯ
                                    window.location.replace(base_url+'main/complete');



                                    $('#submit-b-order-accept').removeAttr('disabled'); //button click on
                                    break;
                                case 'quantity_error':
                                    //show error block and hide unnecessary elements
                                    $('#basket-error-info > p').html(respons_data[1]); //insert php validate error
                                    $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                    $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                    setTimeout(function () {                                 //hide display error block
                                        $('#basket-error-info').toggleClass("class_basket_info");
                                        $('#basket-error-info').css("display","none");
                                        $('#basket-error-info > p').html('');
                                        //hiding unnecessary elements of the basket if isset quantity error
                                        if($("#basket-body").css("display") == 'none'){      //if hide - show
                                            $("#basket-body").slideToggle("fast");          //show basket orders body if hiden
                                        };
                                        if($("#create-order").css("display") == 'block') {  //hide if visible order form
                                            $("#create-order").slideToggle("fast");
                                            $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                        }
                                        if($("#form-clear-basket").css("display") == 'none'){ //if button invisible
                                            $("#form-clear-basket").slideToggle("fast");      //made visible
                                        }
                                        if($("#submit-b-form").css("display") == 'none') {   //if button has display none
                                            $("#submit-b-form").toggleClass("hiden");        //show button
                                        }
                                        if($("#submit-b-order").css("display") == 'block') {  //if button has display block
                                            $("#submit-b-order").toggleClass("visible");      //hide button
                                        }
                                        if($('#delivery-block').css("display") == 'block') { //if visible
                                            $('#delivery-block').removeClass("hiden");        //hide block
                                            $('#delivery-block').css("display","none");      //hide block
                                            $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                        }
                                        if($('#submit-b-order-accept').css("display") == 'block') { //if visible
                                            $('#submit-b-order-accept').toggleClass("visible");     //hide block
                                        }
                                        if($('#pay-pal-pay-b').css("display") == 'block') {     //hide button 'PayPal pay'
                                            $('#pay-pal-pay-b').toggleClass("visible");
                                        }
                                        if($('#back-to-first').css("display") !== 'none') {      //hide button #back-to-first if visible
                                            $('#back-to-first').css("display","none");
                                        }
                                        if($('#back-to-second').css("display") !== 'none') {      //hide button #list-b-back if visible
                                            $('#back-to-second').css("display","none");
                                        }
                                        $('#submit-b-order-accept').removeAttr('disabled'); //button click on
                                    }, 5300);

                                    break;
                                case 'error_input':
                                    $('#basket-error-info > p').html(respons_data[1]); //insert error reporting
                                    $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                    $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                    setTimeout(function () {                                 //hide display error block
                                        $('#basket-error-info').toggleClass("class_basket_info");
                                        $('#basket-error-info').css("display","none");
                                        $('#basket-error-info > p').html('');
                                        $('#submit-b-order-accept').removeAttr('disabled');  //button click on
                                    }, 5300);
                                    break;
                                case 'db_error':
                                    $('#basket-error-info > p').html('Ошибка соединения, попробуйте еще раз'); //insert error reporting
                                    $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                    $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                    setTimeout(function () {                                 //hide display error block
                                        $('#basket-error-info').toggleClass("class_basket_info");
                                        $('#basket-error-info').css("display","none");
                                        $('#basket-error-info > p').html('');
                                        $('#submit-b-order-accept').removeAttr('disabled');  //button click on
                                    }, 5300);
                                    break;
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.responseText);
                            //alert(thrownError);
                        }
                    });
                }
            });
            //show Pay_pal 'pay button' if checkbox PayPal is "checked"
            $("#pay_pay_pal").change(function(){
                if($("#pay_pay_pal").prop('checked') == true){
                    $('#submit-b-order-accept').toggleClass("visible");
                    $('#pay-pal-pay-b').toggleClass("visible");
                }
            });
            $("#pay_cash").change(function(){
                if($("#pay_cash").prop('checked') == true){
                    if(!$("#submit-b-order-accept").is(':visible')) {   //true if button 'hiden'
                        $('#pay-pal-pay-b').toggleClass("visible");
                        $('#submit-b-order-accept').toggleClass("visible");
                    }
                }
            })
            // end show Pay_pal button
            //delivery checkbox show delivery address
            $('#nova_poshta_d_check').change(function () {
                if($("#nova_poshta_d_check").prop('checked') == true){
                    $('#nova-poshta-delivery-address').toggleClass('visible');
                }
            });
            $('#by_himself').change(function () {
                if($("#by_himself").prop('checked') == true){
                    if ($('#nova-poshta-delivery-address').is(':visible')) {
                        $('#nova-poshta-delivery-address').toggleClass('visible'); //if true -> hide input
                    }
                }
            });
            // -/ delivery checkbox
            //true if checked box PayPal
            $('#pay-pal-pay-b').click(function(){ //if pay by PayPal
                $("#pay-pal-pay-b").attr('disabled', 'disabled'); // button click switch off
                var pay_sum = $(this).data('pp-total-sum'); //paypal -> pay order price
                var delivery_type_np = $("#nova_poshta_d_check"); //delivery checkbox
                var delivery_type_ms = $("#by_himself");          //delivery checkbox
                var payment_method_cash = $("#pay_cash");         //payment method
                var payment_method_paypal = $("#pay_pay_pal");    //payment method
                var delivery_address = $("input[name='werhouse-address']").val(); //if the buyer wants to deliver the goods himself
                var np_delivery_address = $("#werhouse-address").val();           //if buyer wants to deliver by NovaPoshta
                $('#b-close-basket').css("display","none");
                $('#back-to-second').css("display","none");

                if(delivery_type_np.prop('checked') == false && delivery_type_ms.prop('checked') == false) {
                    $('#basket-error-info > p').html('Выберите тип доставки'); //insert php validate error
                    $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                    $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {                                 //hide display error block
                        $('#basket-error-info').toggleClass("class_basket_info");
                        $('#basket-error-info').css("display","none");
                        $('#basket-error-info > p').html('');
                        $('#pay-pal-pay-b').removeAttr('disabled');
                    }, 5300);
                    return false;
                }
                if(payment_method_cash.prop('checked') == false && payment_method_paypal.prop('checked') == false) { //if payment method select false
                    $('#basket-error-info > p').html('Выберите тип оплаты'); //insert php validate error
                    $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                    $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {                                 //hide display error block
                        $('#basket-error-info').toggleClass("class_basket_info");
                        $('#basket-error-info').css("display","none");
                        $('#basket-error-info > p').html('');
                        $('#pay-pal-pay-b').removeAttr('disabled');
                    }, 5300);
                    return false;
                } else {
                    if(payment_method_cash.prop('checked') == true){
                        var payment_method = payment_method_cash.val();  //variable containes payment method
                    }
                    if(payment_method_paypal.prop('checked') == true){
                        var payment_method = payment_method_paypal.val();//variable containes payment method
                    }
                }
                if(delivery_type_np.prop('checked') == true) { //if NovaPoshta checked
                    if($('#np_error_werhouse').length == 1) { //if api 2.0 NovaPOshta respones false
                        if (delivery_address.length == 0) {
                            $('#basket-error-info > p').html('Введите адрес отделения новой почты'); //insert error reporting
                            $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                            $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                            setTimeout(function () {                                 //hide display error block
                                $('#basket-error-info').toggleClass("class_basket_info");
                                $('#basket-error-info').css("display","none");
                                $('#basket-error-info > p').html('');
                                $('#pay-pal-pay-b').removeAttr('disabled');
                            }, 5300);
                            return false;
                        }
                    }
                    if($('#np_error_werhouse').length == 0) { //if api 2.0 NovaPOshta respones true
                        if (np_delivery_address.length == 0) {
                            $('#basket-error-info > p').html('Выберите адрес доставки'); //insert error reporting
                            $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                            $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                            setTimeout(function () {                                 //hide display error block
                                $('#basket-error-info').toggleClass("class_basket_info");
                                $('#basket-error-info').css("display","none");
                                $('#basket-error-info > p').html('');
                                $('#pay-pal-pay-b').removeAttr('disabled');
                            }, 5300);
                            return false;
                        }
                    }
                    if($('#np_error_werhouse').length ==1) { // if the client had written the delivery address
                        $.ajax({
                            //url: './main/order',
                            url: base_url+'/main/order', //base_url Global variable containes base_path => header_layout.php
                            type: 'POST',
                            data: {pay_for_order:pay_sum,pay_order_delivery_s:delivery_address,pay_payment_method:payment_method}, //send pay amount for pay by PayPal
                            success: function(msg) {
                                var respons_data = JSON.parse(msg); //decode json
                                switch (respons_data[0]){           //needed array cell
                                    case 'quantity_positive':
                                        //ЕСЛИ ПОЛОЖИТЕЛЬНО ПРОВЕРИЛИ ОСТАТКИ ТО ПЕРЕАДРИСАЦИЯ НА СТРАНИЦУ ОПЛАТЫ
                                        //Создать страницу удачно созданого заказа с отображением номера заказа






                                        window.location.replace(respons_data[1]); //REDIRECT TO PAY PAL PAIMENT PAGE

                                        break;
                                    case 'quantity_error':
                                        $('#basket-error-info > p').html(respons_data[1]); //insert php validate error
                                        $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                        $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                        setTimeout(function () {                                 //hide display error block
                                            $('#basket-error-info').toggleClass("class_basket_info");
                                            $('#basket-error-info').css("display","none");
                                            $('#basket-error-info > p').html('');
                                            $('#pay-pal-pay-b').removeAttr('disabled');
                                            //hiding unnecessary elements of the basket if isset quantity error
                                            if($("#basket-body").css("display") == 'none'){      //if hide - show
                                                $("#basket-body").slideToggle("fast");          //show basket orders body if hiden
                                            };
                                            if($("#create-order").css("display") == 'block') {  //hide if visible order form
                                                $("#create-order").slideToggle("fast");
                                                $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                            }
                                            if($("#form-clear-basket").css("display") == 'none'){ //if button invisible
                                                $("#form-clear-basket").slideToggle("fast");      //made visible
                                            }
                                            if($("#submit-b-form").css("display") == 'none') {   //if button has display none
                                                $("#submit-b-form").toggleClass("hiden");        //show button
                                            }
                                            if($("#submit-b-order").css("display") == 'block') {  //if button has display block
                                                $("#submit-b-order").toggleClass("visible");      //hide button
                                            }
                                            if($('#delivery-block').css("display") == 'block') { //if visible
                                                $('#delivery-block').removeClass("hiden");        //hide block
                                                $('#delivery-block').css("display","none");      //hide block
                                                $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                            }
                                            if($('#submit-b-order-accept').css("display") == 'block') { //if visible
                                                $('#submit-b-order-accept').toggleClass("visible");     //hide block
                                            }
                                            if($('#pay-pal-pay-b').css("display") == 'block') {     //hide button 'PayPal pay'
                                                $('#pay-pal-pay-b').toggleClass("visible");
                                            }
                                            if($('#back-to-first').css("display") !== 'none') {      //hide button #back-to-first if visible
                                                $('#back-to-first').css("display","none");
                                            }
                                            if($('#back-to-second').css("display") !== 'none') {      //hide button #list-b-back if visible
                                                $('#back-to-second').css("display","none");
                                            }
                                            $('#pay-pal-pay-b').removeAttr('disabled');
                                        }, 5300);
                                        break;
                                }
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.responseText);
                                //alert(thrownError);
                            }
                        });
                    }

                    if($('#np_error_werhouse').length == 0) { // if the client had selected NovaPOshta delivery address

                        $.ajax({
                            //url: './main/order',
                            url: base_url+'/main/order', //base_url Global variable containes base_path => header_layout.php
                            type: 'POST',
                            data: {pay_for_order:pay_sum,pay_order_delivery_s:np_delivery_address,pay_payment_method:payment_method}, //send pay amount for pay by PayPal
                            success: function(msg) {
                                var respons_data = JSON.parse(msg); //decode json
                                switch (respons_data[0]){           //needed array cell
                                    case 'quantity_positive':
                                        //Если клиент выбрал доставку новой почты срабатывает этот пункт
                                        //переадрисация на страницу оплаты и еще создать страницу отображения ордера клиента



                                        window.location.replace(respons_data[1]); //REDIRECT TO PAY PAL PAIMENT PAGE

                                        break;
                                    case 'quantity_error':
                                        $('#basket-error-info > p').html(respons_data[1]); //insert php validate error
                                        $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                        $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                        setTimeout(function () {                                 //hide display error block
                                            $('#basket-error-info').toggleClass("class_basket_info");
                                            $('#basket-error-info').css("display","none");
                                            $('#basket-error-info > p').html('');
                                            //hiding unnecessary elements of the basket if isset quantity error
                                            if($("#basket-body").css("display") == 'none'){      //if hide - show
                                                $("#basket-body").slideToggle("fast");          //show basket orders body if hiden
                                            };
                                            if($("#create-order").css("display") == 'block') {  //hide if visible order form
                                                $("#create-order").slideToggle("fast");
                                                $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                            }
                                            if($("#form-clear-basket").css("display") == 'none'){ //if button invisible
                                                $("#form-clear-basket").slideToggle("fast");      //made visible
                                            }
                                            if($("#submit-b-form").css("display") == 'none') {   //if button has display none
                                                $("#submit-b-form").toggleClass("hiden");        //show button
                                            }
                                            if($("#submit-b-order").css("display") == 'block') {  //if button has display block
                                                $("#submit-b-order").toggleClass("visible");      //hide button
                                            }
                                            if($('#delivery-block').css("display") == 'block') { //if visible
                                                $('#delivery-block').removeClass("hiden");        //hide block
                                                $('#delivery-block').css("display","none");      //hide block
                                                $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                            }
                                            if($('#submit-b-order-accept').css("display") == 'block') { //if visible
                                                $('#submit-b-order-accept').toggleClass("visible");     //hide block
                                            }
                                            if($('#pay-pal-pay-b').css("display") == 'block') {     //hide button 'PayPal pay'
                                                $('#pay-pal-pay-b').toggleClass("visible");
                                            }
                                            if($('#back-to-first').css("display") !== 'none') {      //hide button #back-to-first if visible
                                                $('#back-to-first').css("display","none");
                                            }
                                            if($('#back-to-second').css("display") !== 'none') {      //hide button #list-b-back if visible
                                                $('#back-to-second').css("display","none");
                                            }
                                            $('#pay-pal-pay-b').removeAttr('disabled');
                                        }, 5300);
                                        break;
                                }
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                                //alert(thrownError);
                            }
                        });
                    }
                }
                if(delivery_type_ms.prop('checked') == true) { // if client 'take the goods' himself

                    $.ajax({
                        //url: './main/order',
                        url: base_url+'/main/order', //base_url Global variable containes base_path => header_layout.php
                        type: 'POST',
                        data: {
                            pay_for_order: pay_sum,
                            pay_order_delivery_s: delivery_type_ms.val(),
                            pay_payment_method: payment_method
                        }, //send pay amount for pay by PayPal
                        success: function (msg) {
                            var respons_data = JSON.parse(msg); //decode json
                            switch (respons_data[0]) {           //needed array cell
                                case 'quantity_positive':
                                    //если клиент выбрал забрать заказ самостоятельно
                                    //создать страницу отображения ордера что-бы на нее кидало после переадресации


                                    window.location.replace(respons_data[1]); //REDIRECT TO PAY PAL PAIMENT PAGE

                                    break;
                                case 'quantity_error':
                                    $('#basket-error-info > p').html(respons_data[1]); //insert php validate error
                                    $('#basket-error-info').toggleClass("class_basket_info"); //display error block
                                    $('#basket-error-info').animate({opacity: "toggle"}, 2000);
                                    setTimeout(function () {                                 //hide display error block
                                        $('#basket-error-info').toggleClass("class_basket_info");
                                        $('#basket-error-info').css("display", "none");
                                        $('#basket-error-info > p').html('');
                                        //hiding unnecessary elements of the basket if isset quantity error
                                        if ($("#basket-body").css("display") == 'none') {      //if hide - show
                                            $("#basket-body").slideToggle("fast");          //show basket orders body if hiden
                                        }
                                        ;
                                        if ($("#create-order").css("display") == 'block') {  //hide if visible order form
                                            $("#create-order").slideToggle("fast");
                                            $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                        }
                                        if ($("#form-clear-basket").css("display") == 'none') { //if button invisible
                                            $("#form-clear-basket").slideToggle("fast");      //made visible
                                        }
                                        if ($("#submit-b-form").css("display") == 'none') {   //if button has display none
                                            $("#submit-b-form").toggleClass("hiden");        //show button
                                        }
                                        if ($("#submit-b-order").css("display") == 'block') {  //if button has display block
                                            $("#submit-b-order").toggleClass("visible");      //hide button
                                        }
                                        if ($('#delivery-block').css("display") == 'block') { //if visible
                                            $('#delivery-block').removeClass("hiden");        //hide block
                                            $('#delivery-block').css("display", "none");      //hide block
                                            $("#basket-m-title").html("Корзина");           //change basket name if creat order form visible
                                        }
                                        if ($('#submit-b-order-accept').css("display") == 'block') { //if visible
                                            $('#submit-b-order-accept').toggleClass("visible");     //hide block
                                        }
                                        if ($('#pay-pal-pay-b').css("display") == 'block') {     //hide button 'PayPal pay'
                                            $('#pay-pal-pay-b').toggleClass("visible");
                                        }
                                        if($('#back-to-first').css("display") !== 'none') {      //hide button #back-to-first if visible
                                            $('#back-to-first').css("display","none");
                                        }
                                        if($('#back-to-second').css("display") !== 'none') {      //hide button #list-b-back if visible
                                            $('#back-to-second').css("display","none");
                                        }
                                        $('#pay-pal-pay-b').removeAttr('disabled');
                                    }, 5300);
                                    break;
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.responseText);
                            //alert(thrownError);
                        }
                    });
                }
            })
        }
    };
    return new doConstruct;
})();
//Increase goods quantity in basket
function basket_plus(id){ //updates quantity goods in the basket
    var goods_quantity = $('#b-goods-quantity-'+id).val();     //curent quantity
    goods_quantity++;                                          //Increase goods quantity
    $.ajax({                                                   //send new goods quantity to php, for change session basket quantity
        url: "http://localhost/bogdan/STORE/main/basket",
        type: "POST",
        data: {basket_goods_plus: goods_quantity,basket_goods_plus_id:id},
        success: function (data) {

        }
    });
    var goods_price = $('#b-goods-quantity-'+id).data("price");//goods price from data attr
    var new_goods_sum = goods_price * goods_quantity;          //new goods sum in basket
    //round new_goods_sum - to display the correct goods sum price
    //(Math.round( new_goods_sum * 100 )/100 ).toString(); //if need
    new_goods_sum = new_goods_sum.toFixed(2); //round for 2 decimal
    new_goods_sum = Number(new_goods_sum); //convert to number
    $('#goods-total-price-'+id).html(new_goods_sum+' '+'грн');
    var current_basket_sum_price = $('#total-basket-goods-sum').data("total_sum");
    current_basket_sum_price = Number(current_basket_sum_price); //convert to number
    var new_basket_total_sum = current_basket_sum_price+goods_price;
    //round new_goods_sum - to display the correct goods sum price
    //(Math.round( new_basket_total_sum * 100 )/100 ).toString();       //if need
    new_basket_total_sum = new_basket_total_sum.toFixed(2);              //round 2 decimal total basket goods sum price
    $('#total-basket-goods-sum').html(new_basket_total_sum+' '+'грн');   //update goods sum price
    $('#b-goods-quantity-'+id).val(goods_quantity);                      //update goods quantity
    $('#total-basket-goods-sum').data("total_sum",new_basket_total_sum); //update basket total goods sum price (update data attr for correct )
}
//Decrease goods quantity in basket
function basket_minus(id){ //updates quantity goods in the basket
    var goods_quantity = $('#b-goods-quantity-'+id).val();     //curent quantity
    if(goods_quantity > 1) {
        goods_quantity--;     //decrease goods quantity
        $.ajax({                                                   //send new goods quantity to php, for change session basket quantity
            url: "http://localhost/bogdan/STORE/main/basket",
            type: "POST",
            data: {basket_goods_minus: goods_quantity,basket_goods_minus_id:id},
            success: function (data) {

            }
        });
        var goods_price = $('#b-goods-quantity-' + id).data("price");//goods price from data attr
        var new_goods_sum = goods_price * goods_quantity;          //new goods sum in basket
        //round new_goods_sum - to display the correct goods sum price
        //(Math.round( new_goods_sum * 100 )/100 ).toString();
        new_goods_sum = new_goods_sum.toFixed(2);   //round for 2 decimal
        new_goods_sum = Number(new_goods_sum);      //convert to number
        $('#b-goods-quantity-' + id).val(goods_quantity); //show new goods quantity in basket
        $('#goods-total-price-' + id).html(new_goods_sum + ' ' + 'грн');  //add new goods total price
        var basket_indicator = $('#total-basket-goods-sum');
        var total_basket_sum = basket_indicator.data("total_sum"); //current total basket goods price sum
        var new_basket_sum = total_basket_sum - goods_price;   //new price sum of all goods in a basket
        //round new_goods_sum - to display the correct all basket goods sum price
        //(Math.round( new_basket_sum * 100 )/100 ).toString(); //if need
        new_basket_sum = new_basket_sum.toFixed(2);
        basket_indicator.html(new_basket_sum+ ' ' + 'грн');
        basket_indicator.data("total_sum", new_basket_sum);        //set new data attr - for correctly calculation
    } else {                //while reducing the number of goods if goods quantity <= 1 remove goods from basket
        $.ajax({                                                   //send new goods quantity to php, for change session basket quantity
            url: "http://localhost/bogdan/STORE/main/basket",
            type: "POST",
            data: {remove_basket_goods:id},
            success: function (data) {

            }
        });
        var basket_indicator = $('#total-basket-goods-sum');   //total basket goods sum price
        var goods_price = $('#b-goods-quantity-' + id).data("price");//goods price from data attr
        var total_basket_sum = basket_indicator.data("total_sum");   //current total basket goods price sum
        var new_basket_sum = total_basket_sum - goods_price;         //new price sum of all goods in a basket
        new_basket_sum = new_basket_sum.toFixed(2); //round to 2 decimal
        //basket_indicator.html(total_basket_sum - goods_price + ' ' + 'грн');
        basket_indicator.html(new_basket_sum + ' ' + 'грн');
        basket_indicator.data("total_sum", new_basket_sum);          //set new data attr - for correctly calculation
        $('#basket-row-'+id).remove();
    }
}
//product view
function product_view(id){
    console.log(id);
}
//input mask add phone number (script connect in ) libs/jquery_masked_library
jQuery(function($) {
    $.mask.definitions['~'] = '[+-]';
    $("#i-buyer-phone").mask("(999) 999-99-99");   //(#i-buyer-phone id of input form ) input mask add phone number (script connect in ) libs/jquery_masked_library
});


