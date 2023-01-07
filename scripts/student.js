const user = "student";
// academic officer javascript file

function contentChangerS(title) {
  const mainContentPanel = document.getElementById("mainContentPanel");
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      mainContentPanel.innerHTML = t;
    }
  };

  r.open("GET", "sPanel.php?section=" + title, true);
  r.send();
}

// view assignments
function viewAssignment() {
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

// assignment downloading
function downloadAssignment(fileLocation) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  };

  r.open("GET", "../app/fileDownload.php?fileLocation=" + fileLocation, true);
  r.send();
}

// submit assignment
function submitAssignment(id, title) {
  const file = document.getElementById(id).files[0];

  var f = new FormData();
  f.append("file", file);
  f.append("title", title);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  };

  r.open("POST", "../app/submitAssignmentProcess.php", true);
  r.send(f);
}

function viewNotes() {
  const adminFeaturesSection = document.getElementById("adminFeaturesSection");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      adminFeaturesSection.innerHTML = t;
    }
  };

  r.open("GET", "../app/noteViewingSection.php?utype=" + user, true);
  r.send();
}

function viewMarksST() {
  const adminFeaturesSection = document.getElementById("adminFeaturesSection");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      adminFeaturesSection.innerHTML = t;
    }
  };

  r.open("GET", "../app/markViewingSection.php?utype=" + user, true);
  r.send();
}
