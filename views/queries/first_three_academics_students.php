<div class="container-grid">
    <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Academic Name</strong></th>
                    <th><strong>Number of Students</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($firstThreeAcademicsStudents)) :
                    foreach ($firstThreeAcademicsStudents as $k => $v) : ?>
                        <tr>
                            <td><?php echo $firstThreeAcademicsStudents[$k]["AcademicName"]; ?></td>
                            <td><?php echo $firstThreeAcademicsStudents[$k]["NumberOfStudents"]; ?></td>       
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            <tbody>
        </table>
    </div>