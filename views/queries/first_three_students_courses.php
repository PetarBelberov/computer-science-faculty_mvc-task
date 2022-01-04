<div class="container-grid">
    <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Course Name</strong></th>
                    <th><strong>Number of Students</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($firstThreeStudentsCourses)) :
                    foreach ($firstThreeStudentsCourses as $k => $v) : ?>
                        <tr>
                            <td><?php echo $firstThreeStudentsCourses[$k]["CourseName"]; ?></td>
                            <td><?php echo $firstThreeStudentsCourses[$k]["NumberOfStudents"]; ?></td>       
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            <tbody>
        </table>
    </div>