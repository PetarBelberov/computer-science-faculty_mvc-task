
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
        <input type="text" name="rankAcademic" id="rank_academic" class="rank_input"
            value="<?php echo $resultAcademic[0]["rank"]; ?>">
    </div>
    <div>
        <input type="submit" name="addAcademic" class="btn-submit" value="Save" />
    </div>
    </div>
</form>