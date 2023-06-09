<?php 

if($_SERVER['REQUEST_METHOD']=='POST'){
 
   
    $showerror=false;
    include 'partials/_dbconnect.php';
    $user_email=$_POST['uemail'];
    
    $user_pass=$_POST['upass'];
    $user_cpass=$_POST['cpass'];
    $existsql="SELECT *FROM signup WHERE user_email='$user_email'";
    $result=mysqli_query($conn,$existsql);
    $numRows = mysqli_num_rows($result);
  
    if($numRows>0){
        echo "User Already Present";
    }
    else{
        
        if($user_pass==$user_cpass){
          
            $hash = password_hash($user_pass,PASSWORD_DEFAULT);
              $sql = "INSERT INTO `signup` (`user_email`,`password`,`date`) VALUES ('$user_email','$hash', current_timestamp())";
              $success=mysqli_query($conn,$sql);
              
             
              if($success){
              
                echo "inserted ";
                $showAlert = true;
                header("Location:./index.php?signupsuccess=true");
                
            }
        }
        else{
            header("Location:./index.php?signupsuccess=false");
        }

        
    }
    


}


?>