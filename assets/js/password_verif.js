var myInput = document.getElementById("password");
// var letter = document.getElementById("letter");
// var capital = document.getElementById("capital");
// var number = document.getElementById("number");
// var length = document.getElementById("length");

var myInput2 = document.getElementById("password2");
// var letter2 = document.getElementById("letter2");
// var capital2 = document.getElementById("capital2");
// var number2 = document.getElementById("number2");
// var length2 = document.getElementById("length2");
// var match = document.getElementById("match");
var submit = document.getElementById("submit");

// When the user clicks on the password field, show the message box
// myInput.onfocus = function() {
//   document.getElementById("message").style.display = "block";
// }

// // When the user clicks outside of the password field, hide the message box
// myInput.onblur = function() {
//   document.getElementById("message").style.display = "none";
// }

// myInput2.onfocus = function() {
//   document.getElementById("message2").style.display = "block";
// }

// // When the user clicks outside of the password field, hide the message box
// myInput2.onblur = function() {
//   document.getElementById("message2").style.display = "none";
// }

// // When the user starts to type something inside the password field
// myInput.onkeyup = function() {
//   // Validate lowercase letters
//   var lowerCaseLetters = /[a-z]/g;
//   if(myInput.value.match(lowerCaseLetters)) {
//     letter.classList.remove("invalid");
//     letter.classList.add("valid");
//   } else {
//     letter.classList.remove("valid");
//     letter.classList.add("invalid");
// }

//   // Validate capital letters
//   var upperCaseLetters = /[A-Z]/g;
//   if(myInput.value.match(upperCaseLetters)) {
//     capital.classList.remove("invalid");
//     capital.classList.add("valid");
//   } else {
//     capital.classList.remove("valid");
//     capital.classList.add("invalid");
//   }

//   // Validate numbers
//   var numbers = /[0-9]/g;
//   if(myInput.value.match(numbers)) {
//     number.classList.remove("invalid");
//     number.classList.add("valid");
//   } else {
//     number.classList.remove("valid");
//     number.classList.add("invalid");
//   }

//   // Validate length
//   if(myInput.value.length >= 8) {
//     length.classList.remove("invalid");
//     length.classList.add("valid");
//   } else {
//     length.classList.remove("valid");
//     length.classList.add("invalid");
//   }
  
// }

function matchFunc() {
  
  //Validate Password #2
  if(myInput.value == myInput2.value) {
    // match.classList.remove("invalid");
    // match.classList.add("valid");
    // match.innerHTML = "Matched!";
    submit.disabled = false;
  } else {
    // match.classList.remove("valid");
    // match.classList.add("invalid");
    // match.innerHTML = "Password doesn't match";
    submit.disabled = true;
  }

  
  
}


function copylink() {
  var copyText = document.getElementById("copy_text");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}

function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the url: " + copyText.value);
}
