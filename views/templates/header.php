<DOCTYPE! html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url(); ?>css/bulma.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>css/bulma-calendar.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>css/bulma-tooltip.min.css" rel="stylesheet" />
        <script defer src="<?php echo base_url(); ?>js/all.js"></script>
     <script defer src="<?php echo base_url(); ?>js/bulma-calendar.js"></script>
       <title>Grid</title>

</head>
<body>
    <br/>
   <div class="columns ">
       <div class="column is-2">
             <h2>Grid.</h2>
       </div>
       <div class="column">
            <?php echo form_open('search') ?>
          <div class="field has-addons ">
             <div class="control is-expanded">
                <input class="input" type="text" name="search" placeholder="Find something"> </div>
            <div class="control"> <button class="button is-link" type="submit">Search</button> </div>
              </div>
               <?php echo form_close() ?>
       </div>
       <div class="column is-3">
       <h3 class="has-text-right"><?php echo $name ?></h3></div>
    </div>
    
   <div class="columns">
  <div class="column is-2">
    <aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a href="<?php echo base_url()?>index.php">Dashboard</a></li>
    <li><a href="<?php echo base_url()?>index.php/projects">Campaigns</a></li>
    <li><a href="<?php echo base_url()?>index.php/calendar">Calendar</a></li>
    <li><a href="<?php echo base_url()?>index.php/tasks">Tasks</a></li>
    <li><a href="<?php echo base_url()?>index.php/media">Media</a></li>
  </ul>
    
  <p class="menu-label">
    Things
  </p>
  <ul class="menu-list">    
    <li><a href="<?php echo base_url()?>index.php/budget">Budget</a></li>
    <li><a href="<?php echo base_url()?>index.php/admin">Admin</a></li>
    <li><a href="<?php echo base_url()?>welcome/logout">Logout</a></li>
  </ul>
</aside>
  </div>
  
     