<div class="container-grid">
    <table cellpadding="10" cellspacing="1">
        <thead>
            <tr>
                <th><strong>Student Name</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($result)) :
                foreach ($result as $k => $v) : ?>
                    <tr>
                        <td>
                            <a href="<?php echo BASE_URL . '/index.php/student-courses?action=show&id=' . $result[$k]['id'] ?>"><?php echo $result[$k]["name"]; ?></a>
                        </td>
                        <td>
                            <a class="btnEditAction" href="<?php echo BASE_URL . '/index.php?action=student-edit&id=' . $result[$k]["id"]; ?>">
                                <img src="<?php echo BASE_URL . '/image/icon-edit.png' ?>" />
                            </a>
                            <a class="btnDeleteAction" href="index.php?action=student-delete&id=<?php echo $result[$k]["id"]; ?>">
                                <img src="<?php echo BASE_URL . '/image/icon-delete.png' ?>" />
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        <tbody>
    </table>
    <div class="add-button">
        <a id="btn_add_action" href="index.php?action=student-add"><img src="<?php echo BASE_URL . '/image/icon-add.png' ?>" />Add Student</a>
    </div>
</div>

   