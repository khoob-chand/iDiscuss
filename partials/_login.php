<?php 

echo '<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form action="login.php" method="post"  data-toggle="modal">
  <div class="form-group p-1">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="loginname"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
   
  </div>
  <div class="form-group p-1">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="loginpassword" id="exampleInputPassword1" placeholder="Password">
    


    
    
  </div>';
    
  
  echo '<button type="submit" class="btn btn-primary my-2">Login </button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>';


?>