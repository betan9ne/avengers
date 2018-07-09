<div class="column">
    <div class="columns">
        <div class="column">
            <div class="card">
  <header class="card-header">
    <p class="card-header-title">
      <?php echo $task["task"] ?> Task 
    </p>
      <?php 
    if ($id == $task["created_by"])
    {
        ?>
      <div class="buttons has-addons">
 <a class="button is-right is-primary" id="editTask">Edit</a>
  <span class="button is-info" id="join_task">Add to Task</span>
 
</div>
      
      <?php
    }
        ?>
      </header>
  <div class="card-content">
    <div class="content">
     Assigned to <?php echo $task["name"]?>  
       <?php 
    if ($id == $task["u_id"])
    {
        ?>
         <br>
      <br>
      
        <?php echo form_open('tasks/update_status/'.$task["t_id"]) ?>
        <div class="field">
                  <div class="control"> Status is 
                    <div class="select"> 
      
                        <select name="status">
                            <option value="<?php 
   echo $task["status"];?> " is-selected><?php    echo $task["status"];?> </option>
                            <option value=" "> </option>
                            <option value="Open">Open</option>
                            <option value="Pending">Pending</option>
                            <option value="Complete">Complete</option>                             
                            <option value="Cancelled">Cancelled</option>                             
                        </select>
                    </div>
                       <button class="button is-link" type="submit">Update</button>
                </div>
                </div>
         <?php echo form_close() ?>
        <?php
    }
        else
        {
            ?><br/>
                Status is <?php echo $task["status"];?><br/>
            <?php
        }
         ?>
        
        
        <time  >Due Date <?php echo $task["due_date"] ?> </time>
        <br/>
        <br/>
        <div class="buttons">
             <?php foreach($join as $join): ?>
  <span class="button tag"><?php echo $join["name"];?>
      <?php
        if ($id == $task["created_by"])
    {
            ?>
      <a class="delete" href="<?php echo base_url()?>index.php/tasks/remove_join_task/<?php echo $join["id"].'/'.$task['t_id'];?>"></a>
      <?php
        }
      ?>
    </span>
<?php endforeach ?>
</div>
    </div>
  </div>
      </div>            
            <br/>
             <h3  class="title is-5">Comments</h3>
                 <?php echo form_open('tasks/add_comment/'.$task["t_id"]) ?>
             <div class="field has-addons ">
            <div class="control is-expanded">
                <input class="input" rows="3" type="text" name="comment" placeholder="add a comment"> 
                  </div>
            <div class="control"> <button class="button is-link" type="submit">Send</button> </div>
        </div>
              <?php echo form_close() ?>
            <br/>
            <?php foreach($comment as $comment): ?>
            <article class="message">
  <div class="message-body">
      <?php 
       
      ?>
      
 <?php
      $men = new Tasks();

       $text = $comment["comment"];
    //  $men->getMentions($text);
       $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
 
        if(preg_match($reg_exUrl, $text, $url)) {
        $texts =  preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $text);
         echo $men->getMentions($texts);

        }
else {
    echo $men->getMentions($text);
}
       ?>, 
        <strong><?php echo  $comment['name']?></strong> on <?php echo  $comment['created']?>
  </div>
</article> 
            <?php endforeach ?>
             
         </div>
        <div class="column is-3">
            <?php echo form_open_multipart('tasks/add_media/'.$task["t_id"]) ?>
            <div class="field">
                <h3 class="title is-5">Attahments</h3>
                <div class="control">
                    <input class=" " name="userfile" type="file" required placeholder="Text input"> </div>
            </div> 
                <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <input class="input" name="desc" type="text" required placeholder="Text input"> </div>
            </div>
            <div class="field">
                <label class="label">Type</label>
                <div class="control">
                    <div class="select">
                        <select name="type">
                            <option value="CE">CE (Cost Estimate)</option>
                            <option value="Invoice">Invoice</option>
                            <option value="IO">I/O (Insertion Order)</option>
                            <option value="Creative">Creative</option>
                            <option value="Strategy">Strategy</option>
                            <option value="Report">Report</option>
                        </select>
                    </div>
                </div>
            </div>
            
              <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
               
            </div>
              <?php echo form_close() ?>
            <br/>
             <div class="">
                <h3 class="title is-5">Files</h3>
                 <!--<?php
     for ($counter = 1; $counter < 20; $counter++ ) {
         echo $counter;
     if ($counter % 3 == 0) {
            echo "<p>Every third!</p>";
     }  
   }
    ?>-->
              <?php foreach($media as $media): ?>
                <div class="field is-grouped is-grouped-multiline">
                      <p class="control ">
                            <?php echo $media["type"];?><br/> <strong><?php echo  $media['_desc']?></strong>
                          <br/><?php echo  $media['file']?><br/>
                          <a href="<?php echo base_url()?>media/<?php echo $media['file']?>" target="_blank">Open</a>
                         
                          <a class="button is-outlined" id="showModal" data-id=""><?php
                                $type = $media["type"];
                                switch ($type) {
                                case "Invoice":
                                    echo "Assign Cost";
                                    break;                              
                                    }        
                            ?></a>
                          
                         </p>
                </div>
              <?php endforeach ?>
                </div>
        
      
        </div>
    </div>
</div>

<div class="modal" id="edit_task">
   <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Edit task</p>
     </header>
    <section class="modal-card-body">
          <?php echo form_open('projects/update_task/'.$task["t_id"]) ?>
            <div class="field">
                <label class="label">Task</label>
                <div class="control">
                    <input class="input" name="task" type="text" required value="<?php echo $task["task"] ?>" > </div>
            </div> 
             <div class="field">
                <label class="label">Assign to</label>
                <div class="control">
                    <div class="select">
                        <select name="assigned" required>
                            <option value="<?php echo $task["u_id"] ?>"><?php echo $task["name"] ?></option>
                            <option value=""></option>
                             <?php foreach($users as $user): ?>
                            <option value="<?php echo $user["id"];?>"><?php echo $user["name"];?></option>                         <?php endforeach ?>
                         </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Due Date</label>
                <div class="control">
                    <input class="input" name="due_date" type="date" value="<?php echo $task["due_date"] ?>"> </div>
            </div>
            <div class="field">
                <label class="label">Priority</label>
                <div class="control">
                    <div class="select">
                        <select name="priority">
                            <option value="<?php echo $task["priority"] ?>"><?php echo $task["priority"] ?></option>
                            <option value=""></option>
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
    </section>
     <button class="modal-close is-large" aria-label="close"></button>
  </div>
</div>

<div class="modal" id="assignCost">
   <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Assign Cost</p>
     </header>
    <section class="modal-card-body">
       <?php echo form_open('budget/add_cost/') ?>
            <div class="field">
                <label class="label">Add Cost</label>
                <div class="control">
                    <input class="input" name="f_id" type="hidden" required value="<?php echo $task["t_id"]?>">
                    <input class="input" name="total" type="text" required placeholder="Text input"> </div>
            </div> 
             <div class="field">
                <label class="label">Agency</label>
                <div class="control">
                    <div class="select">
                        <select name="agency">
                            <option value="Sprout">Sprout</option>
                            <option value="Helium">Helium</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Mailchimp">Mailchimp</option>
                         </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Due Date</label>
                <div class="control">
                    <input class="input" name="_date" type="date" required placeholder="Text input"> </div>
            </div>
             <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <input class="input" name="desc" type="text" required placeholder="Text input"> </div>
            </div>
             <div class="field">
                <label class="label">Document Number</label>
                <div class="control">
                    <input class="input" name="doc_no" type="text" required placeholder="Text input"> </div>
            </div>
             <div class="field">
                <label class="label">Reference Number</label>
                <div class="control">
                    <input class="input" name="ref_id" type="text" required placeholder="Text input"> </div>
            </div>
              
             <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
                            </div>
              <?php echo form_close() ?>
    </section>
     <button class="modal-close is-large" aria-label="close"></button>
  </div>
</div>


<div class="modal" id="joinTask">
   <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add to task</p>
     </header>
    <section class="modal-card-body">
       <?php echo form_open('tasks/join_task/'.$task["t_id"]) ?>
             <div class="field">
                <label class="label">Team Members</label>
                <div class="control">
                    <div class="select">
                        <select name="user_id">
                             <?php foreach($users as $user): ?>
                            <option value="<?php echo $user["id"];?>"><?php echo $user["name"];?></option>                         <?php endforeach ?>
                         </select>
                    </div>
                </div>
            </div>       
              
             <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Assign</button>
                </div>
                            </div>
              <?php echo form_close() ?>
    </section>
     <button class="modal-close is-large" aria-label="close"></button>
  </div>
</div>
