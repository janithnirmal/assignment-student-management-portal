// globle variable datas
const USER_TYPE = document.getElementById("utype").innerHTML; // user type

// user selection
function userSelection(event) {
  var id = event.target.id;

  let utype = 0;
  if (id == "userSelectionS") {
    utype = "S";
  } else if (id == "userSelectionT") {
    utype = "T";
  } else if (id == "userSelectionAO") {
    utype = "AO";
  } else if (id == "userSelectionA") {
    utype = "A";
  }

  window.location = "signIn.php?utype=" + utype;
}

// login signin page changer
function pageChnager() {
  var input1 = document.getElementById("inputFeild1");
  var input2 = document.getElementById("inputFeild2");
  var largeLogo = document.getElementById("largeLogo");
  var contenContainer = document.getElementById("contenContainer");
  var inputContainer = document.getElementById("inputContainer");

  inputContainer.style.animation = "colorChnager 1200ms";

  largeLogo.classList.toggle("hider2"); // 400ms

  input1.classList.toggle("hider1"); // 200ms
  input2.classList.toggle("hider1"); // 200ms

  setTimeout(function () {
    input1.classList.toggle("d-none");
    input2.classList.toggle("d-none");

    contenContainer.classList.toggle("flex-lg-row-reverse");

    // setInterval(() => {
    //     inputContainer.style.animation = "colorChnager 700ms";
    // }, 300);
    largeLogo.classList.toggle("hider2"); // 400s

    input1.classList.toggle("hider1"); // 200ms
    input2.classList.toggle("hider1"); // 200ms

    inputContainer.style.animation = "";
  }, 500);
}

// sign up
function signUp() {
  var nic = document.getElementById("nic");
  var vc = document.getElementById("vc");
  var npass = document.getElementById("npass");
  var rtpass = document.getElementById("rtpass");

  var f = new FormData();

  f.append("nic", nic.value);
  f.append("vc", vc.value);
  f.append("npass", npass.value);
  f.append("rtpass", rtpass.value);
  f.append("ut", USER_TYPE);

  var location;

  if (USER_TYPE == "AO") {
    location = "academicOfficerVerificationProcess.php";
  } else if (USER_TYPE == "T") {
    location = "teacherVerificationProcess.php";
  } else if (USER_TYPE == "S") {
    location = "studentVerificationProcess.php";
  } else {
    location = "404.php";
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Verified Please log in to get access");
        pageChnager();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "app/" + location, true);
  r.send(f);
}

// sign in
function signIn() {
  var nic = document.getElementById("nicSignIn");
  var password = document.getElementById("passwordSignIn");
  var rememberMe = document.getElementById("rememberMe");
  var userType = USER_TYPE;

  var f = new FormData();
  f.append("n", nic.value);
  f.append("p", password.value);
  f.append("r", rememberMe.checked);
  f.append("ut", userType);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "pages/home.php?utype=" + USER_TYPE;
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "signInProcess.php", true);
  r.send(f);
}

// sign out process
function signOut() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      window.location.reload();
    }
  };

  r.open("GET", "../app/signOutProcess.php", true);
  r.send();
}
