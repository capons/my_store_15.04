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
function send_edit_data(id,title,desc,keywords){
    //fill in the form by data that will be edited
    $("#modal_edit_news_id").val(id);
    $("#modal_edit_news_title").val(title);
    $("#modal_edit_news_desc").val(desc);
    $("#modal_edit_news_keywords").val(keywords);
}
//delete news data
function delete_news(id){
    if (confirm("Are you sure")){
        $.ajax({
            url: "http://localhost/bogdan/STORE/news/delete",
            type: "POST",
            data: {delete_news_id: id},
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
var news = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.show_modal);
        main.add_init_callback(this.edit_news_data);
        main.add_init_callback(this.add_news_modal_show);
        main.add_init_callback(this.add_news);
    };
    doConstruct.prototype = {
        show_modal: function () {
            $('.btn.btn-primary.btn-xs.user-edit').click(function(){
                $(".modal.users").css("display","block");
                $("#news_edit_form").css("display","block");
            });
            $(".btn.btn-primary.close-modal").click(function(){
                $(".modal.users").css("display","none");
                $("#news_edit_form").css("display","none");
            });
        },
        edit_news_data: function() {
            $("#button_edit_user_data").click(function(){
                $("#button_edit_user_data").attr('disabled', 'disabled');
                var form_data = $("#news_edit_form").serialize();
                var title = $("#modal_edit_news_title").val();
                var desc = $("#modal_edit_news_desc").val();
                var keywords = $("#modal_edit_news_keywords").val();
                if (title.length == 0) {                         //validate form data
                    $('#info').html('Required title');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_edit_user_data').removeAttr('disabled');
                    return false;
                }
                if (desc.length == 0) {
                    $('#info').html('Required description');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_edit_user_data').removeAttr('disabled');
                    return false;
                }
                if (keywords.length == 0){
                    $('#info').html('Required keywords');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_edit_user_data').removeAttr('disabled');
                    return false;
                }
                $.ajax({
                    url: "http://localhost/bogdan/STORE/news/edit",
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
        add_news_modal_show:function(){
            $('#admin_add_news').click(function(){
                $(".modal.users").css("display","block");
                $("#add_new_news_form").css("display","block");
            });
            $(".btn.btn-primary.close-modal").click(function(){
                $(".modal.users").css("display","none");
                $("#add_new_news_form").css("display","none");
            });
        },
        add_news:function(){
            $("#button_add_news").click(function(){
                $("#button_add_news").attr('disabled', 'disabled');
                var form_data = $("#add_new_news_form").serialize();
                var title = $("input[name='modal_news_title']").val();
                var desc = $("textarea[name='modal_news_desc']").val();
                var keywords = $("input[name='modal_news_keywords']").val();
                if (title.length == 0) {
                    $('#info').html('Required title');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_add_news').removeAttr('disabled');
                    return false;
                }
                if (desc.length == 0) {
                    $('#info').html('Required description');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_add_news').removeAttr('disabled');
                    return false;
                }
                if (keywords.length == 0){
                    $('#info').html('Required keywords');
                    $('#info').animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        $('#info').html('');
                    }, 3300);
                    $('#button_add_news').removeAttr('disabled');
                    return false;
                }
                $.ajax({
                    url: "http://localhost/bogdan/STORE/news/add",
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



