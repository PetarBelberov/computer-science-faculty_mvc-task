<form name="formAddEdit" method="post" action="" class="form-add-edit"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">Name</label> <span id="name-info" class="info"></span><br />
        <input type="text" name="nameAcademic" id="name_academic" class="rank_input">
    </div>
    <div>
        <label>Rank</label> <span id="rank-info" class="rank"></span><br />
        <select name="rankAcademic" id="rank_academic" class="rank_input">
            <option value="" selected>Select...</option>
            <?php foreach ($options as $option) : ?>
                    <option value="<?php echo $option; ?>" ><?php echo $option; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="addAcademic" class="btn-submit" value="Add" />
    </div>
    </div>
</form>