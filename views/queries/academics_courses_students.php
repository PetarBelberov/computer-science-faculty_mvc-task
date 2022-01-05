<div class="container">
    <div class="content">
        <div class="container-grid query-list">
            <table cellpadding="10" cellspacing="1">
                <thead>
                    <tr>
                        <th><strong>Academic</strong></th>
                        <th><strong>Course Name</strong></th>
                        <th><strong>Number of Students</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($academicsCoursesStudents)) :
                        foreach ($academicsCoursesStudents as $k => $v) : ?>
                            <tr>
                                <td><?php echo $academicsCoursesStudents[$k]["AcademicName"]; ?></td>
                                <td><?php echo $academicsCoursesStudents[$k]["CourseName"]; ?></td>       
                                <td><?php echo $academicsCoursesStudents[$k]["NumberOfStudents"]; ?></td>       
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <tbody>
            </table>
            <h2 class="title back">
                <a href="<?php echo BASE_URL . '/index.php/queries' ?>">
                    <i class="fas fa-home"></i> Back
                </a>
            </h2>
        </div>
    </div>
</div>