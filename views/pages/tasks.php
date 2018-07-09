<div class="column">
    <div class="columns">
        <div class="column">
            
             <h3  class="title is-5">Tasks</h3>
              <div class="buttons has-addons">             
  <span class="button"><a href="<?php echo base_url()?>index.php/tasks/filter/C">My Created Tasks</a></span>
  <span class="button"><a href="<?php echo base_url()?>index.php/tasks/filter/J">My Joined Tasks</a></span>
  <span class="button"><a href="<?php echo base_url()?>index.php/tasks/filter/A">My Assigned Tasks</a></span>
</div>
           <table class="table is-fullwidth is-hoverable">
                <thead> 
                    <th>Id</th>
                    <th>Task</th>
                    <th>Due date</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th></th>                    
             </thead>
             <?php foreach($tasks as $item): ?>
                <tr>
                    <td><?php echo  $item['id']?></td>
                    <td><?php echo  $item['task']?></td>
                    <td><?php echo  $item['due_date']?></td>
                    <td><a class="button is-<?php echo  $item['priority']?> is-rounded"><?php echo  $item['priority']?></a></td>
                    <td><?php 
         echo $item['status'];
         ?></td>
                    <td>  <a href="<?php echo base_url()?>index.php/tasks/task/<?php echo $item["id"]?>">View</a></td>
                </tr>
                  <?php endforeach ?>
            </table>
             
         </div>
        <div class="column is-3">
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
                    <input class="input" name="due_date" type="date" placeholder="Text input"> </div>
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
 