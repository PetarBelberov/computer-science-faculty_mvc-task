
<form name="formAddEdit" method="post" action="" class="form-add-edit"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">Name</label> <span
            id="name-info" class="info"></span><br /> <input type="text"
            name="nameAcademic" id="name_academic" class="rank_input"
            value="<?php echo $resultAcademic[0]["name"]; ?>">
    </div>
    
    <div>
        <label>Rank</label> <span id="rank-info" class="rank"></span><br />
            <select name="rankAcademic" id="rank_academic" class="rank_input">
                <?php foreach ($options as $option) : ?>
                        <option value="<?php echo $option; ?>" ><?php echo $option; ?></option>
                <?php endforeach; ?>
            </select>
    </div>
    <div>
        <input type="submit" name="addAcademic" class="btn-submit" value="Save" />
    </div>
</form>
<h2 class="title back">
    <a href="<?php echo BASE_URL . '/index.php' ?>">
        <i class="fas fa-home"></i> Back
    </a>
</h2>