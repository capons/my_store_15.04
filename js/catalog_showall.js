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
var main_function = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.orders_details)
    };
    doConstruct.prototype = {
        //using in views/sales_orders_view11111.php
        orders_details: function () {
            $('#order_product_details').click(function(){
                $('#order_details_ul li').removeClass('active');
                $(this).addClass('active');
                $('#order_detailes_show').css('display','none');
                $('#order_product_show').css('display','table');
            });
            $('#order_details').click(function(){
                $('#order_details_ul li').removeClass('active');
                $(this).addClass('active');
                $('#order_product_show').css('display','none');
                $('#order_detailes_show').css('display','block');
            });
        }
    };
    return new doConstruct;
})();

//send edit data to the form #users_edit_form
function send_edit_data(id,name,model,desc,price,quantity){
    //fill in the form by data that will be edited
    $("#edit_product_id").val(id);
    $("#edit_product_name").val(name);
    $("#edit_product_model").val(model);
    $("#edit_product_desc").val(desc);
    $("#edit_product_price").val(price);
    $("#edit_product_quantity").val(quantity);
}
var product_manipulation = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.show_modal);             //show modal to edit product data
        main.add_init_callback(this.validate_product_edit);  //validate product edit input data
        main.add_init_callback(this.show_product_error);
    };
    doConstruct.prototype = {
        show_modal: function () {
            $('.btn.btn-primary.btn-xs.user-edit').click(function(){
                $(".modal.users").css("display","block");
            });
            $(".btn.btn-primary.close-modal").click(function(){
                $(".modal.users").css("display","none");
            });

        },
        validate_product_edit: function() {      //edit order data
            $("input[name='edit_product_price']").keyup(function(){    //validate input price
                var goods_price = $("input[name='edit_product_price']").val(); //variable to check
                goods_price = goods_price.replace(',', '.');        //replace symbol if need
                //var selector
                if(goods_price.indexOf('..') !== -1){ //if number have '..' (remove from)
                    $('#info').html('Wrong format');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $("input[name='edit_product_price']").val((goods_price.split(".")[0]));
                } else {
                    $("input[name='edit_product_price']").val(goods_price);
                }
            });
            $("input[name='edit_product_quantity']").keyup(function(){    //validate input quantity
                var goods_quantity = $("input[name='edit_product_quantity']").val(); //variable to check
                if(goods_quantity.indexOf('.') !== -1){        //if number has '.' remove
                    $('#info').html('Wrong format');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $("input[name='edit_product_quantity']").val((goods_quantity.split(".")[0]));
                }
                if(goods_quantity.indexOf(',') !== -1){        //if number has ',' remove
                    $('#info').html('Wrong format');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $("input[name='edit_product_quantity']").val((goods_quantity.split(",")[0]));
                }
                $("input[name='new_goods_quantity']").val(goods_quantity); //val value to input
            });
            $("#button_edit_product_data").click(function(){               //send data by ajax to php
                $("#button_edit_product_data").attr('disabled', 'disabled');
                var form_data = $("#product_edit_form").serialize();
                var product_id = $("#edit_product_id").val();
                var name = $("#edit_product_name").val();
                var model = $("#edit_product_model").val();
                var desc = $("#edit_product_desc").val();
                var price = $("#edit_product_price").val();
                var quantity = $("#edit_product_quantity").val();
                var info = $('#info');
                //validate form input
                if (name.length == 0){
                    info.html('Required name');
                    info.animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        info.html('');
                    }, 3300);
                    $('#button_edit_product_data').removeAttr('disabled');
                    return false;
                }
                if (model.length == 0){
                    info.html('Required model');
                    info.animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        info.html('');
                    }, 3300);
                    $('#button_edit_product_data').removeAttr('disabled');
                    return false;
                }
                if (desc.length == 0){
                    info.html('Required descriptiuon');
                    info.animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        info.html('');
                    }, 3300);
                    $('#button_edit_product_data').removeAttr('disabled');
                    return false;
                }
                if(price.length == 0 ) {
                    info.html('Required price');
                    info.animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        info.html('');
                    }, 3300);
                    $('#button_edit_product_data').removeAttr('disabled');
                    return false;
                }
                if (!$.isNumeric(price)) {                        //validate input quantity (only number)
                    info.html('Price is numeric');
                    info.animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        info.html('');
                    }, 3300);
                    $('#button_edit_product_data').removeAttr('disabled');
                    return false;
                }
                if(quantity.length == 0 ) {
                    info.html('Required quantity');
                    info.animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        info.html('');
                    }, 3300);
                    $('#button_edit_product_data').removeAttr('disabled');
                    return false;
                }
                if (!$.isNumeric(quantity)) {                        //validate input quantity (only number)
                    info.html('Quantity is numeric');
                    info.animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        info.html('');
                    }, 3300);
                    $('#button_edit_product_data').removeAttr('disabled');
                    return false;
                }
                $.ajax({
                    url: "http://localhost/bogdan/STORE/catalog/editproduct",
                    type: "POST",
                    data: form_data,
                    async: false,
                    success: function (data) {
                        info.html(data);
                        info.animate({opacity: "toggle"}, 3000);
                        $('#row-user-data-'+product_id+' td:nth-child(3)').html(name); //show changes for users
                        $('#row-user-data-'+product_id+' td:nth-child(4)').html(model); //show changes for users
                        $('#row-user-data-'+product_id+' td:nth-child(5)').html(price); //show changes for users
                        $('#row-user-data-'+product_id+' td:nth-child(6)').html(quantity); //show changes for users
                        setTimeout(function () {
                            $('.modal.users').css('display','none');
                            info.html('');
                            $('#button_edit_product_data').removeAttr('disabled');
                        }, 3000);

                    },
                    cache: false,
                    processData: false
                })
            });

        },
        show_product_error: function () {                      //display upload goods error
            var order_info = $("#admin-orders-error-info");      //var selector
            order_info.toggleClass('form_error');
            var modal = $("#modal-admin-orders-error-info");     //var selector
            if ($("#admin-orders-error-info .form_error").length > 0){  //if goods error true = display them
                modal.modal('show');
                setTimeout(function () {
                    modal.modal('hide');
                    order_info.toggleClass('form_error');
                }, 4000);
            }
            var img_load_error = $(".form_error_img").length;
            if(img_load_error !== 0){                       //if upload image error true = display them
                modal.modal('show');
                setTimeout(function () {
                    modal.modal('hide');
                    order_info.toggleClass('form_error_img');
                }, 4000);
            }
        }
    };
    return new doConstruct;
})();

//validate filter form input #filter-order-form
function filter_check(){
    var check_form_empty = $('#filter-product-form').serializeArray();
    var empty_form_array = [];              //if filter form input empty push input name field into array
    jQuery.each( check_form_empty, function( i, field ) {
        if((field.value).length == 0){
            empty_form_array.push(field.name);
        }
    });
    if(empty_form_array.length == 5 ){   //if == 6 (input empty) return false
        $('#filter-orders-b').removeAttr('disabled');
        $("#admin-orders-info").html('Filter input empty');
        $("#modal-admin-orders-info").modal('show');
        setTimeout(function () {
            $("#modal-admin-orders-info").modal('hide');
            $('#admin-orders-info').html('');
        }, 2000);
        return false;
    }
    var filter_product_price = $( "input[name='ad_product_price']" ).val();      //validate input data
    var filter_product_quantity = $( "input[name='ad_product_quantity']" ).val();     //validate input data
    if(filter_product_price != 0 ) {
        if (!$.isNumeric(filter_product_price)) {                        //validate input tell (only number)
            $('#filter-orders-b').removeAttr('disabled');
            $("#admin-orders-info").html('Product price is numeric');
            $("#modal-admin-orders-info").modal('show');
            setTimeout(function () {
                $("#modal-admin-orders-info").modal('hide');
                $('#admin-orders-info').html('');
            }, 2000);
            return false;
        }
    }
    if(filter_product_quantity != 0) {
        if (!$.isNumeric(filter_product_quantity)) {
            $('#filter-orders-b').removeAttr('disabled');
            $("#admin-orders-info").html('Product quantity is numeric');
            $("#modal-admin-orders-info").modal('show');
            setTimeout(function () {
                $("#modal-admin-orders-info").modal('hide');
                $('#admin-orders-info').html('');
            }, 2000);
            return false;
        }
    }
}



