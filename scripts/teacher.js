// global variable
const user = "teacher";

// academic officer javascript file

function contentChangerT(title) {
  const mainContentPanel = document.getElementById("mainContentPanel");
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      mainContentPanel.innerHTML = t;
    }
  };

  r.open("GET", "tPanel.php?section=" + title, true);
  r.send();
}

// assignment adding
function addAssignment() {
  const adminFeaturesSection = document.getElementById("adminFeaturesSection");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      adminFeaturesSection.innerHTML = t;
    }
  };

  r.open("GET", "../app/assignmentAddingSection.php?modifyingUtype=S", true);
  r.send();
}

// assignment adding
function addNotes() {
  const adminFeaturesSection = document.getElementById("adminFeaturesSection");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      adminFeaturesSection.innerHTML = t;
    }
  };

  r.open("GET", "../app/noteAddingSection.php?modifyingUtype=S", true);
  r.send();
}

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

function addAssignmentDetails() {
  const atitle = document.getElementById("atitle").value;
  const adescription = document.getElementById("adescription").value;
  const adeadline = document.getElementById("adeadline").value;
  const grade = document.getElementById("grade").value;
  const afile = document.getElementById("afile").files[0];

  var f = new FormData();
  f.append("atitle", atitle);
  f.append("adescription", adescription);
  f.append("adeadline", adeadline);
  f.append("afile", afile);
  f.append("agrade", grade);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "saved successfully") {
        alert(t);
        addAssignment();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "../app/assignmentDetailsAddingProcess.php", true);
  r.send(f);
}

function addNoteDetails() {
  const ntitle = document.getElementById("ntitle").value;
  const nsubject = document.getElementById("nsubject").value;
  const ndescription = document.getElementById("ndescription").value;
  const grade = document.getElementById("grade").value;
  const nfile = document.getElementById("nfile").files[0];

  var f = new FormData();
  f.append("ntitle", ntitle);
  f.append("nsubject", nsubject);
  f.append("ndescription", ndescription);
  f.append("nfile", nfile);
  f.append("ngrade", grade);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "saved successfully") {
        alert(t);
        addAssignment();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "../app/noteDetailsAddingProcess.php", true);
  r.send(f);
}

// assignment downloading
function downloadAssignment(fileLocation) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      // var t = r.responseText;
      // alert(t);
    }
  };

  r.open("GET", "../app/fileDownload.php?fileLocation=" + fileLocation, true);
  r.send();
}

// assignemnt answer submittung panel open
function assignmentMarkingPanelOpen(title) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      adminFeaturesSection.innerHTML = t;
    }
  };

  r.open("GET", "../app/assignmentMarkingPanelOpen.php?title=" + title, true);
  r.send();
}

function addMarks(id) {
  var mark = document.getElementById("mark" + id).value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  };

  r.open("GET", "../app/markAdder.php?mark=" + mark + "&id=" + id, true);
  r.send();
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
