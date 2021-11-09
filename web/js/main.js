

$(document).ready(function(){

    $('.add-cart').on('click', function(e) {
        e.preventDefault();
       // e.stopImmediatePropagation()
 
     var id = $(this).data('id');
     $.ajax({
         url: '/cart/add',
         data: {id_product: id},
         type: 'GET',
         success: function(res){
             alert(id_product); 
         },
         error: function(){
             alert('error'); 
         },
           
     });

 }
 );
});