/* import * as orderService from './services/OrderService'; */

async function newTempOrder(data){
    try {
        const response = await fetch("http://onestepservice.com/client/restaurant/tempOrder/create",{
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })

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
            image: $(event.target).closest('.card').find('.image').attr('src')
        }

        newTempOrder(product);
    })
});