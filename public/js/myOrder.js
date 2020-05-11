$( document ).ready(function() {
  
  $('.prodTotal').each(function() {
    let toatalProd = Math.round(($('.qty').val() * parseFloat($('.price').text()) * 100 ) / 100).toFixed(2)
    let alt = ($('.qty').val() * parseFloat($('.price').text())).toFixed(2)
    $('.totalProduct').text(alt)
  })
  
});

// Remove Items From Cart
$('a.remove').click(function(){
    event.preventDefault();
    $( this ).parent().parent().parent().hide( 'slow', function(){ $( this ).remove(); } );
})
  // Just for testing, show all items
$('a.btna.continue').click(function(){
    $('li.items').show(400);
})