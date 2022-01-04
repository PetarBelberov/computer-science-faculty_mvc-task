<div class="container-grid">
    <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Student</strong></th>
                    <th><strong>Sum of Credits</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($studentsCredits)) :
                    foreach ($studentsCredits as $k => $v) : ?>
                        <tr>
                            <td><?php echo $studentsCredits[$k]["StudentName"]; ?></td>
                            <td><?php echo $studentsCredits[$k]["CourseCredit"]; ?></td>       
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            <tbody>
        </table>
    </div>