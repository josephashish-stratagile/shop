$(document).ready(function(e){
    var cart = Cookies.get('cart');
    if(jQuery.isEmptyObject(cart)){
        cart = "";
    }

    $(".btn.btn-outline-primary.btn-sm.mt-2").click(function(){
        productId = $(this).attr('data-productid');
        if (cart.indexOf(productId) == -1) {
        $(this).html('Remove from cart'); 
            cart = cart + "," +productId;
            Cookies.set('cart', cart);
        }else{
            $(this).html('Add to cart'); 
            cart = cart.replace(","+productId, "");
            Cookies.set('cart', cart);
        }
    });
});