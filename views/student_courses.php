<div class="container-grid">
    <table cellpadding="10" cellspacing="1">
        <thead>
            <tr>
                <th><strong><?php echo $studentName . "'s Courses" ?></strong></th>
            </tr>
        </thead>
    </table>
    <form action="" method="post">

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

        <div class="add-button">
            <input type="submit" name="addStudentCourse" class="btn-submit" value="Submit" />
        </div>
    </form>
</div>

   