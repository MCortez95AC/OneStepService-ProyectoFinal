// Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var PUSHER_APP_KEY = "5512f5bad9436d2161df"
    var pusher = new Pusher(PUSHER_APP_KEY, {
    cluster: 'eu',
    forceTLS: true
    });

    var channel = pusher.subscribe('channel-test');
    channel.bind('event-pusher', function(data) {
    // alert(JSON.stringify(data));
    console.log(data.data)
    const message = data.data
    var node = document.createElement("LI");
    var textnode = document.createTextNode(message.user+"=>"+message.message);
    node.appendChild(textnode);
    document.getElementById("myList").appendChild(node);

});