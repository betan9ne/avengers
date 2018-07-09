  <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grid</title>
      <meta name="author" content="Chisomo Mwanza" />
    <link rel="shortcut icon" href="../favicon.ico">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/css.css" /> 
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script> 
</head>
<body>  
    <div class="dasboard">
        <div class="header">
            <h2><a href="<?php echo base_url()?>">Grid</a></h2>
        </div>
        
    <div class="menu">
        <table style="width:1440px; margin:0 auto;  ">
            <tr>
                <td style="width:410px; vertical-align:top;">
                    <a href="<?php echo base_url()?>index.php/calendar"> <div class="one" style="float:right">
                              <h3>Calendar</h3>
                    </div></a>
                      <div class="clear"></div>
                   <a href="<?php echo base_url()?>index.php/tasks"> <div class="two" style="float:right">
                        <h3>Tasks</h3>
                        <h1></h1>
                    </div></a>
                     <div class="clear"></div>
                  <a href="<?php echo base_url()?>index.php/media">  <div class="three" style="float:right">
                          <h3>Media Files</h3>
                    </div></a>
                </td>
                <td  style="width:620px">
                      <div class="user" >
                              <h2><?php echo $display_name ?></h2>
                        </div>
                        <a href="<?php echo base_url()?>index.php/projects"> 
                             <div class="five">
                                     <h3>Campaigns</h3>
                            </div>
                        </a>
                 <a href="<?php echo base_url()?>index.php/media/Report">    <div class="four"> 
                              <h3>Reports</h3>
                    </div> </a>
                 <a href="<?php echo base_url()?>index.php/admin">   <div class="three">
                             <h3>Admin</h3>
                    </div></a>
                </td>
                <td style="width:410px;  vertical-align:top">
                <a href="<?php echo base_url()?>index.php/budget">
                    <div class="one" style="float:left">
                        <h1>770,000.00</h1>
                             <h3><?php echo "Spent K".$total["total"] ?> 
      <br/>   Remaining K<?php 
          echo 770000.00 - $total["total"] ?></h3>
                    </div></a>
                      <div class="clear"></div>
               
                    <div class="two" style="float:left">
                         <?php echo form_open('search') ?>
                          <h3>Search</h3>
                    <input class="search" name="search" type="text" placeholder="invoices"/>
                         <?php echo form_close() ?>
                    </div>
               <a href="<?php echo base_url()?>index.php/alerts">     
                   <div class="alert" style="float:left; color:black">
                        <h2>Alerts</h2>
                    </div>
                </a>
                <a href="<?php echo base_url()?>index.php/welcome/help">     
                   <div class="alert" style="float:left; color:black">
                        <h2>Help</h2>
                    </div>
                </a>
                       
                </td>
            </tr>
        </table>
         
    </div>

</div>
    </body>
</html>
 