<div class="container">
    <div class="content">
        <div class="container-grid query-list">
            <table cellpadding="10" cellspacing="1">
                <thead>
                    <tr>
                        <th><strong>Academic</strong></th>
                        <th><strong>Number of Courses</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($academicsCourses)) :
                        foreach ($academicsCourses as $k => $v) : ?>
                            <tr>
                                <td><?php echo $academicsCourses[$k]["AcademicName"]; ?></td>
                                <td><?php echo $academicsCourses[$k]["NumberOfCourses"]; ?></td>
                            
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <tbody>

                <thead>
                    <tr>
                        <th><strong>Student</strong></th>
                        <th><strong>Courses</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($studentsCourses)) :
                        foreach ($studentsCourses as $k => $v) : ?>
                            <tr>
                                <td><?php echo $studentsCourses[$k]["StudentName"]; ?></td>
                                <td><?php echo $studentsCourses[$k]["CoursesName"]; ?></td>      
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
