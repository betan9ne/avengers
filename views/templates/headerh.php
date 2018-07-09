<DOCTYPE! html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url(); ?>css/bulma.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>css/bulma-calendar.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>css/bulma-tooltip.min.css" rel="stylesheet" />
     <script src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
     <script defer src="<?php echo base_url(); ?>js/all.js"></script>
     <script defer src="<?php echo base_url(); ?>js/bulma-calendar.js"></script>
   <title>Grid</title>

</head>
<body>
    <br/>
   <div class="columns ">
       <div class="column is-2">
       <aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a href="<?php echo base_url()?>index.php">Dashboard</a></li>    
  </ul>
  <p class="menu-label">
    Table of Topics
  </p>
  <ul class="menu-list">
    <li><a href="#dashboard">Dashboard</a></li>
    <li><a href="#calendar">Calendar</a></li>
    <li><a  href="#tasks">Tasks</a></li>
    <li><a  href="#media">Media Files</a></li>
    <li><a  href="#campaigns">Campaigns</a></li>
    <li><a href="#reports">Reports</a></li>
    <li><a  href="#budgets">Budgets</a></li>
    <li><a href="#search">Search</a></li>
    <li><a href="#alerts">Alerts</a></li>
    <li><a href="#admin">Admin</a></li>
  </ul>
   
</aside>
       </div>
       <div class="column">
       <div class="content">
           <h1 id="dashboard">Dashboard</h1>
           <p> <img src="<?php echo base_url()?>assets/dashboard.JPG">
   </p>
           <h1 id="calendar">Calendar</h1>
           <p> <img src="<?php echo base_url()?>assets/calendar.JPG">
   </p>
           <h1 id="tasks">Tasks</h1>
           <p> <img src="<?php echo base_url()?>assets/task.JPG">
   </p>
           <p> <img src="<?php echo base_url()?>assets/task_view.JPG">
   </p>
           <h1 id="media">Media</h1>
           <p> <img src="<?php echo base_url()?>assets/media.JPG">
   </p>
           <h1 id="campaigns">Campaigns</h1>
           <p> <img src="<?php echo base_url()?>assets/campaigns.JPG">
   </p>
           <h1 id="reports">Reports</h1>
           <h1 id="budgets">Budgets</h1>
             <p> <img src="<?php echo base_url()?>assets/budget.JPG">
   </p>
           <h1 id="search">Search</h1>
             <p> <img src="<?php echo base_url()?>assets/search.JPG">
   </p>
           <h1 id="alerts">Alerts</h1>
           <h1 id="admin">Admin</h1>
             <p> <img src="<?php echo base_url()?>assets/admin.JPG">
   </p>
           <p></p>
           </div>
       </div>
      <div class="column is-1"></div>
    
   
  
     