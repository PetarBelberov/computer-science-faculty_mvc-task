<div class="container-grid">
    <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Academic</strong></th>
                    <th><strong>Number of Courses</strong></th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php var_dump($studentsCourses); ?> -->

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
    </div>