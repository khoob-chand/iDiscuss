<?php echo '<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="signup.php" method="post">
      <div class="form-group p-1">
        <label for="mail">Email address</label>
        <input type="email" name="uemail" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Enter email">
       
      </div>
      <div class="form-group p-1">
        <label for="exampleInputPassword2">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword2" name="upass"  placeholder="Password">
      </div>
      <div class="form-group p-1">
        <label for="exampleInputPassword3">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputPassword3" name="cpass"  placeholder="Password">
      </div>
      
      <button type="submit" class="btn btn-primary my-2">Signup  </button>
    </form>';
      echo '</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>';
?>