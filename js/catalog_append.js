
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
        main.add_init_callback(this.show_upload_img_name);
        main.add_init_callback(this.validate_goods_add);
        main.add_init_callback(this.show_goods_add_error);
    };
    doConstruct.prototype = {
        show_upload_img_name: function () {
            $('#btn').click(function(){
                $('#upfile').click();
            });
            $("#upfile").change(function() {
                var files = $(this)[0].files;
                for (var i = 0; i < files.length; i++) {
                    if((i + 1) !== files.length) {          //If the last cell in the array - the name of the output append without ','
                        $("#btn").append(files[i].name+',  ');
                    } else {
                        $("#btn").append(files[i].name);
                    }
                }
            });
        },
        validate_goods_add: function () {
            $("input[name='new_goods_quantity']").keyup(function(){    //validate input quantity
                var goods_quantity = $("input[name='new_goods_quantity']").val(); //variable to check
                //var selector
                var order_info = $("#admin-orders-info");
                var modal = $("#modal-admin-orders-info");
                if(goods_quantity.indexOf('.') !== -1){        //if number has '.' remove
                    order_info.html('Wrong format');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                        $("input[name='new_goods_quantity']").val((goods_quantity.split(".")[0]));
                    }, 2000);
                }
                if(goods_quantity.indexOf(',') !== -1){        //if number has ',' remove
                    order_info.html('Wrong format');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                        $("input[name='new_goods_quantity']").val((goods_quantity.split(",")[0]));
                    }, 2000);
                }
                $("input[name='new_goods_quantity']").val(goods_quantity); //val value to input
            });
            $("input[name='new_goods_price']").keyup(function(){    //validate input price
                var goods_price = $("input[name='new_goods_price']").val(); //variable to check
                goods_price = goods_price.replace(',', '.');        //replace symbol if need
                //var selector
                var order_info = $("#admin-orders-info");
                var modal = $("#modal-admin-orders-info");
                if(goods_price.indexOf('..') !== -1){
                    order_info.html('Wrong format');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                        $("input[name='new_goods_price']").val((goods_price.split(".")[0]));
                    }, 2000);
                }
                $("input[name='new_goods_price']").val(goods_price);
            });
            $('#new_goods_button').click(function(){
                var goods_model = $("input[name='new_goods_model']").val();
                var goods_model_model = $("input[name='new_goods_model_model']").val();
                var goods_desc = $("input[name='new_goods_desc']").val();
                var goods_cat = $("select[name='new_goods_cat']").val();
                var goods_quantity = $("input[name='new_goods_quantity']").val();
                var goods_price = $("input[name='new_goods_price']").val();
                var check_file = $('#upfile').val();
                //var selector
                var order_info = $("#admin-orders-info");
                var modal = $("#modal-admin-orders-info");
                if(goods_model.length == 0) {
                    order_info.html('Required product name');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                    }, 2000);
                    return false
                }
                if(goods_model_model.length == 0) {
                    order_info.html('Required product model');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                    }, 2000);
                    return false
                }
                if(goods_desc.length == 0) {
                    order_info.html('Required description');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                    }, 2000);
                    return false
                }
                if(goods_cat.length == 0) {
                    order_info.html('Select goods category');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                    }, 2000);
                    return false
                }
                if(goods_quantity.length == 0 ) {
                    order_info.html('Required quantity');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                    }, 2000);
                    return false
                }
                if (!$.isNumeric(goods_quantity)) {                        //validate input quantity (only number)
                    order_info.html('Quantity is numeric');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                    }, 2000);
                    return false;
                }
                if (!$.isNumeric(goods_price)) {                        //validate input price (only number)
                    order_info.html('Price is numeric');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                    }, 2000);
                    return false;
                }
                if(check_file == 0 ) {
                    order_info.html('Required goods photo');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                    }, 2000);
                    return false
                }
                return true;  //if all rules === true , return true and submit form
            });
        },
        show_goods_add_error: function () {                      //display upload goods error
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

