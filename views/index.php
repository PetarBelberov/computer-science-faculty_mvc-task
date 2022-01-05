<div class="container">
    <h2 class="title">Computer Science Faculty</h2>
    <input id="tab-1" class="tabs" type="radio" name="tabs">
    <label class="tab-labels" for="tab-1">Students</label>

    <input id="tab-2" class="tabs" type="radio" name="tabs">
    <label class="tab-labels" for="tab-2">Academics</label>

    <input id="tab-3" class="tabs" type="radio" name="tabs">
    <label class="tab-labels" for="tab-3">Courses</label>

    
    <a href="<?php echo BASE_URL . '/index.php/queries' ?>">
        <label class="tab-labels" for="tab-4">Queries</label>
    </a>

    <div class="content">
        <div id="content-1">
            <div class="container-grid">
                <table cellpadding="10" cellspacing="1">
                    <thead>
                        <tr>
                            <th><strong>Student Name</strong></th>
                            <th><strong>Student Courses</strong></th>
                            <th><strong>Action</strong></th>
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
                                        <a href="<?php echo BASE_URL . '/index.php/student-courses?action=show&id=' . $result[$k]['id'] ?>">
                                            <i class="fas fa-link"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btnEditAction" href="<?php echo BASE_URL . '/index.php?action=student-edit&id=' . $result[$k]["id"]; ?>">
                                            <img src="<?php echo BASE_URL . '/image/icon-edit.png' ?>" />
                                        </a>
                                        <a class="btnDeleteAction" href="<?php echo BASE_URL . "/index.php?action=student-delete&id=" . $result[$k]["id"]; ?>">
                                            <img src="<?php echo BASE_URL . '/image/icon-delete.png' ?>" />
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <tbody>
                </table>
                <div class="add-button">
                    <a id="btn_add_action" href="<?php echo BASE_URL . '/index.php/students?action=student-add' ?>"><img src="<?php echo BASE_URL . '/image/icon-add.png' ?>" />Add Student</a>
                </div>
            </div><!-- .container-grid -->
        </div><!-- #content-1 -->
  