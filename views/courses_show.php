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
                if (!empty($result)) :
                    foreach ($result as $k => $v) : ?>
                        <tr>
                            <td><?php echo $result[$k]["name"]; ?></td>
                            <td><?php echo $result[$k]["credit"]; ?></td>
                            <td>
                                <a class="btnEditAction" href="index.php?action=course-edit&id=<?php echo $result[$k]["id"]; ?>">
                                    <img src="image/icon-edit.png" />
                                </a>
                                <a class="btnDeleteAction" href="index.php?action=course-delete&id=<?php echo $result[$k]["id"]; ?>">
                                    <img src="image/icon-delete.png" />
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            <tbody>
        </table>
        <div class="add-button">
            <a id="btn_add_action" href="index.php?action=course-add"><img src="image/icon-add.png" />Add course</a>
        </div>
    </div>