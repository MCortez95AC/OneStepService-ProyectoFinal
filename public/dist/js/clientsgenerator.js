    $( document ).ready(function() {
        $('.bg-unavailable').removeAttr("onClick");
        
    })
    
    const nameList = [
        'Time','Past','Future','Dev',
        'Fly','Flying','Soar','Soaring','Power','Falling',
        'Fall','Jump','Cliff','Mountain','Rend','Red','Blue',
        'Green','Yellow','Gold','Demon','Demonic','Panda','Cat',
        'Kitty','Kitten','Zero','Memory','Trooper','XX','Bandit',
        'Fear','Light','Glow','Tread','Deep','Deeper','Deepest',
        'Mine','Your','Worst','Enemy','Hostile','Force','Video',
        'Game','Donkey','Mule','Colt','Cult','Cultist','Magnum',
        'Gun','Assault','Recon','Trap','Trapper','Redeem','Code',
        'Script','Writer','Near','Close','Open','Cube','Circle',
        'Geo','Genome','Germ','Spaz','Shot','Echo','Beta','Alpha',
        'Gamma','Omega','Seal','Squid','Money','Cash','Lord','King',
        'Duke','Rest','Fire','Flame','Morrow','Break','Breaker','Numb',
        'Ice','Cold','Rotten','Sick','Sickly','Janitor','Camel','Rooster',
        'Sand','Desert','Dessert','Hurdle','Racer','Eraser','Erase','Big',
        'Small','Short','Tall','Sith','Bounty','Hunter','Cracked','Broken',
        'Sad','Happy','Joy','Joyful','Crimson','Destiny','Deceit','Lies',
        'Lie','Honest','Destined','Bloxxer','Hawk','Eagle','Hawker','Walker',
        'Zombie','Sarge','Capt','Captain','Punch','One','Two','Uno','Slice',
        'Slash','Melt','Melted','Melting','Fell','Wolf','Hound',
        'Legacy','Sharp','Dead','Mew','Chuckle','Bubba','Bubble',
        'Sandwich','Smasher','Extreme','Multi','Universe','Ultimate',
        'Death','Ready','Monkey','Elevator','Wrench','Grease','Head',
        'Theme','Grand','Cool','Kid','Boy','Girl','Vortex','Paradox'
    ]; 
    
    let finalName = ""
    let username = $("#username");

    $("#gen-button-usr").click(function(event){
        username.val(usernameGen());
    });
    
    function usernameGen(){
        finalName = nameList[Math.floor( Math.random() * nameList.length )];
        finalName += nameList[Math.floor( Math.random() * nameList.length )];
        if ( Math.random() > 0.5 ) {
        finalName += nameList[Math.floor( Math.random() * nameList.length )];
    }
        return finalName;
    };

    //Password generator
    let password = $("#password");
    let passwd_conf = $('#password-confirm');

    const passwdGen = function (length, nonAlpha) {
        let text = "";
        const possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        if (nonAlpha) {
            possible += '_+-!@#$%^*()/*`~={}|\][;:,./?';
        }
        for (let i = 0; i < length; i++) {
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        }
        return text;
    }

    $("#gen-button-pass").click(function(event){
        password.val(passwdGen(8));
        passwd_conf.val() = password.val();

    });
    //Generate credentials to onload page

    if(window.location.pathname == "/admin/client/create"){
        if(username.val() === "" && password.val() === ""){
            window.onload = function() {
                username.val(usernameGen());
                newPasswd = passwdGen(8)
                password.val(newPasswd);
                passwd_conf.val(newPasswd);
            };
        }
    }

    //Generate client Hotel Account
    $('#lastname').blur( () =>{
        let newhotelAccount = $('#name').val().substr(0, 1)+'.'+ $('#lastname').val() + Math.floor(Math.random() * 500);
        $('#hotelAccount').val(newhotelAccount)
    })

    //Send the datas to Register controller by Ajax
    let roomId;
    function getRoom(event){
        roomId = $(event.target).closest('div').data('id')
        const roomNumber = $(event.target).closest('div').text()

        $('#roomNumber').val(roomNumber);
    }

    $("#register").click(function(){
        let name = $('#name');
        let lastname = $('#lastname');
        let email = $('#email');
        let hotelAccount = $('#hotelAccount');
        let room =$('#roomNumber');
        let passwd_conf = $('#password-confirm');
        const url = "http://onestepservice.com/admin/client/create";
        const token = $("#token").val();

        $.ajax({
            url: url,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            dataType: 'json',
            data: {
                name: name.val(),
                lastName: lastname.val(),
                room: room.val(),
                roomId: roomId,
                email: email.val(),
                username: username.val(),
                password: password.val(),
                hotelAccount: hotelAccount.val(),
                password_confirmation: passwd_conf.val(),
            },
            success:function(response){
                name.val("");
                lastname.val("");
                email.val("");
                username.val("");
                password.val("");
                passwd_conf.val("");
                hotelAccount.val("");
                
                if (response.status === 200) {
                    $("#msj-success").fadeIn();
                    $("#msj-error").fadeOut();
                    $("#print").removeAttr("disabled"); 
                }               
            },
            error:function(msj){
                if (msj.responseJSON.errors.name) {
                    $("#msj-name").html(msj.responseJSON.errors.name);
                    $("#msj-error-name").fadeIn();
                }
                if (msj.responseJSON.errors.lastName) {
                    $("#msj-lastName").html(msj.responseJSON.errors.lastName);
                    $("#msj-error-lastName").fadeIn();
                }
                if (msj.responseJSON.errors.email) {
                    $("#msj-email").html(msj.responseJSON.errors.email);
                    $("#msj-error-email").fadeIn();
                }
                if (msj.responseJSON.errors.username) {
                    $("#msj-username").html(msj.responseJSON.errors.username);
                    $("#msj-error-username").fadeIn();
                }
                if (msj.responseJSON.errors.password) {
                    $("#msj-username").html(msj.responseJSON.errors.password);
                    $("#msj-error-username").fadeIn();
                }
                if (msj.responseJSON.errors.room) {
                    $("#msj-room").html(msj.responseJSON.errors.room);
                    $("#msj-error-room").fadeIn();
                }
            }
        });
    });
