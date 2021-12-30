<form name="formAddEdit" method="post" action="" class="form-add-edit"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">Name</label> <span id="name-info" class="info"></span><br />
        <input type="text" name="nameCourse" id="name_course" class="course-add">
    </div>
    <div>
        <label>Credit</label> <span id="credit-info" class="credit"></span><br />
        <input type="text" name="creditCourse" id="credit_course" class="course-add">
    </div>
    <div>
        <label>Academic</label> <span id="academic-info" class="academic"></span><br />
        <select name="academicCourse" id="academic_course" class="course-add">
            <?php foreach ($result_academics as $academic) : ?>
                    <option value="<?php echo $academic['name']; ?>" ><?php echo $academic['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="addCourse" class="btn-submit" value="Add" />
    </div>
    </div>
</form>