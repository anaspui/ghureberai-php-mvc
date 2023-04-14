function loginCheck() {
  var Username = document.getElementById("username").value;
  var Password = document.getElementById("password").value;
  var usernameErr = document.getElementById("usernameErr");
  var passErr = document.getElementById("passErr");
  var isValid = true;

  if (Username == "") {
    isValid = false;
    usernameErr.innerHTML = "Please enter a username";
  } else {
    usernameErr.innerHTML = "";
  }
  if (Password == "") {
    isValid = false;
    passErr.innerHTML = "Please enter your password";
  } else {
    passErr.innerHTML = "";
  }
  return isValid;
}
