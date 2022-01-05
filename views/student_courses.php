<!-- <div class="container"> -->
    <!-- <div class="content"> -->
        <div id="student_courses" class="container-grid">
            
            <?php if(empty($studentCourses)) : ?>
                <h2 class="title"><?php echo $studentName . " is not yet enrolled for courses" ?></h2>
            <?php else : ?>
                <h2 class="title"><?php echo $studentName . "'s Courses" ?></h2>
            <?php endif; ?>
            
            <?php if(!empty($studentCourses)) : ?>
            <div class="content">
                <form action="" method="post">
                    
                    <!-- If student is not enrolled in courses -->
                    <?php if(empty($studentCourses['name'])) : ?>
                        <!-- All Courses -->
                        <div>
                            <select name="courseName" id="course_name">
                                <option value="" selected>Select...</option>
                            <?php  foreach ($allCourses as $course) : ?> 
                                <option value="<?php echo $course ?>"><?php echo $course ?></option>
                            <?php endforeach; ?> 
                            </select>
                        </div>
                        
                    <?php else : ?>
                        <!-- Rest of the Courses -->
                        <div>
                            <select name="courseName" id="course_name">
                            <?php $rest = array_diff($allCourses, $studentCourses['name']); ?>
                                <option value="" selected>Select...</option>
                            <?php  foreach ($rest as $course) : ?> 
                                <option value="<?php echo $course ?>"><?php echo $course ?></option>
                            <?php endforeach; ?> 
                            </select>
                        </div>
                    <?php endif; ?>
                        <!-- Submit -->
                        <div class="add-button">
                            <button type="submit" class="btn-submit" name="addStudentCourse">
                                <img src="<?php echo BASE_URL . '/image/icon-add.png' ?>" />
                                <span>Add Course</span>
                            </button>
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
                                        <button type="submit"  name="deleteStudentCourse"><img src="<?php echo BASE_URL . '/image/icon-delete.png' ?>" /></button>
                                    </div>
                                </td>
                            </tr>
                            </form>
                        <?php endfor; ?>
                    </tbody>
                </table>   
                <?php endif; ?> 
            </div>
            <h2 class="title back">
                <a href="<?php echo BASE_URL . '/index.php' ?>">
                    <i class="fas fa-home"></i> Back
                </a>
            </h2>
        </div><!-- #student_courses -->
        
    <!-- </div> -->
<!-- </div> -->

   