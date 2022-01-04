<div class="container-grid">
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
    </div>