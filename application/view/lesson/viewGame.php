<div class="container">

    <h4>Game for Lesson <?php echo Request::get('id'); ?></h4>
    <script language ="JavaScript">
        function checkAnswer (form) {
            if (form.B.checked == true) {
                alert("Correct answer!");
             }
                
            else {
                alert("Incorrect answer!");
            }
        }
        
    </script>
    
    <p>Select the correct statement for the loop body so that the loop terminates.
    <br>x = 0 <br> while (x < 10) <br> _____________</p>
    <form name ="GameQ1" method="POST" action="viewLesson.php">
        <input type="radio" name="q1" value="A" id="A"/>x--<br>
        <input type="radio" name="q1" value="B" id ="B"/>x++<br>
        <input type="radio" name="q1" value="C" id="C"/>x = -22<br>
        <p><input type="submit" value="Submit Answer" onClick="checkAnswer(this.form)"/></p>
    </form>

    <a href="<?php echo Config::get('URL','gen'); ?>lesson/viewLesson/?id=<?php echo Request::get('id'); ?>"><- Back to lesson page</a>
</div> <!-- /container -->

<!-- echo out the system feedback (error and success messages) -->
<?php $this->renderFeedbackMessages(); ?>