$(document).ready(function () {

    $('#paymentLabel').text("Pay "+$('#total').text()+" with: ")

    let ordered = "";
    const total = $('#total').text();

    $('.prductName').each(function(idex, element) {

        ordered += $(element).text()+" ,";
    });

    const data = {
        ordered: ordered,
        total: total
    }

    $('#chargeToHotelAccount').click( async () =>{
        try {
            let response = await fetch(`/client/restaurant/tempOrder/chargeOnHotelAccount`,{
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            
            if (response.status === 200) {
                $('#successMessage').text('You will have your order less tha 10 minutes.\n Redirecting to home...')
                $('#payment').modal('hide')
                $('#payment-success').modal('show')
                
                setTimeout(
                    function() 
                    {
                        $('#payment-success').modal('hide')
                        $('.modal-backdrop').remove();
                    }, 3000);
                setTimeout(
                    function() 
                    {
                        window.location.href = "home"
                    }, 3500);

            }
            
        } catch (error) {
            console.log(error);
        }
    })
});