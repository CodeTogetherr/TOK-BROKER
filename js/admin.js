$(window).on('load', function () {
   $(".loader").fadeOut();
   $("#preloder").delay(200).fadeOut("slow");
});
let header = document.querySelector('.header');

document.querySelector('#menu-btn').onclick = () =>{
   header.classList.add('active');
}

document.querySelector('#close-btn').onclick = () =>{
   header.classList.remove('active');
}

window.onscroll = () =>{
   header.classList.remove('active');
}

document.querySelectorAll('input[type="number"]').forEach(inputNumbmer => {
   inputNumbmer.oninput = () =>{
      if(inputNumbmer.value.length > inputNumbmer.maxLength) inputNumbmer.value = inputNumbmer.value.slice(0, inputNumbmer.maxLength);
   }
});

let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");

eyeicon.onclick = function() {
   if (password.type == "password") {
      password.type = "text";
      eyeicon.src = "../images/eye-open.png";
      
   }else{
      password.type ="password";
      eyeicon.src = "../images/eye-close.png";
   }
}


let icon = document.getElementById("icon");
let c_password = document.getElementById("c_password");

icon.onclick = function() {
   if (c_password.type == "password") {
      c_password.type = "text";
      icon.src = "../images/eye-open.png";
      
   }else{
      c_password.type ="password";
      icon.src = "../images/eye-close.png";
   }
}

























   