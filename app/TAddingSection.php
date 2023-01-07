<div class="col-12 p-0 px-2 mt-3 text-center">
    <span class="text-center fs-3 fw-bold">Teacher Adding</span>
</div>
<div class="col-12 p-0 px-2 mt-3">
    <hr>
</div>
<div class="col-6 p-0 px-2 mt-1">
    <label class="form-label fw-bold ">First Name</label>
    <input id="fname" type="text" class="form-control" placeholder="Add the first name" />
</div>
<div class="col-6 p-0 px-2 mt-1">
    <label class="form-label fw-bold ">Last Name</label>
    <input id="lname" type="text" class="form-control" placeholder="Add the last name" />
</div>
<div class="col-6 p-0 px-2 mt-1">
    <label class="form-label fw-bold ">NIC</label>
    <input id="nic" type="text" class="form-control" placeholder="Add officers email" />
</div>
<div class="col-6 p-0 px-2 mt-1">
    <label class="form-label fw-bold ">Email</label>
    <input id="email" type="email" class="form-control" placeholder="Add officers email" />
</div>
<div class="col-6 p-0 px-2 mt-1">
    <label class="form-label fw-bold ">Mobile 1</label>
    <input id="mobile1" type="text" class="form-control" placeholder="Add officers first mobile no" />
</div>
<div class="col-6 p-0 px-2 mt-1">
    <label class="form-label fw-bold ">Mobile 2</label>
    <input id="mobile2" type="text" class="form-control" placeholder="Add officers second mobile no" />
</div>
<div class="col-6 p-0 px-2 mt-1 pt-2">
    <img src="../src/images/user-select-img-1.jpg" class="w-100 rounded-4" style="height: 200px;" />
</div>
<div class="col-6 p-0 px-2 mt-1">
    <div class="row m-0">
        <div class="col-12 p-0">
            <label class="form-label fw-bold ">Gender</label>
            <select id="gender" class="form-control">
                <option value="0" selected disabled>Select a Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="col-12 p-0 mt-1">
            <label class="form-label fw-bold ">Address Line 1</label>
            <input id="line1" type="text" class="form-control" placeholder="add an address line" />
        </div>
        <div class="col-12 p-0 mt-1">
            <label class="form-label fw-bold ">Address Line 1</label>
            <input id="line2" type="text" class="form-control" placeholder="Add secondary address line" />
        </div>
    </div>
</div>

<div class="col-6 p-0 px-2 mt-1">
    <label class="form-label fw-bold ">Add an iamge</label>
    <input id="img" type="file" class="w-100 bg-dark text-white form-control" />
</div>

<div class="col-6 p-0 mt-1">
    <label class="form-label fw-bold ">City</label>
    <input id="city" type="text" class="form-control" placeholder="Add the city" />
</div>

<div class="col-6 p-0 px-2 mt-1">
    <label class="form-label fw-bold ">District</label>
    <input id="district" type="text" class="form-control" placeholder="Add officers first mobile no" />
</div>
<div class="col-6 p-0 px-2 mt-1">
    <label class="form-label fw-bold ">Province</label>
    <input id="province" type="text" class="form-control" placeholder="Add officers second mobile no" />
</div>
<div class="col-12 p-0 px-2 mt-3">
    <button class="btn btn-primary w-100" onclick="addTeacher();" id="addOfficerBtn">Add Teacher</button>
</div>
<!-- <div class="col-6 p-0 px-2 mt-3">
    <button class="btn btn-dark w-100">Clear</button>
</div> -->
<div class="col-12 p-0 px-2 mt-3">
    <hr>
</div>