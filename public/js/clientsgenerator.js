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
  let username = document.getElementById("username");

  $("#gen-button-usr").click(function(event){
     username.value = usernameGen();
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
  let password = document.getElementById("password");
  let passwd_conf = document.getElementById('password-confirm');

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
    password.value = passwdGen(8);
    passwd_conf.value = password.value;

 });
//Generate credentials to onload page

  if(window.location.pathname == "/register/client"){
    if(username.value === "" && password.value === ""){
        window.onload = function() {
            username.value = usernameGen();
            newPasswd = passwdGen(8)
            password.value = newPasswd;
            passwd_conf.value = newPasswd;

            console.log(password.value, passwd_conf.value)
          };
      }
  }

  //Send the datas to Register controller by Ajax

  $("#register").click(function(){
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const room =document.getElementById('sel1').value;
      const passwd_conf = document.getElementById('password-confirm').value;
      const url = "http://onestepservice.com/register/client";
      const token = $("#token").val();

      $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data: {
            name: name,
            email: email,
            username: username.value,
            password: password.value,
            password_confirmation: passwd_conf,
        },
        success:function(){
            $("#client-created").fadeIn();
        }
      });
  });
