let menu = document.querySelector(".header .menu");

document.querySelector("#menu-btn").onclick = () => {
  menu.classList.toggle("active");
};

window.onscroll = () => {
  menu.classList.remove("active");
};

document.querySelectorAll('input[type="number"]').forEach((inputNumber) => {
  inputNumber.oninput = () => {
    if (inputNumber.value.length > inputNumber.maxLength)
      inputNumber.value = inputNumber.value.slice(0, inputNumber.maxLength);
  };
});

document.querySelectorAll(".faq .box-container .box h3").forEach((headings) => {
  headings.onclick = () => {
    headings.parentElement.classList.toggle("active");
  };
});
document.addEventListener("DOMContentLoaded", function () {
  var currentYear = new Date().getFullYear();
  document.getElementById("currentYear").textContent = currentYear;
});

let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");

eyeicon.onclick = function () {
  if (password.type == "password") {
    password.type = "text";
    eyeicon.src = "images/eye-open.png";
  } else {
    password.type = "password";
    eyeicon.src = "images/eye-close.png";
  }
};

let icon = document.getElementById("icon");
let c_password = document.getElementById("c_password");

icon.onclick = function () {
  if (c_password.type == "password") {
    c_password.type = "text";
    icon.src = "images/eye-open.png";
  } else {
    c_password.type = "password";
    icon.src = "images/eye-close.png";
  }
};


document.querySelectorAll('.faq .box-container .box h3').forEach(headings =>{
   headings.onclick = () =>{
      headings.parentElement.classList.toggle('active');
   }
});
