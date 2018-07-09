<div class="column">
    <div class="columns">
        <div class="column">
            <div class="columns">
                <div class="column">
                <div class="card">
  <header class="card-header">
    <p class="card-header-title">
      <?php echo $campaign["campaign"] ?>  Campaign
    </p>
      </header>
  <div class="card-content">
    <div class="content">
     <?php echo $campaign["description"] ?><br/> <?php echo $campaign["segment"] ?> <br/>  
      <time datetime="2016-1-1"><?php echo $campaign["created"] ?> </time>
           
    </div>
  </div>
  
</div>    
                </div>
                <div class="column">
                  <div class="card">
  <header class="card-header">
    <p class="card-header-title">
      Total Budget
    </p>
      </header>
  <div class="card-content">
    <div class="content">
       <h1 class="title is-3 has-text-weight-light">
             <strong><?php echo $campaign["budget"] ?> </strong><br/> 
        <span class="title is-5 has-text-weight-bold">
            Spent <?php echo $costs["tt"] ?>
            </span>
      
        </h1>
    </div>
  </div>
              </div>      
                </div>
            </div>
                    
      <br/>
            <h3 class="title is-5">
                <?php echo count($tasks) ?> Tasks 
                  <br/>
                <br/>
              
                <progress class="progress is-primary" value="<?php echo  $complete['complete']?>" max="<?php echo count($tasks) ?>"><?php echo  $complete['complete']?></progress></h3>
            <table class="table is-fullwidth is-hoverable">
                <thead> 
                    <th>Id</th>
                    <th>Task</th>
                    <th>Due date</th>
                    <th></th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th></th>                    
             </thead>
             <?php foreach($tasks as $item): ?>
                <tr>
                    <td><?php echo  $item['id']?></td>
                    <td><?php echo  $item['task']?></td>
                    <td><?php echo date('Y-m-d', strtotime($item['due_date'])); ?>
                      <td>  <?php 
                            if($item['status'] == "Complete")
                            {

                            }
                        else
                        {
                                $cd = date("Y-m-d");
                            if($item['due_date'] < $cd)
                            {
                                ?>
                             <a class="button is-danger is-rounded">Overdue</a>
                        <?php
                            }
                        }?></td>
           <td><?php echo  $item['status']?></td>
                    <td><a class="button is-<?php echo  $item['priority']?> is-rounded"><?php echo  $item['priority']?></a></td>
                      <td>  <a href="<?php echo base_url()?>index.php/tasks/task/<?php echo $item["id"]?>">View</a></td>
                </tr>
                  <?php endforeach ?>
            </table>
        </div>
        <div class="column is-3">
            <?php echo form_open('projects/add_task/'.$campaign["id"]) ?>
            <div class="field">
                <label class="label">Create Task</label>
                <div class="control">
                    <input class="input" name="task" type="text" required placeholder="Text input"> </div>
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
                    <input class="input" name="due_date" type="date" required placeholder="Text input"> </div>
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
                     <input class="input" disabled name="created_by" required type="text" value="<?php echo $name ?>">
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
         <br/>
        </div>
    </div>
</div>

<div class="modal">
  <div class="modal-background"></div>
  <div class="modal-content">
    <!-- Any other Bulma elements you want -->
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>
