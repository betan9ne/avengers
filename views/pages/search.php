<div class="column">
    <div class="columns">
        <div class="column">
            <div class="card">
   
  <div class="card-content">
    <div class="content">
       <h1 class="title is-1 has-text-weight-light">
         <?php echo $search ?>
        </h1>
    </div>
  </div>
              </div>            
      <br/>
           
             <h3  class="title is-5"><?php echo count($results)?> Results</h3>
            <br/>
      <!--campaigns-->
  <table class="table is-fullwidth is-hoverable">
                <thead> 
                     <th>Campaign</th>
                    <th>Segment</th>
                    <th>Budget</th>
                    <th></th>                    
             </thead>
      <?php foreach($results as $item): ?>
      <?php if(empty($item->campaign))
            {
                ?>
               <?php
            }
      else
      {
          ?>
         <tr>
                     <td><?php echo  $item->campaign?></td>
                   <td><?php echo  $item->segment?></td>
                    <td><?php echo  $item->budget?></td>
                    <td><a href="<?php echo base_url()?>index.php/projects/view_project/<?php echo $item->id?>">View</a></td>
                </tr>
          <?php
      }
      ?>            <?php endforeach ?>
            </table>
  
            <!--tasks-->
            <table class="table is-fullwidth is-hoverable">
                <thead> 
                     <th>Task</th>
                     <th></th>                    
             </thead>
      <?php foreach($results as $item4): ?>
      <?php if(empty($item4->task))
            {
                ?>
               <?php
            }
      else
      {
          ?>
         <tr>
                     <td><?php echo  $item4->task?></td>
                     <td><a href="<?php echo base_url()?>index.php/tasks/task/<?php echo $item4->id?>">View</a></td>
                </tr>
          <?php
      }
      ?>            <?php endforeach ?>
            </table>
  
            
            <!--costs-->
              <table class="table is-fullwidth is-hoverable">
                <thead> 
                     <th>Agency</th>
                    <th>Total</th>
                    <th>Document Number</th>
                    <th></th>                    
             </thead>
            <?php foreach($results as $item2): ?>
                   <?php if(empty($item2->agency))
            {
                ?>
               <?php
            }
      else
      {
          ?>
                <tr>
                     <td><?php echo  $item2->agency?></td>
                    <td><?php echo  $item2->total?></td>
                    <td><?php echo  $item2->doc_no?></td>
                                    </tr>
                  
                  <?php
      }
                  ?>
                  <?php endforeach ?>
            </table>
            
            <!--files-->
              <table class="table is-fullwidth is-hoverable">
                <thead> 
                     <th>Files</th>
                    <th>Desc</th>
                    <th>Type</th>
                    <th></th>                    
             </thead>
            <?php foreach($results as $item3): ?>
                   <?php if(empty($item3->_file))
            {
                ?>
               <?php
            }
      else
      {
          ?>
                <tr>
                    <td><?php echo  $item3->_file?></td>
                    <td><?php echo  $item3->_desc?></td>
                    <td><?php echo  $item3->_type?></td>
                    <td><a href="<?php echo base_url()?>media/<?php echo $item3->_file?>" target="_blank">Open</a></td>
                                    </tr>
                   <?php
      }
                  ?>
                  <?php endforeach ?>
            </table>
            
         </div>
        <div class="column is-3">
                 
       
            
        </div>
    </div>
</div>
 