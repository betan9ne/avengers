<div class="column">
    <div class="columns">
        <div class="column">
         <?php foreach($alerts as $alert): ?>
     <article class="message">
          <div class="message-body">
                <?php echo $alert['display_name']?>..."<?php echo $alert['comment']?>"... on <strong><a href="<?php echo base_url()?>index.php/tasks/task/<?php echo $alert['t_id']?>"><?php echo $alert['task']?></a></strong> at <?php echo $alert['cre']?>
         </div></article>
         <?php endforeach ?>

  </div>
        <div class="column is-3">
        </div>
            </div>
</div>