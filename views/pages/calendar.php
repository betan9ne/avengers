<div class="column">
    <div class="columns">
        <div class="column">
    <?php

$calendar = new Calendar();
 
echo $calendar->show();
            ?>

        </div>
        </div>
        </div>
        
    <div class="column is-3">
       <?php echo $calendar->_createNavi(); ?>
        <br/>
        <br/>
     <?php echo form_open('projects/add_task2/') ?>
            <div class="field">
                <label class="label">Create Task</label>
                <div class="control">
                    <input class="input" name="task" type="text" placeholder="Text input"> </div>
            </div> 
             <div class="field">
                <label class="label">Assigned to</label>
                <div class="control">
                    <div class="select">
                        <select name="assigned">
                            <?php foreach($users as $user): ?>
                            <option value="<?php echo $user["id"];?>"><?php echo $user["name"];?></option>                         <?php endforeach ?>
                         </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Due Date</label>
                <div class="control">
                    <input class="input" name="due_date" type="date" id="due_date" placeholder="Text input"> </div>
            </div>
            <div class="field">
                <label class="label">Priority</label>
                <div class="control">
                    <div class="select">
                        <select name="priority">
                            <option value="P1">P1</option>
                            <option value="P2">P2</option>
                            <option value="P3">P3</option>
                            <option value="P4">P4</option>                            
                        </select>
                    </div>
                </div>
            </div>
             <div class="field">
                <label class="label">Created by</label>
                <div class="control">
                     <input class="input" disabled name="created_by" type="text" value="<?php echo $name ?>">
                </div>
            </div>
             <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
                <div class="control">
                    <button class="button is-text" type="reset">Cancel</button>
                </div>
            </div>
              <?php echo form_close() ?>       
  </div>
              </div>      
            
        </div>
    </div>
</div>
 