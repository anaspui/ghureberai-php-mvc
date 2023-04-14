function checkSignUp() {
  var firstName = document.getElementById("fname").value;
  var lastName = document.getElementById("lname").value;
  var gender = document.getElementsByName("gender");
  var dob = document.getElementById("dob").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  var isValid = true;
  if (firstName == "") {
    document.getElementById("fnameErr").innerHTML =
      "Please enter your First Name";
    isValid = false;
  } else if (!/^[a-zA-Z]+$/.test(firstName)) {
    document.getElementById("fnameErr").innerHTML =
      "First Name should contain only letters";
    isValid = false;
  } else {
    document.getElementById("fnameErr").innerHTML = "";
  }

  if (lastName == "") {
    document.getElementById("lnameErr").innerHTML =
      "Please enter your Last Name";
    isValid = false;
  } else if (!/^[a-zA-Z]+$/.test(lastName)) {
    document.getElementById("lnameErr").innerHTML =
      "Last Name should contain only letters";
    isValid = false;
  } else {
    document.getElementById("lnameErr").innerHTML = "";
  }

  var selectedGender = false;
  for (var i = 0; i < gender.length; i++) {
    if (gender[i].checked) {
      selectedGender = true;
      break;
    }
  }
  if (!selectedGender) {
    document.getElementById("genderErr").innerHTML =
      "Please select your gender";
    isValid = false;
  } else {
    document.getElementById("genderErr").innerHTML = "";
  }

  if (dob == "") {
    document.getElementById("dobErr").innerHTML =
      "Please enter your Date of Birth";
    isValid = false;
  } else {
    document.getElementById("dobErr").innerHTML = "";
  }

  if (email == "") {
    document.getElementById("emailErr").innerHTML = "Please enter your Email";
    isValid = false;
  } else if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email)) {
    document.getElementById("emailErr").innerHTML =
      "Please enter a valid Email address";
    isValid = false;
  } else {
    document.getElementById("emailErr").innerHTML = "";
  }

  if (phone == "") {
    document.getElementById("phnErr").innerHTML =
      "Please enter your Phone/Mobile number";
    isValid = false;
  } else if (!/^\d{11}$/.test(phone)) {
    document.getElementById("phnErr").innerHTML =
      "Please enter a valid Phone/Mobile number";
    isValid = false;
  } else {
    document.getElementById("phnErr").innerHTML = "";
  }

  if (username == "") {
    document.getElementById("usernameErr").innerHTML =
      "Please enter your Username";
    isValid = false;
  } else {
    document.getElementById("usernameErr").innerHTML = "";
  }

  //   if (password == "") {
  //     document.getElementById("passwordErr").innerHTML =
  //       "Please enter your Password";
  //     isValid = false;
  //   }
  // else {
  //   document.getElementById("passwordErr").innerHTML = "";
  // }

  return isValid;
}
