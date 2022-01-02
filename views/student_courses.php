<div class="container-grid">
    <table cellpadding="10" cellspacing="1">
        <thead>
            <tr>
                <?php if(empty($studentCourses)) : ?>
                    <th><strong><?php echo $studentName . " is not yet enrolled for courses" ?></strong></th>
                <?php else : ?>
                    <th><strong><?php echo $studentName . "'s Courses" ?></strong></th>
                <?php endif; ?>
            </tr>
        </thead>
    </table>
    <form action="" method="post">
        <!-- If student is not enrolled in courses -->
        <?php if(empty($studentCourses)) : ?>
             <!-- All Courses -->
             <select name="courseName" id="course_name">
                <option value="" selected>Select...</option>
            <?php  foreach ($allCourses as $course) : ?> 
                <option value="<?php echo $course ?>"><?php echo $course ?></option>
            <?php endforeach; ?> 
            </select>
        <?php else : ?>
            <!-- Rest of the Courses -->
            <select name="courseName" id="course_name">
            <?php $rest = array_diff($allCourses, $studentCourses); ?>
                <option value="" selected>Select...</option>
            <?php  foreach ($rest as $course) : ?> 
                <option value="<?php echo $course ?>"><?php echo $course ?></option>
            <?php endforeach; ?> 
            </select>

            <!-- Currently Enrolled Courses -->
            <ol>
            <?php  foreach ($studentCourses as $studentCourse) : ?>
                <li><?php echo $studentCourse ?></li>   
                <?php endforeach; ?>
            </ol>
        <?php endif; ?>
        <div class="add-button">
            <input type="submit" name="addStudentCourse" class="btn-submit" value="Submit" />
        </div>
    </form>
</div>

   