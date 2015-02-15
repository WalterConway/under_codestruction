<div id="contentArea">
    <div class="contentDivision"> 
    <h1>LoginController/editUsername</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="panel panel-body">
        <h2>Change your username</h2>

        <form action="<?php echo Config::get('URL','gen'); ?>login/editUserName_action" method="post">
            <!-- btw http://stackoverflow.com/questions/774054/should-i-put-input-tag-inside-label-tag -->
            <label>
                New username: <input type="text" name="user_name" required />
            </label>
            <input type="submit" value="Submit" />
        </form>
    </div>
</div>
    
    </div>
