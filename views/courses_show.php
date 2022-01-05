<div class="content">
    <div id="content-3">
        <div class="container-grid">
            <table cellpadding="10" cellspacing="1">
                <thead>
                    <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Credit</strong></th>
                        <th><strong>Academic</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($courseAcademics)) :
                        foreach ($courseAcademics as $k => $v) : ?>
                            <tr>
                                <td><?php echo $courseAcademics[$k]["course_name"]; ?></td>
                                <td><?php echo $courseAcademics[$k]["credit"]; ?></td>
                                <td><?php echo $courseAcademics[$k]["name"]; ?></td>
                            
                                <td>
                                    <a class="btnEditAction" href="<?php echo BASE_URL . "/index.php?action=course-edit&id=" . $courseAcademics[$k]["id"]; ?>">
                                        <img src="<?php echo BASE_URL . '/image/icon-edit.png' ?>" />
                                    </a>
                                    <a class="btnDeleteAction" href="<?php echo BASE_URL . "/index.php?action=course-delete&id=" . $courseAcademics[$k]["id"]; ?>">
                                        <img src="<?php echo BASE_URL . '/image/icon-delete.png' ?>" />
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <tbody>
            </table>
            <div class="add-button">
                <a id="btn_add_action" href="index.php?action=course-add"><img src="<?php echo BASE_URL . '/image/icon-add.png' ?>" />Add Course</a>
            </div>
        </div>
    </div><!-- #content-3 -->
</div><!-- .content -->