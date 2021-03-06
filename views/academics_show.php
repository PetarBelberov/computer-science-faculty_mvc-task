<div class="content">
    <div id="content-2">
        <div class="container-grid">
            <table cellpadding="10" cellspacing="1">
                <thead>
                    <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Rank</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($results)) :
                        foreach ($results as $k => $v) : ?>
                            <tr>
                                <td><?php echo $results[$k]["name"]; ?></td>
                                <td><?php echo $results[$k]["rank"]; ?></td>
                                <td>
                                    <a class="btnEditAction" href=<?php echo BASE_URL . "/index.php?action=academic-edit&id=" . $results[$k]["id"]; ?>>
                                        <img src="<?php echo BASE_URL . '/image/icon-edit.png' ?>" />
                                    </a>
                                    <a class="btnDeleteAction" href="<?php echo BASE_URL . "/index.php?action=academic-delete&id=" . $results[$k]["id"]; ?>">
                                        <img src="<?php echo BASE_URL . '/image/icon-delete.png' ?>" />
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <tbody>
            </table>
            <div class="add-button">
                <a id="btn_add_action" href="index.php?action=academic-add"><img src="<?php echo BASE_URL . '/image/icon-add.png' ?>" />Add Academic</a>
            </div>
        </div>
    </div><!-- #content-2 -->   
</div><!-- .content -->
