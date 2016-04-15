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

//send edit data to the form #users_edit_form
function send_edit_data(id,name){
    //fill in the form by data that will be edited
    $("#edit_category_id").val(id);
    $("#edit_category_name").val(name);
}
var category = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.show_modal);             //show modal to edit category data
        main.add_init_callback(this.validate_category_add);
        main.add_init_callback(this.show_category_add_error);
        main.add_init_callback(this.edit_category);
        main.add_init_callback(this.sort_category);
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
        validate_category_add: function () {
            $('#new_cat_button').click(function(){
                var category = $("input[name='new_category_name']").val();
                var description = $("textarea[name='new_category_desc']").val();
                //var selector
                var order_info = $("#admin-orders-info");
                var modal = $("#modal-admin-orders-info");
                if(category.length == 0) {
                    order_info.html('Required category name');
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide');
                        order_info.html('');
                    }, 2000);
                    return false
                }
                if(description.length == 0) {
                    order_info.html('Required description');
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
        show_category_add_error: function () {                      //display upload goods error
            var order_info = $("#admin-orders-error-info");         //var selector
            var modal = $("#modal-admin-orders-error-info");       //var selector
            order_info.toggleClass('form_error');
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
        },
        edit_category: function () {
            $("#button_edit_product_data").click(function() {               //send data by ajax to php
                $("#button_edit_product_data").attr('disabled', 'disabled');
                var form_data = $("#category_edit_form").serialize();
                var cat_id = $("#edit_category_id").val();
                var cat_name = $("#edit_category_name").val();
                var info = $('#info');
                //validate form input
                if (cat_name.length == 0) {
                    info.html('Required category name');
                    info.animate({opacity: "toggle"}, 2000);
                    setTimeout(function () {
                        info.html('');
                    }, 3300);
                    $('#button_edit_product_data').removeAttr('disabled');
                    return false;
                }
                $.ajax({
                    url: "http://localhost/bogdan/STORE/categories/edit",
                    type: "POST",
                    data: form_data,
                    async: false,
                    success: function (data) {
                        info.html(data);
                        info.animate({opacity: "toggle"}, 3000);
                        $('#row-user-data-' +cat_id+ ' td:nth-child(2)').html(cat_name); //show changes for users
                        setTimeout(function () {
                            $('.modal.users').css('display', 'none');
                            info.html('');
                            $('#button_edit_product_data').removeAttr('disabled');
                        }, 3000);

                    },
                    cache: false,
                    processData: false
                });
            });
        },
        sort_category: function() {  //sorting (#category-tree) (html forming category/main)
            var options = {          //option to sorting category tree
                //currElClass: 'category-tree',
                //listSelector: 'ul',
                //hintWrapperClass: 'hintClass',
                // or like a jQuery css object
                hintWrapperCss: {'background-color':'green', 'border':'1px dashed white'},
                // insertZonePlus: true,
                complete: function(currEl)
                {
                    var id = currEl.context.id;                                       //curent draggable element id
                    var has_child = $("#"+currEl.context.id);                         //check has child or no
                    var tree_obj = $('#category-tree').sortableListsToArray();        //all category dom tree
                    var result = $.grep(tree_obj, function(e){ return e.id == id; }); //find in dom tree need id
                    if (has_child.children().length == 0 ) {   //true if draggable category have no child and true if new category has parent
                        var curent_cat_id = currEl.context.id; //draggable category
                        if(typeof(result[0].parentId) !== 'undefined'){ //if we want to make the category "Parent" change the value to 0
                            var parent_cat_id = result[0].parentId;     //drop category new parent id
                        } else {
                            var parent_cat_id = 0;
                        }
                        var querystring = "curent_cat_id="+curent_cat_id+"&parent_cat_id="+parent_cat_id; //variable to send data by ajax
                        $.ajax({
                            url: "http://localhost/bogdan/STORE/categories/edit",
                            type: "POST",
                            data: querystring,
                            async: false,
                            success: function (data) {
                                $("#user_delete_info").html(data);
                                $("#modal_edit_cat_parent").modal('show');
                                setTimeout(function () {
                                    $("#modal_edit_cat_parent").modal('hide');
                                    $('#user_delete_info').html('');
                                }, 2000);
                            },
                            cache: false,
                            processData: false
                        })
                    }
                }
            }
            $('#cat_tree_div').sortableLists( options ); //load sortable library for category tree (#category-tree parent tree div category/main)
        }
    };
    return new doConstruct;
})();




