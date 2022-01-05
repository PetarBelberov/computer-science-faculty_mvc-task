
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
        <input type="submit" name="add" class="btn-submit" value="Save" />
    </div>
</form>
<h2 class="title back">
    <a href="<?php echo BASE_URL . '/index.php' ?>">
        <i class="fas fa-home"></i> Back
    </a>
</h2>