<div class="col-12 p-0">
    <div class="row m-0">
        <div class="col-12 p-0 px-2 mt-2 text-center">
            <span class="text-center fs-3 fw-bold">Add Notes</span>
        </div>
        <div class="col-12 p-0 px-2 mt-3">
            <hr>
        </div>

        <div class="col-12 p-0 px-2 mt-1">
            <label class="form-label fw-bold ">Note Title</label>
            <input id="ntitle" type="text" class="form-control" placeholder="Add a title for the assignment" />
        </div>
        <div class="col-6 p-0 px-2 mt-1">
            <label class="form-label fw-bold ">Subject</label>
            <select id="nsubject" class="form-control">
                <option value="s1">subject 1</option>
                <option value="s2">subject 2</option>
                <option value="s3">subject 3</option>
                <option value="s4">subject 4</option>
                <option value="s5">subject 5</option>
                <option value="s6">subject 6</option>
                <option value="s7">subject 7</option>
                <option value="s8">subject 8</option>
            </select>
        </div>
        <div class="col-6 p-0 px-2 mt-1">
            <label class="form-label fw-bold ">Grade</label>
            <select id="grade" class="form-control">
                <option value="g6">Grade 6</option>
                <option value="g7">Grade 7</option>
                <option value="g8">Grade 8</option>
                <option value="g9">Grade 9</option>
                <option value="g10">Grade 10</option>
                <option value="g11">Grade 11</option>
                <option value="g12">Grade 12</option>
                <option value="g13">Grade 13</option>
            </select>
        </div>
        <div class="col-12 p-0 px-2 mt-1">
            <label class="form-label fw-bold ">Assignment Description</label>
            <input id="ndescription" type="text" class="form-control" placeholder="Add a description" />
        </div>
        <div class="col-12 p-0 px-2 mt-1">
            <label class="form-label fw-bold ">Add the Assignment</label>
            <input id="nfile" type="file" accept=".zip, .rar" class="bg-black text-white form-control" placeholder="Add the assignment Files" />
        </div>
        <div class="col-12 p-0 px-2 mt-1 py-2 d-grid">
            <button onclick="addNoteDetails();" class="btn btn-primary">Add Note</button>
        </div>

    </div>
</div>