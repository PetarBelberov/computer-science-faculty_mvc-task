<form name="formAddEdit" method="post" action="" class="form-add-edit"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">Name</label> <span id="name-info" class="info"></span><br />
        <input type="text" name="nameCourse" id="name_course" class="credit_input">
    </div>
    <div>
        <label>Credit</label> <span id="credit-info" class="credit"></span><br />
        <input type="text" name="creditCourse" id="credit_course" class="credit_input">
    </div>
    <div>
        <input type="submit" name="addCourse" class="btn-submit" value="Add" />
    </div>
    </div>
</form>