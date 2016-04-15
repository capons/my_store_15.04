$(document).ready(function(){
    $('#order-complete-m').modal('show');
    $('#close-complete').click(function(){ //if click redirect
        window.location.replace('./angel');
    });
    /*
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
    */
    
});