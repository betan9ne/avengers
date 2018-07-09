<div class="column">
    <div class="columns">
        <div class="column">
            <div class="card">
  <header class="card-header">
    <p class="card-header-title">
     Admin
    </p>     </header>
  <div class="card-content">
    <div class="content">
             <?php echo form_open('admin/update_user') ?>
             <div class="field">
                <label class="label">Display name</label>
                <div class="control">
                    <input class="input" name="display_name" type="text" value="<?php echo $user["display_name"]?>"> </div>
            </div>   
        <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" name="name" type="text" value="<?php echo $user["name"]?>"> </div>
            </div>  
        <div class="field">
                <label class="label">Department</label>
                <div class="control">
                    <input class="input" name="department" type="text" value="<?php echo $user["department"]?>"> </div>
            </div> 
         <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Update</button>
                </div> 
            </div>
             <?php echo form_close() ?>
      
    </div>
  </div>
      </div>            
            
            <div class="card">
  <header class="card-header">
    <p class="card-header-title">
     Password
    </p>     </header>
  <div class="card-content">
    <div class="content">
             <?php echo form_open('admin/update_password') ?>
             <div class="field">
                <label class="label">Current password</label>
                <div class="control">
                    <input class="input" name="password" type="text" > </div>
            </div>   
        <div class="field">
                <label class="label">New Password</label>
                <div class="control">
                    <input class="input" name="new" type="text" > </div>
            </div>  
        
         <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div> 
            </div>
             <?php echo form_close() ?>
      
    </div>
  </div>
      </div>            
   </div>
        <div class="column is-3">
            
    </div>
</div>