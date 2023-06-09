<?php 
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">' ;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $showerror=false;
    include 'partials/_dbconnect.php';
    $login_name=$_POST['loginname'];
    
    $login_pass=$_POST['loginpassword'];
    
    $existsql="SELECT *FROM signup WHERE user_email='$login_name'";
    $result=mysqli_query($conn,$existsql);
    $numRows = mysqli_num_rows($result);
    $_SESSION['loggedin'] = false;
   
    if($numRows==1){
      
        $row = mysqli_fetch_assoc($result);
        // echo var_dump(password_verify($login_pass, $row['password']));
        if(password_verify($login_pass, $row['password'])){
            $showerror=true;
            session_start();
            $_SESSION['loggedin'] = true;
          
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $login_name;
            
           
            // header("Location:/index.php");
            echo("<script>location.href ='./index.php';</script>");

        
        }
       

    }
   if($showerror==false){
    $_SESSION['errors'] = "error";
    header("location: index.php");
  
        echo '<div class=" alert alert-danger" role="alert">
        incorrect Password Please Login In with Correct password!
        
      </div>
      <h5 ><br><a href="./index.php">Click Here to Login Again </a></h5>';

    
 
   }

}

?>