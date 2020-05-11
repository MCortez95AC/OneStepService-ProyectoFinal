// Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    let PUSHER_APP_KEY = "5512f5bad9436d2161df"
    let pusher = new Pusher(PUSHER_APP_KEY, {
    cluster: 'eu',
    forceTLS: true
    });

    const channel = pusher.subscribe('channel-sendToRestaurant');
    channel.bind('event-sendOrder', function(data) {
    // alert(JSON.stringify(data));
    const order = data.data
    document.getElementById('orders').innerHTML += "<tr><td>"+order.room+"</td><td>"+order.client_name+" "+order.client_lastname+"</td><td>"+order.ordered+"</td><td><button class='btn btn-success btn-sm' >Solved</button></td></tr>"
});