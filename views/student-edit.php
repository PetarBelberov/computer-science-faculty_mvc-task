
<form name="formAddEdit" method="post" action="" class="form-add-edit"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">Name</label> <span
            id="name-info" class="info"></span><br /> <input type="text"
            name="name" id="name" class="course_input"
            value="<?php echo $result[0]["name"]; ?>">
    </div>
    
    <div>
        <label>Course</label> <span id="course-info" class="course"></span><br />
        <input type="text" name="course" id="course" class="course_input"
            value="<?php echo $result[0]["course"]; ?>">
    </div>
    <div>
        <input type="submit" name="add" class="btn-submit" value="Save" />
    </div>
    </div>
</form>