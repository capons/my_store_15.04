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
        main.add_init_callback(this.calendar_picker);
        main.add_init_callback(this.orders_details)
    };
    doConstruct.prototype = {
        //show calendar library and selec date
        //calendar library libs/calendar
        calendar_picker: function () {
            $('#filter-d-add').datepick({  //datapick calendar library libs/calendar
                dateFormat: 'yyyy-mm-dd',
                altField: '#filter-date-add',
                altFormat: 'yyyy-mm-dd',
                });
            $('#filter-d-mod').datepick({  //datapick calendar library libs/calendar
                dateFormat: 'yyyy-mm-dd',
                altField: '#filter-date-mod',
                altFormat: 'yyyy-mm-dd',
            });
        },
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
function send_edit_data(id,status){
    //fill in the form by data that will be edited
    $("#modal_edit_user_id").val(id);
    $("#modal_edit_user_role").html(status);
    if(status == 'Paid'){
        $('#paid').css('display','none');
    } else {
        $('#not_paid').css('display','none');
    }
    old_status = status; //global variabele to check old status and new status  (function 'edit_order_data')
}
function delete_order(id,status){
    if (confirm("Are you sure")){
        if(status == 'Paid'){
            $('#admin-orders-info').html('Paid orders can not be deleted');
            $('#modal-admin-orders-info').modal('show');
            setTimeout(function(){
                $('#modal-admin-orders-info').modal('hide');
            },2000);
            return false;
        }
        $.ajax({
            url: "http://localhost/bogdan/STORE/sales/delete",
            type: "POST",
            data: {delete_order_id: id},
            success: function (data) {
                $("#admin-orders-info").html(data);
                $("#modal-admin-orders-info").modal('show');
                var delete_user_row = 'row-user-data-'+id;
                $("#"+delete_user_row).remove();
                setTimeout(function () {
                    $("#modal-admin-orders-info").modal('hide');
                    $('#admin-orders-info').html('');
                }, 2000);
            },
        })
        return true;
    }else {

        return false;
    }
}
var orders_manipulation = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.show_modal);
        main.add_init_callback(this.edit_order_data);
    };
    doConstruct.prototype = {
        show_modal: function () {
            $('.btn.btn-primary.btn-xs.user-edit').click(function(){
                $(".modal.users").css("display","block");
                $("#users_edit_form").css("display","block");
            });
            $(".btn.btn-primary.close-modal").click(function(){
                $(".modal.users").css("display","none");
                $("#users_edit_form").css("display","none");
            });
        },
        edit_order_data: function() {      //edit order data
            $("#button_edit_user_data").click(function(){
                $("#button_edit_user_data").attr('disabled', 'disabled');
                var form_data = $("#users_edit_form").serialize();
                var new_role = $("#selected-role").change().val();
                var order_id = $("#modal_edit_user_id").val();
                if(old_status == new_role){  //if status not change - return false
                    $('#info').html('Change status');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_edit_user_data').removeAttr('disabled');
                    return false;
                }
                if (new_role.length == 0){
                    $('#info').html('Required role');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_edit_user_data').removeAttr('disabled');
                    return false;
                }
                $.ajax({
                    url: "http://localhost/bogdan/STORE/sales/edit",
                    type: "POST",
                    data: form_data,
                    async: false,
                    success: function (data) {
                        $('#info').html(data);
                        $('#info').animate({opacity: "toggle"}, 3000);
                        $('#row-user-data-'+order_id+' td:nth-child(4)').html(new_role);
                        setTimeout(function () {
                            $('.modal.users').css('display','none');
                            $('#info').html('');
                            $('#button_edit_user_data').removeAttr('disabled');
                        }, 3000);
                    },
                    cache: false,
                    processData: false
                })
            });
        }
    };
    return new doConstruct;
})();

//validate filter form input #filter-order-form
function filter_check(){
    var check_form_empty = $('#filter-order-form').serializeArray();
    var empty_form_array = [];              //if filter form input empty push input name field into array
    jQuery.each( check_form_empty, function( i, field ) {
        if((field.value).length == 0){
            empty_form_array.push(field.name);
        }
    });
    if(empty_form_array.length == 6 ){   //if == 6 (input empty) return false
        $('#filter-orders-b').removeAttr('disabled');
        $("#admin-orders-info").html('Filter input empty');
        $("#modal-admin-orders-info").modal('show');
        setTimeout(function () {
            $("#modal-admin-orders-info").modal('hide');
            $('#admin-orders-info').html('');
        }, 2000);
        return false;
    }
    var filter_order_id = $( "input[name='order_id']" ).val();      //validate input data
    var filter_total = $( "input[name='filter_total']" ).val();     //validate input data
    if(filter_order_id != 0 ) {
        if (!$.isNumeric(filter_order_id)) {                        //validate input tell (only number)
            $('#filter-orders-b').removeAttr('disabled');
            $("#admin-orders-info").html('Order id is numeric');
            $("#modal-admin-orders-info").modal('show');
            setTimeout(function () {
                $("#modal-admin-orders-info").modal('hide');
                $('#admin-orders-info').html('');
            }, 2000);
            return false;
        }
    }
    if(filter_total != 0) {
        if (!$.isNumeric(filter_total)) {
            $('#filter-orders-b').removeAttr('disabled');
            $("#admin-orders-info").html('Total is numeric');
            $("#modal-admin-orders-info").modal('show');
            setTimeout(function () {
                $("#modal-admin-orders-info").modal('hide');
                $('#admin-orders-info').html('');
            }, 2000);
            return false;
        }
    }
}



