function updateProfileChk() {
  var firstName = document.getElementById("firstName");
  var lastName = document.getElementById("lastName");
  var dob = document.getElementById("dob");
  var email = document.getElementById("email");
  var phone = document.getElementById("phone");
  var username = document.getElementById("username");
  var CurrPassword = document.getElementById("CurrPassword");
  var NewPassword = document.getElementById("NewPassword");

  var fnameErr = document.getElementById("fnameErr");
  var lnameErr = document.getElementById("lnameErr");
  var dobErr = document.getElementById("dobErr");
  var emailErr = document.getElementById("emailErr");
  var phnErr = document.getElementById("phnErr");
  var usernameErr = document.getElementById("usernameErr");
  var currPassErr = document.getElementById("currPassErr");
  var newPassErr = document.getElementById("newPassErr");
  var isValid = true;
  fnameErr.innerHTML = "";
  lnameErr.innerHTML = "";
  dobErr.innerHTML = "";
  emailErr.innerHTML = "";
  phnErr.innerHTML = "";
  usernameErr.innerHTML = "";
  currPassErr.innerHTML = "";
  newPassErr.innerHTML = "";

  if (firstName.value === "") {
    fnameErr.innerHTML = "First name is required";
    isValid = false;
  } else {
    fnameErr.innerHTML = "";
  }
  if (lastName.value === "") {
    lnameErr.innerHTML = "Last name is required";
    isValid = false;
  } else {
    lnameErr.innerHTML = "";
  }
  if (dob.value === "") {
    dobErr.innerHTML = "Date of birth is required";
    isValid = false;
  } else {
    dobErr.innerHTML = "";
  }
  const emailRegex = /\S+@\S+\.\S+/;
  if (email.value === "") {
    emailErr.innerHTML = "Email is required";
    isValid = false;
  } else if (!emailRegex.test(email.value)) {
    emailErr.innerHTML = "Invalid email address";
    isValid = false;
  } else {
    emailErr.innerHTML = "";
  }
  const phoneRegex = /^\d{10}$/;
  if (phone.value === "") {
    phnErr.innerHTML = "Phone number is required";
    isValid = false;
  } else if (!phoneRegex.test(phone.value)) {
    phnErr.innerHTML = "Invalid phone number";
    isValid = false;
  } else {
    phnErr.innerHTML = "";
  }
  if (username.value === "") {
    usernameErr.innerHTML = "Username is required";
    isValid = false;
  } else {
    usernameErr.innerHTML = "";
  }
  if (CurrPassword.value === "") {
    currPassErr.innerHTML = "Current password is required";
    isValid = false;
  } else {
    currPassErr.innerHTML = "";
  }
  if (CurrPassword.value != NewPassword.value) {
    newPassErr.innerHTML = "Passwords do not match";
    isValid = false;
  } else {
    newPassErr.innerHTML = "";
  }
  if (NewPassword.value === "") {
    document.getElementById("newPassErr").innerHTML =
      "New Password field is required";
    isValid = false;
  } else if (NewPassword.length < 6 || NewPassword.length > 20) {
    document.getElementById("newPassErr").innerHTML =
      "New Password must be between 6 and 20 characters";
    isValid = false;
  } else {
    document.getElementById("newPassErr").innerHTML = "";
  }

  return isValid;
}
