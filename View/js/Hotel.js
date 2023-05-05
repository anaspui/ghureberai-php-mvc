function hotelUpdate() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    const response = JSON.parse(this.responseText);
    let t = "<table border='1px'>";
    t += "<tr>";
    t += "<th>";
    t += "Hotel Name";
    t += "</th>";
    t += "<th>";
    t += "Location";
    t += "</th>";
    t += "<th>";
    t += "Description";
    t += "</th>";
    t += "</tr>";

    for (let i = 0; i < response.length; i++) {
      t += "<tr>";
      t += "<td>";
      t += response[i].Hotel_Name;
      t += "</td>";
      t += "<td>";
      t += response[i].Location;
      t += "</td>";
      t += "<td>";
      t += response[i].Description;
      t += "</td>";
      t += "</tr>";
    }
    t += "</table>";
    document.getElementById("data").innerHTML = t;
  };
  xhttp.open("GET", "../Controller/HotelController.php");
  xhttp.send();
}
setInterval(hotelUpdate, 5);
