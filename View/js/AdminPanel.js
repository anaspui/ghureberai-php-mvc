function addEmpCheck() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var valid = true;
  if (fname == "") {
    document.getElementById("fnameError").innerHTML = "First name is required!";
    valid = false;
  } else {
    document.getElementById("fnameError").innerHTML = "";
  }
  if (lname == "") {
    document.getElementById("lnameError").innerHTML = "Last name is required!";
    valid = false;
  } else {
    document.getElementById("lnameError").innerHTML = "";
  }
  if (username == "") {
    document.getElementById("usernameError").innerHTML =
      "Username is required!";
    valid = false;
  } else {
    document.getElementById("usernameError").innerHTML = "";
  }
  if (password == "") {
    document.getElementById("passwordError").innerHTML =
      "Password is required!";
    valid = false;
  } else {
    document.getElementById("passwordError").innerHTML = "";
  }
  return valid;
}

function UptEmpCheck() {
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  var valid = true;

  if (firstName == "") {
    document.getElementById("fnameError").innerHTML = "First name is required!";
    valid = false;
  } else {
    document.getElementById("fnameError").innerHTML = "";
  }

  if (lastName == "") {
    document.getElementById("lnameError").innerHTML = "Last name is required!";
    valid = false;
  } else {
    document.getElementById("lnameError").innerHTML = "";
  }

  if (username == "") {
    document.getElementById("usernameError").innerHTML =
      "Username is required!";
    valid = false;
  } else {
    document.getElementById("usernameError").innerHTML = "";
  }

  if (password == "") {
    document.getElementById("passwordError").innerHTML =
      "Password is required!";
    valid = false;
  } else {
    document.getElementById("passwordError").innerHTML = "";
  }

  return valid;
}

function createPackError() {
  var name = document.getElementById("Name").value;
  var hotel = document.querySelector(".hselect").value;
  var price = document.getElementById("Price").value;
  var days = document.getElementById("Days").value;
  var tpack = document.getElementById("TotalPackages").value;
  var date = document.getElementById("Start_Date").value;
  var nameErr = document.getElementById("nameError");
  var hotelErr = document.getElementById("hotelError");
  var priceErr = document.getElementById("priceError");
  var tripErr = document.getElementById("tripError");
  var tpackErr = document.getElementById("tpackError");
  var dateErr = document.getElementById("dateError");
  var isValid = true;

  nameErr.innerHTML = "";
  hotelErr.innerHTML = "";
  priceErr.innerHTML = "";
  tripErr.innerHTML = "";
  tpackErr.innerHTML = "";
  dateErr.innerHTML = "";

  if (name == "") {
    nameErr.innerHTML = "Please enter package name";
    isValid = false;
  }
  if (hotel == "") {
    hotelErr.innerHTML = "Please select a hotel";
    isValid = false;
  }
  if (price == "") {
    priceErr.innerHTML = "Please enter package price";
    isValid = false;
  }
  if (isNaN(price)) {
    priceErr.innerHTML = "Price should be a number";
    isValid = false;
  }
  if (days == "") {
    tripErr.innerHTML = "Please enter trip duration";
    isValid = false;
  }
  if (isNaN(days)) {
    tripErr.innerHTML = "Trip duration should be a number";
    isValid = false;
  }
  if (tpack == "") {
    tpackErr.innerHTML = "Please enter total packages";
    isValid = false;
  }
  if (isNaN(tpack)) {
    tpackErr.innerHTML = "Total packages should be a number";
    isValid = false;
  }
  if (date == "") {
    dateErr.innerHTML = "Please select start date";
    isValid = false;
  }

  return isValid;
}

function updatePackCheck() {
  var name = document.getElementById("Name").value;
  var hotel = document.querySelector(".hselect").value;
  var price = document.getElementById("Price").value;
  var days = document.getElementById("Days").value;
  var tpack = document.getElementById("TotalPackages").value;
  var date = document.getElementById("Start_Date").value;

  var nameErr = document.getElementById("nameError");
  var hotelErr = document.getElementById("hotelError");
  var priceErr = document.getElementById("priceError");
  var tripErr = document.getElementById("daysError");
  var tpackErr = document.getElementById("totPackError");
  var dateErr = document.getElementById("dateError");
  var isValid = true;

  nameErr.innerHTML = "";
  hotelErr.innerHTML = "";
  priceErr.innerHTML = "";
  tripErr.innerHTML = "";
  tpackErr.innerHTML = "";
  dateErr.innerHTML = "";

  if (name == "") {
    nameErr.innerHTML = "Please enter package name";
    isValid = false;
  }
  if (hotel == "") {
    hotelErr.innerHTML = "Please select a hotel";
    isValid = false;
  }
  if (price == "") {
    priceErr.innerHTML = "Please enter package price";
    isValid = false;
  }
  if (isNaN(price)) {
    priceErr.innerHTML = "Price should be a number";
    isValid = false;
  }
  if (days == "") {
    tripErr.innerHTML = "Please enter trip duration";
    isValid = false;
  }
  if (isNaN(days)) {
    tripErr.innerHTML = "Trip duration should be a number";
    isValid = false;
  }
  if (tpack == "") {
    tpackErr.innerHTML = "Please enter total packages";
    isValid = false;
  }
  if (isNaN(tpack)) {
    tpackErr.innerHTML = "Total packages should be a number";
    isValid = false;
  }
  if (date == "") {
    dateErr.innerHTML = "Please select start date";
    isValid = false;
  }

  return isValid;
}

function addHotelCheck() {
  var HotelName = document.getElementById("Hotel_Name").value;
  var Location = document.getElementById("Location").value;
  var isValid = true;

  var HotelErr = document.getElementById("HotelErr");
  var LocationErr = document.getElementById("LocationErr");
  if (HotelName == "") {
    var isValid = false;
    HotelErr.innerHTML = "Please Provide A Hotel Name";
  } else {
    HotelErr.innerHTML = "";
  }
  if (Location == "") {
    var isValid = false;
    LocationErr.innerHTML = "Location cannot be empty";
  } else {
    LocationErr.innerHTML = "";
  }
  return isValid;
}

function upHotelCheck() {
  var HotelName = document.getElementById("Hotel_Name").value;
  var Location = document.getElementById("Location").value;
  var isValid = true;

  var HotelErr = document.getElementById("HotelErr");
  var LocationErr = document.getElementById("LocationErr");
  if (HotelName == "") {
    var isValid = false;
    HotelErr.innerHTML = "Please Provide A Hotel Name";
  } else {
    HotelErr.innerHTML = "";
  }
  if (Location == "") {
    var isValid = false;
    LocationErr.innerHTML = "Location cannot be empty";
  } else {
    LocationErr.innerHTML = "";
  }
  return isValid;
}
