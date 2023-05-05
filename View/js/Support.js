function getSupport() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    const response = JSON.parse(this.responseText);
    let i = 0;
    while (response) {
      let arr = Array((i) => response);
      i++;
    }
  };
  xhttp.open("GET", "../../chatsModel.php");
}
