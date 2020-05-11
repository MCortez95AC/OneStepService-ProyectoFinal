$(document).ready(function () {

  if (screen.width > 700) {
    $('.movil').remove();

  }
  if (screen.width < 700) {
    $('.desktop').remove();
  }

  $('.infoWrap').each(function (element) {
    $('.totalProduct').text(($('.qty').val() * parseFloat($('.price').text())).toFixed(2));
  })

  let total = 0;
  $('.totalProduct').each(function (idex, element) {

    total += parseFloat($(element).text());
  });

  $('#total').text(total);

});

// Remove Items From Cart
$('a.remove').click(function () {
  event.preventDefault();
  $(this).parent().parent().parent().hide('slow', function () { $(this).remove(); });
})
