// admin management
// user management 
function contentChangerAdmin(title) {
    const mainContentPanel = document.getElementById("mainContentPanel");
    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            mainContentPanel.innerHTML = t;
        }
    }

    r.open("GET", "adminPanel.php?section=" + title, true);
    r.send();
}


function addAO() {
    const adminFeaturesSection = document.getElementById("adminFeaturesSection");

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            adminFeaturesSection.innerHTML = t;
        }
    }

    r.open("GET", "../app/aOAddingSection.php", true);
    r.send();

}

function viewAO() {
    const adminFeaturesSection = document.getElementById("adminFeaturesSection");

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            adminFeaturesSection.innerHTML = t;
        }
    }

    r.open("GET", "../app/aOViewingSection.php", true);
    r.send();

}


// add AO to the system
function addAcademicOfficer() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var nic = document.getElementById("nic").value;
    var email = document.getElementById("email").value;
    var mobile1 = document.getElementById("mobile1").value;
    var mobile2 = document.getElementById("mobile2").value;
    var gender = document.getElementById("gender").value;
    var line1 = document.getElementById("line1").value;
    var line2 = document.getElementById("line2").value;
    var img = document.getElementById("img");
    var city = document.getElementById("city").value;
    var district = document.getElementById("district").value;
    var province = document.getElementById("province").value;

    var f = new FormData();
    f.append("fname", fname);
    f.append("lname", lname);
    f.append("nic", nic);
    f.append("email", email);
    f.append("mobile1", mobile1);
    f.append("mobile2", mobile2);
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
            if (t == "notallowed") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "../app/addAcademicOfficerProcess.php", true);
    r.send(f);

}