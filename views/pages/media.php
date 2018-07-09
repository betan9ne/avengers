<div class="column">
    <div class="columns">
        <div class="column">
            
             <h3  class="title is-5">Media</h3>
            <br/>
            
  <table class="table is-fullwidth is-hoverable">
                <thead> 
                    <th>Id</th>
                    <th>File name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th></th>                    
             </thead>
            <?php foreach($media as $item): ?>
                <tr>
                    <td><?php echo  $item['id']?></td>
                    <td><?php echo  $item['file']?></td>
                    <td><?php echo  $item['_desc']?></td>
                    <td><?php echo  $item['type']?></td>
                    <td><a href="<?php echo base_url()?>media/<?php echo $item['file']?>">Open</a></td>
                </tr>
                  <?php endforeach ?>
            </table>
            
             
         </div>
        <div class="column is-3">
              <div class="card">
  <header class="card-header">
    <p class="card-header-title">
      Total Files
    </p>
      </header>
  <div class="card-content">
    <div class="content">
       <h1 class="title is-1 has-text-weight-light">
            <?php echo count($media)?> Files
        </h1>
    </div>
  </div>
              </div>      
                
       
            
        </div>
    </div>
</div>
 