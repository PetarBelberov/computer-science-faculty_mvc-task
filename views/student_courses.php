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
        <?php if(empty($studentCourses['name'])) : ?>
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
            <?php $rest = array_diff($allCourses, $studentCourses['name']); ?>
                <option value="" selected>Select...</option>
            <?php  foreach ($rest as $course) : ?> 
                <option value="<?php echo $course ?>"><?php echo $course ?></option>
            <?php endforeach; ?> 
            </select>
        <?php endif; ?>
            <!-- Submit -->
            <div class="add-button">
                <input type="submit" name="addStudentCourse" class="btn-submit" value="Submit" />
            </div>
    </form>
    
        <!-- Currently Enrolled Courses -->
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Courses</strong></th>
                    <th><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i < sizeof($studentCourses['name']); $i++) : ?>
                    <form action="" method="post">
                    <tr>
                        <td><?php echo $studentCourses['name'][$i]; ?></td>
                        <td>
                            <input type="hidden" name="courseId" id="course_id" value="<?php echo $studentCourses['id'][$i]; ?>" />
                            <div class="delete-button">
                                <input type="submit" name="deleteStudentCourse" class="btn-submit" value="Submit" />
                            </div>
                        </td>
                    </tr>
                    </form>
                <?php endfor; ?>
            </tbody>
        </table>    
    
 
</div>

   