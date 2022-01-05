<form name="formAddEdit" method="post" action="" class="form-add-edit"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">Name</label> <span id="name-info" class="info"></span><br />
        <input type="text" name="nameCourse" id="name_course" class="credit_input" value="<?php echo $result[0]["name"]; ?>">
    </div>
    <div>
        <label>Credit</label> <span id="credit-info" class="credit"></span><br />
        <input type="text" name="creditCourse" id="credit_course" class="credit_input" value="<?php echo $result[0]["credit"]; ?>">
    </div>
    <div>
        <label>Academic</label> <span id="academic-info" class="academic"></span><br />
        <select name="academicCourse" id="academic_course" class="academic_course_input">
            <?php foreach ($result_academics as $academic) : ?>
                    <option value="<?php echo $academic['name']; ?>" ><?php echo $academic['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="addCourse" class="btn-submit" value="Add" />
    </div>
</form>
<h2 class="title back">
    <a href="<?php echo BASE_URL . '/index.php' ?>">
        <i class="fas fa-home"></i> Back
    </a>
</h2>