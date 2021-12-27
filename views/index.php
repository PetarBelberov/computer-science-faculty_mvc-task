<div class="container-grid">
    <table cellpadding="10" cellspacing="1">
        <thead>
            <tr>
                <th><strong>Student Name</strong></th>
                <th><strong>Course</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($result)) :
                foreach ($result as $k => $v) : ?>
                    <tr>
                        <td><?php echo $result[$k]["name"]; ?></td>
                        <td><?php echo $result[$k]["course"]; ?></td>
                        <td>
                            <a class="btnEditAction" href="index.php?action=student-edit&id=<?php echo $result[$k]["id"]; ?>">
                                <img src="image/icon-edit.png" />
                            </a>
                            <a class="btnDeleteAction" href="index.php?action=student-delete&id=<?php echo $result[$k]["id"]; ?>">
                                <img src="image/icon-delete.png" />
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        <tbody>
    </table>
    <div class="add-button">
        <a id="btn_add_action" href="index.php?action=student-add"><img src="image/icon-add.png" />Add Student</a>
    </div>
</div>

   