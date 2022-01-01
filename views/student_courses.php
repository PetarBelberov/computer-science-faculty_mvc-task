<div class="container-grid">
    <table cellpadding="10" cellspacing="1">
        <thead>
            <tr>
                <th><strong><?php echo $studentName . "'s Courses" ?></strong></th>
            </tr>
        </thead>
    </table>
    <form action="">
        <?php  var_dump($allCourses); ?>
        <?php  foreach ($allCourses as $course) : ?>
            <?php if (in_array($course, $studentCourses)) : ?>
                <input type="checkbox" name="courseName[]" checked value="<?php echo $course ?>">
                <label for="courseName"> <?php echo $course ?></label><br>
            <?php else : ?>
                <input type="checkbox" name="courseName[]" value="<?php echo $course ?>">
                <label for="courseName"> <?php echo $course ?></label><br>
            <?php endif; ?>
        <?php endforeach; ?> 
    </form>
    <div class="add-button">
          <!-- <input type="submit" value="Submit"> -->

        <a id="btn_add_action" href="?id=<?php echo $result[0]['id']?>"><img src="image/icon-add.png" />Submit</a>
    </div>
</div>

   