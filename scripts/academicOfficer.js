// globle variable
const user = "academic_officer";

// academic officer javascript file

function contentChangerAO(title) {
  const mainContentPanel = document.getElementById("mainContentPanel");
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      mainContentPanel.innerHTML = t;
    }
  };

  r.open("GET", "aOPanel.php?section=" + title, true);
  r.send();
}

function viewS() {
  const adminFeaturesSection = document.getElementById("adminFeaturesSection");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      adminFeaturesSection.innerHTML = t;
    }
  };

  r.open("GET", "../app/userViewingSection.php?modifyingUtype=S", true);
  r.send();
}

function addS() {
  const adminFeaturesSection = document.getElementById("adminFeaturesSection");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      adminFeaturesSection.innerHTML = t;
    }
  };

  r.open("GET", "../app/SAddingSection.php", true);
  r.send();
}

// academic officer blocking from admin side
function blockUnblock(nic, utype) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "doneAO") {
        viewAO();
      } else if (t == "doneT") {
        viewT();
      } else if (t == "doneS") {
        viewS();
      } else {
        alert(t);
      }
    }
  };

  r.open(
    "GET",
    "../app/userBlockProcess.php?nic=" + nic + "&utype=" + utype,
    true
  );
  r.send();
}

// student adding section

// add AO to the system
function addTeacher() {
  document.getElementById("addOfficerBtn").disabled = true;

  var nic = document.getElementById("nic").value;
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var email = document.getElementById("email").value;
  var mobile1 = document.getElementById("mobile1").value;
  var mobile2 = document.getElementById("mobile2").value;
  var grade = document.getElementById("grade").value;
  var birthday = document.getElementById("birthday").value;
  var gname = document.getElementById("gname").value;
  var gmobile = document.getElementById("gmobile").value;
  var district = document.getElementById("district").value;
  var province = document.getElementById("province").value;
  var gender = document.getElementById("gender").value;
  var line1 = document.getElementById("line1").value;
  var line2 = document.getElementById("line2").value;
  var city = document.getElementById("city").value;
  var img = document.getElementById("img");

  var f = new FormData();
  f.append("fname", fname);
  f.append("lname", lname);
  f.append("nic", nic);
  f.append("email", email);
  f.append("mobile1", mobile1);
  f.append("mobile2", mobile2);
  f.append("grade", grade);
  f.append("birthday", birthday);
  f.append("gname", gname);
  f.append("gmobile", gmobile);
  f.append("gender", gender);
  f.append("line1", line1);
  f.append("line2", line2);
  f.append("img", img.files[0]);
  f.append("city", city);
  f.append("district", district);
  f.append("province", province);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("addOfficerBtn").disabled = false;
      if (t == "success") {
        alert(t);
        addS();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "../app/addStudentProcess.php", true);
  r.send(f);
}

function viewAssignmentsAO() {
  const adminFeaturesSection = document.getElementById("adminFeaturesSection");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      adminFeaturesSection.innerHTML = t;
    }
  };

  r.open("GET", "../app/assignmentViewingSection.php?utype=" + user, true);
  r.send();
}

// approveMarks
function approveMarks(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      viewAssignmentsAO();
    }
  };

  r.open("GET", "../app/studentMarkApprove.php?id=" + id, true);
  r.send();
}
