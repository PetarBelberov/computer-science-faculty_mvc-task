<div class="container-grid">
    <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Name</strong></th>
                    <th><strong>Credit</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($result_courses)) :
                    foreach ($result_courses as $k => $v) : ?>
                        <tr>
                            <td><?php echo $result_courses[$k]["name"]; ?></td>
                            <td><?php echo $result_courses[$k]["credit"]; ?></td>
                            <td>
                                <?php if(isset($result_academics[$k]["name"])) : ?>
                                    <?php echo $result_academics[$k]["name"]; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btnEditAction" href="index.php?action=course-edit&id=<?php echo $result_courses[$k]["id"]; ?>">
                                    <img src="image/icon-edit.png" />
                                </a>
                                <a class="btnDeleteAction" href="index.php?action=course-delete&id=<?php echo $result_courses[$k]["id"]; ?>">
                                    <img src="image/icon-delete.png" />
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            <tbody>
        </table>
        <div class="add-button">
            <a id="btn_add_action" href="index.php?action=course-add"><img src="image/icon-add.png" />Add Course</a>
        </div>
    </div>