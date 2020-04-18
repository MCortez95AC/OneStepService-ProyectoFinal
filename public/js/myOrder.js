$( document ).ready(function() {
  console.log( "ready!" );
});

// Remove Items From Cart
$('a.remove').click(function(){
    event.preventDefault();
    $( this ).parent().parent().parent().hide( 'slow', function(){ $( this ).remove(); } );
    console.log($('.name').text());
})
  // Just for testing, show all items
$('a.btna.continue').click(function(){
    $('li.items').show(400);
})