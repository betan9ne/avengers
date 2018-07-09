<DOCTYPE! html>
<head>
  
<style>
    html{height: 100%;
}
body{height: 100%; padding: 0px; margin: 0;
font-family: "Roboto", sans-serif;
    background-image: url('<?php echo base_url()?>assets/left.png');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: right
   
    }
.contain {
    height: 100%;  
     margin: 0 auto;
    padding: 0px;
    
}
h1{
    font-weight: 200;
    font-size: 50px;
}
h3{font-weight: 900;
    
font-size: 20px}

.text{
    padding:10px 20px;
    border: thin solid #999;
     width:200px;

}
.button{
    padding:10px 20px;
    color:#333; width:200px;
    background-color: white;
    border: thin solid #999;
    text-transform: uppercase;
    font-family:  "Roboto", sans-serif; 
}



    
    </style>
   <title>ADMIN</title>
</head>
<body>
  <div class="contain">
      <table style="width:90%; margin:0 auto; height:100%">
          <tr>
                <td><h3>Grid</h3></td>
          </tr>
            <tr>              
                <td style="width:50%;">
                     <h3>Email</h3>
                    <?php echo form_open('verifylogin'); ?>  
                 <input type="text" required name="username" class="text" id="pin"/>             
                    <h3>Password:</h3>
                    <input type="password" required name="password" class="text" id="pin"/>
<br/><br/>
                    <input type="submit" class="button" value="Login"/>
                    <?php echo form_close()?>
                </td>                
          </tr>
          <tr>
            <td><h3>Its ok to be angry</h3></td>
          </tr>
      </table>
     
       
    </div>
</body>

   
            
 