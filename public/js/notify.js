// const env = require("../../env");

Notify = function (element, content, options) {
  var $notifycontainer = document.getElementsByClassName("notify-container");
  // var $notify = document.createElement("div");
  var $notify = document.createElement("a");

  var audio = document.createElement("audio");
  audio.setAttribute("src", "/sound/" + options);
  audio.setAttribute("autoplay", "autoplay");
  audio.setAttribute("type", "audio/mpeg");

  audio.play();

  //   buat style untuk notif agar ketika muncul diatas kanan bertingkat kebawah jika masih ada notif lagi

  $notify.setAttribute(
    "style",
    "position: dynamic; top: 10px;right: 10px;z-index: 9999;margin: 0 10px 10px 0; "
  );
  if (typeof element["id"] == "undefined") {
    $notify.setAttribute("href", "/baggage-info");
  } else {
    $notify.setAttribute("href", "/baggage/edit/" + element["id"]);
  }

  // $notify.setAttribute(
  //   "onclick",
  //   "setTimeout(function() { try { this.remove(); } catch { } }, 3000);"
  // );

  // console.log(element);
  if (content == "success") {
    $notify.setAttribute(
      "class",
      "alert alert-" +
        content +
        " alert-dismissible show fade notify text-decoration-none"
    );
    $notify.innerHTML =
      "<a href='/baggage-info' class='text-decoration-none text-black' > " +
      "New Data Baggage Has Been Added : " +
      new Date(element["created_at"]).toLocaleString("id-ID", {
        year: "2-digit",
        month: "2-digit",
        day: "2-digit",
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
        hour12: false,
      }) +
      "<br>" +
      "Name : " +
      element["name_passenger"] +
      "<br>" +
      "Status : " +
      element["status"] +
      "<br>" +
      '<button type="button" class="btn-close position-absolute top-0 end-0 p-1" onclick="console.log(this.innerHTML)" data-bs-dismiss="alert" aria-label="Close"></button> </a>';
  } else if (content == "warning" || content == "primary") {
    $notify.setAttribute(
      "class",
      "alert alert-" +
        content +
        " alert-dismissible show fade notify text-decoration-none"
    );
    $notify.innerHTML =
      "<a href='/baggage/edit/" +
      element["id"] +
      "' class='text-decoration-none text-black' > " +
      "Data Id : " +
      element["id"] +
      "<br>" +
      "Name : " +
      element["name_passenger"] +
      "<br>" +
      "Task : " +
      element["status"] +
      "<br>" +
      '<br><button type="button" class="btn-close position-absolute top-0 end-0 p-1" onclick="console.log(this.innerHTML)" data-bs-dismiss="alert" aria-label="Close"></button> </a>';
  }
  $notifycontainer[0].appendChild($notify);
  // regenerate localstorage notif
  localStorage.removeItem("notif");
  localStorage.setItem("notif", $notifycontainer[0].innerHTML);
};
