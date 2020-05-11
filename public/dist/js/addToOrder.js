/* import * as orderService from './services/OrderService'; */
async function newTempOrder(data){

    try {
        let response = await fetch(`/client/restaurant/tempOrder/create`,{
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        console.log(response);
        
        if (response.status === 200) {
            console.log("Orden temporal creado");
        }
        
    } catch (error) {
        console.log(error);
    }
}




$( document ).ready(function() {
    $('.addToOrder').click(()=>{
        let numberProducts = parseInt($('.badge-order').text())
        $('.badge-order').text(numberProducts + 1)

        const product = {
            name: $(event.target).closest('.card-body').find('.name').text(),
            price: $(event.target).closest('.card-body').find('.price').text(),
            image: $(event.target).closest('.card').find('.image').attr('src'),
            quantity: $(event.target).closest('.card-body').find('.qty').val()
        }
        newTempOrder(product);
    })
});





/*Plus minus button*/
$('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
$('.quantity').each(function() {
  var spinner = $(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});