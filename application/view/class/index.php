
<div class="container">
    <div class="item-list">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4>Class</h4></div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo Config::get('URL', 'gen'); ?>class/viewClass/?classID=1&teacherID=1">Class One</a></li>
                <li class="list-group-item">Class One</li>
                <li class="list-group-item">Class One</li>
                <li class="list-group-item">Class One</li>
                <li class="list-group-item">Class One</li>
                <li class="list-group-item">Class One</li>
            </ul>
        </div>
    </div>
</div> <!-- /container -->

<!-- echo out the system feedback (error and success messages) -->
<?php $this->renderFeedbackMessages(); ?>