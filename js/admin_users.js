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
//send edit data to the form
function send_edit_data(id,name,pass,email,tell,role){
    //fill in the form by data that will be edited
    $("#modal_edit_user_id").val(id);
    $("#modal_edit_user_name").val(name);
    $("#modal_edit_user_pass").val(pass);
    $("#modal_edit_user_email").val(email);
    $("#modal_edit_user_tell").val(tell);
    //$("#modal_edit_user_role").html(role);
    switch(role) {
        case '1':
            $("#modal_edit_user_role").html('User');
            break;
        case '2':
            $("#modal_edit_user_role").html('Advanced user');
            break;
        case '3':
            $("#modal_edit_user_role").html('Moderator');
            break;
        case '4':

            $("#modal_edit_user_role").html('Administrator');
            break;
        default:
            console.log('default');
    }
}
//delete user data
function delete_user(id){
    if (confirm("Are you sure")){
        $.ajax({
            url: "http://localhost/bogdan/STORE/users/delete",
            type: "POST",
            data: {delete_user_id: id},
            success: function (data) {
                $("#user_delete_info").html(data);
                $("#modal_delete_user_info").modal('show');
                var delete_user_row = 'row-user-data-'+id;
                $("#"+delete_user_row).remove();
                setTimeout(function () {
                    $("#modal_delete_user_info").modal('hide');
                    $('#user_delete_info').html('');
                }, 2000);
            },
        })
        return true;
    }else {

        return false;
    }
}
var users = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.show_modal);
        main.add_init_callback(this.edit_user_data);
        main.add_init_callback(this.add_user_modal_show);
        main.add_init_callback(this.add_new_user);
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
        edit_user_data: function() {
            $("#button_edit_user_data").click(function(){
                $("#button_edit_user_data").attr('disabled', 'disabled');
                var form_data = $("#users_edit_form").serialize();
                var new_name = $("#modal_edit_user_name").val();
                var new_pass = $("#modal_edit_user_pass").val();
                var new_email = $("#modal_edit_user_email").val();
                var new_phone = $("#modal_edit_user_tell").val();
                var new_role = $("#selected-role").change().val();
                if (new_name.length == 0) {
                    $('#info').html('Required name');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_edit_user_data').removeAttr('disabled');
                    return false;
                }
                if (new_pass.length == 0) {
                    $('#info').html('Required password');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_edit_user_data').removeAttr('disabled');
                    return false;
                }
                if (new_email.length == 0){
                    $('#info').html('Required email');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_edit_user_data').removeAttr('disabled');
                    return false;
                }
                if (new_email.indexOf('.', 0) == -1 || new_email.indexOf('@', 0) == -1) {
                    $('#info').html('Wrong email');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_edit_user_data').removeAttr('disabled');
                    return false;
                }
                if (new_phone.length == 0){               //validate input phone
                    $('#info').html('Required phone');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_edit_user_data').removeAttr('disabled');
                    return false;
                }
                if ($.isNumeric(new_phone)) {             //validate input tell (only number)

                } else {
                    $('#info').html('Phone input is numeric');
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
                    url: "http://localhost/bogdan/STORE/users/edit",
                    type: "POST",
                    data: form_data,
                    async: false,
                    success: function (data) {
                        $('#info').html(data);
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    },
                    cache: false,
                    processData: false
                })
            });
        },
        add_user_modal_show:function(){
            $('#admin_add_new_user').click(function(){
                $(".modal.users").css("display","block");
                $("#add_new_user_form").css("display","block");
            });
            $(".btn.btn-primary.close-modal").click(function(){
                $(".modal.users").css("display","none");
                $("#add_new_user_form").css("display","none");
            });
        },
        add_new_user:function(){
            $("#button_add_user_data").click(function(){
                $("#button_add_user_data").attr('disabled', 'disabled');
                var form_data = $("#add_new_user_form").serialize();
                var new_name = $("#modal_add_user_name").val();
                var new_pass = $("#modal_add_user_pass").val();
                var new_email = $("#modal_add_user_email").val();
                var new_phone = $("#modal_add_user_tell").val();
                var new_role = $("#selected-new-role").val();
                if (new_name.length == 0) {
                    $('#info').html('Required name');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_add_user_data').removeAttr('disabled');
                    return false;
                }
                if (new_pass.length == 0) {
                    $('#info').html('Required password');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_add_user_data').removeAttr('disabled');
                    return false;
                }
                if (new_email.length == 0){
                    $('#info').html('Required email');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_add_user_data').removeAttr('disabled');
                    return false;
                }
                if (new_email.indexOf('.', 0) == -1 || new_email.indexOf('@', 0) == -1) {
                    $('#info').html('Wrong email');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_add_user_data').removeAttr('disabled');
                    return false;
                }
                if (new_phone.length == 0){               //validate input phone
                    $('#info').html('Required phone');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_add_user_data').removeAttr('disabled');
                    return false;
                }
                if ($.isNumeric(new_phone)) {             //validate input tell (only number)

                } else {
                    $('#info').html('Phone input is numeric');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_add_user_data').removeAttr('disabled');
                    return false;
                }
                if (new_role.length == 0){
                    $('#info').html('Required role');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_add_user_data').removeAttr('disabled');
                    return false;
                }
                $.ajax({
                    url: "http://localhost/bogdan/STORE/users/add",
                    type: "POST",
                    data: form_data,
                    async: false,
                    success: function (data) {
                        $('#info').html(data);
                        setTimeout(function () {
                            location.reload();
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
