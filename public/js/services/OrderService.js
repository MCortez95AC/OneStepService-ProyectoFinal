async function newTempOrder(data){
    try {
        const response = await fetch("{{ url('/tempOrder/create') }}",{
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                'Content-Yype': 'application/json'
            },
            body: JSON.stringify(data)
        })

        console.log(response);
        
    } catch (error) {
        console.log(error);
    }
}

export{newTempOrder}