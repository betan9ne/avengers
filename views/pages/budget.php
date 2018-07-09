<div class="column">
    <div class="columns">
        <div class="column">
              
      <br/>
           
             <h3  class="title is-5">Costs</h3>
            <br/>
            <table class="table is-fullwidth is-hoverable">
                <thead> 
                    <th>Agency</th>
                    <th>Cost</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Reference Number</th>
                    <th></th>                    
             </thead>
             <?php foreach($cost as $cost): ?>
                <tr>
                    <td><?php echo  $cost['agency']?></td>
                    <td><?php echo  $cost['total']?></td>
                    <td><?php echo  $cost['_date']?></td>
                    <td><?php echo  $cost['_desc']?></td>
                    <td><?php echo  $cost['ref_id']?></td>
                    <td><a href="<?php echo base_url()?>media/<?php echo $cost["file"]?>">  View File</a></td>
                    
                  </tr>
                  <?php endforeach ?>
            </table>
               
         </div>
        <div class="column is-3">
                     <div class="card">
  <header class="card-header">
    <p class="card-header-title">
      Total Budget
    </p>
      </header>
  <div class="card-content">
    <div class="content">
       <h1 class="title is-1 has-text-weight-light">
           K770,000.00<br/> 
        <span class="title is-5 has-text-weight-bold">
            <?php echo "Spent K".$total["total"] ?></span>
      /  <span class="title is-5 has-text-weight-bold">Remaining K<?php 
          echo 770000.00 - $total["total"] ?></span>
        </h1>
    </div>
  </div>
              </div>      
       
            
        </div>
    </div>
</div>
 