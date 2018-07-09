    </div>
</body> 
  <script src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
   
  
<script type="text/javascript">
    /*assign cost to task*/
 $("#showModal").click(function() {
  $("#assignCost").addClass("is-active");  
});

$(".modal-close").click(function() {
   $(".modal").removeClass("is-active");
}); 
    /*edit task*/
    $("#editTask").click(function() {
  $("#edit_task").addClass("is-active");  
});

$(".modal-close").click(function() {
   $(".modal").removeClass("is-active");
});
    /*join task*/
    $("#join_task").click(function() {
  $("#joinTask").addClass("is-active");  
});

$(".modal-close").click(function() {
   $(".modal").removeClass("is-active");
});
    
    function getDate(X)
    {
         document.getElementById("due_date").value = X;
    }
    
    var grid_settings = '{"name": "John","task_view": "C"}';
    
   

</script>
  
</html>