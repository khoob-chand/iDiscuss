<?php 
session_start();

   echo '<nav class="  navbar navbar-expand-lg navbar-dark bg-dark mb-1 p-0">
   <a class="navbar-brand" href="#">Navbar</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 
   <div class="collapse navbar-collapse mx-4" " id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
         <a class="nav-link active" href="index.php">Home</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Link</a>
       </li>
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Dropdown
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="#">Action</a>
           <a class="dropdown-item" href="#">Another action</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="#">Something else here</a>
         </div>
       </li>
       <li class="nav-item">
         <a class="nav-link disabled" href="#">Disabled</a>
       </li>
     </ul>';
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="flex mx-2 mt-3 mb-2 text-light  my-1"> <img  src="img/user.png"  class="rounded" style="width:24px;
        ;" alt="Generic placeholder image">  Welcome <br>'.$_SESSION['useremail'].'</div>
        <div> <a href="logout.php" class="btn btn-primary  ">Logout </a> </div>';
    
       } 
       else{
        echo '<form class="d-flex" role="search">
          <input class="form-control me-2 my-2" style="height:2.5rem!important;" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 "style="height:2.5rem!important;" type="submit">Search</button>
        </form>
        <div class="d-block">
           <div class="btn btn-primary  mx-1 " data-toggle="modal" data-target="#loginmodal">Login</div>
           <div class="btn btn-primary mr-2 " data-toggle="modal" data-target="#signupmodal">Signup</div>;
           </div>';
       }    
       
 echo '</div></nav>';
  
?>