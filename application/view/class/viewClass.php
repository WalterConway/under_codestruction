
<div class="container">
    <div class="class-list">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Class</h3>
            </div>
            <div class="panel-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Students</th>
                            <?php foreach ($this->lessons as $key => $lesson) { ?>
                                <th><?php echo $lesson->ModuleName; ?></th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->progress as $key => $value) {
                            ?>                        
                            <tr>

                                <td><?php echo $value['studentName']; ?></td>
                                <?php
                                foreach ($value['studentProgress'] as $key2 => $value2) {
                                    ?>
                                    <td><span class="badge <?php
                                              switch ($value2->AssessmentStatus) {
                                                  case "In Progress":
                                                      echo "inprogress \" >".$value2->CompletionAttemptNumber;
                                                      break;
                                                  case "Completed":
                                                      echo "completed \" >".$value2->CompletionAttemptNumber;
                                                      break;
                                                  case "Not Started":
                                                      echo "notstarted \" >";
                                                      break;
                                              }
                                              ?></span></td>
                                        <?php
                                    }
                                    ?>


                            </tr>
<?php } ?>                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>