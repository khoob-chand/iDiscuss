<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss</title>
    <link rel="stylesheet" href="partials/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</head>

<body>
    <?php include 'partials/_header.php'?>
    <?php include 'partials/_dbconnect.php'?>
    <?php 
$id=$_GET['listid'];
$sql="SELECT * FROM thread WHERE id=$id";
$noresult=true;
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $noresult=true;
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];
}

?>
  
 <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noresult=true;
    $comm_title=$_POST['comment_title'];
  
    $sno=$_POST['idofuser'];
    $sql = "INSERT INTO `comment` (`thread_id`, `comment_content`, `commenby`,`date`) VALUES ('$id', '$comm_title','$sno', current_timestamp());";
    $result=mysqli_query($conn,$sql);
   
 }?>



    <div class="container">
        <div class="mt-4 p-5 bg-secondary container mb-2 text-light rounded">
            <h1 class="display-4">
                <?php echo $title?> 
            </h1>
            <p class="lead">
                <?php echo $desc?>
            </p>
            <hr class="my-4">
            <p>Keep it friendly.
                Be courteous and respectful. Appreciate that others may have an opinion different from yours.
                Stay on topic. ...
                Share your knowledge. ...
                Refrain from demeaning, discriminatory, or harassing behaviour and speech..</p>
           
               <?php  
                $ids=$_GET['listid'];
                $sql3="SELECT userid FROM thread WHERE id=$ids";
               
                
                $result3=mysqli_query($conn,$sql3);
                $row3=mysqli_fetch_assoc($result3);
                
                $serial=$row3['userid'];
                $sql4="SELECT user_email FROM signup WHERE sno='$serial'";
                $result4=mysqli_query($conn,$sql4);
                $row4=mysqli_fetch_assoc($result4);
           
               
               
               
               echo'<h6 class="text-dark   ">Posted by:    '.$row4['user_email'].'</h6>';?>
        </div>
       
        <h2 class="my-4">Comments</h2>
        <?php 
        if(isset($_SESSION['useremail']) && $_SESSION['loggedin'] == true)
        echo '<form class="container" action="'.$_SERVER['REQUEST_URI'].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Your Comment </label>
                <input type="text" name="comment_title" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                    <input type="hidden" name="idofuser" value="'.$_SESSION['sno'].'">
                <div id="emailHelp" class="form-text">please write comment short and lean.</div>
            </div>
            

            <button type="submit" class="btn btn-success">Submit</button>
        </form>';
        else{
            echo'<div class="container ">
            <p><a href="#" class="text-primary"  data-toggle="modal" data-target="#loginmodal"> Kindly login to Post Question</a> </p></div>';
        }
        ?>
    
          <?php 
$id=$_GET['listid'];

$sql="SELECT * FROM comment WHERE thread_id=$id order by date desc ";



$noresult=true;
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
   
    $sql3="SELECT userid FROM thread WHERE id=$id";
    $noresult=false;
    $result3=mysqli_query($conn,$sql3);
    $row3=mysqli_fetch_assoc($result3);
   
    $sql4="SELECT user_email FROM signup WHERE sno=$serial";
    $result3=mysqli_query($conn,$sql4);
    $row4=mysqli_fetch_assoc($result4);

    
    
   $comid= $row['commenby'];
    $sql2="SELECT user_email  FROM signup WHERE sno='$comid'";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);

    $noresult=false;
    $comment_title=$row['comment_content'];
    $comment_by=$row['commenby'];
    echo '<div class="media">
        <img class="mr-3 mb-3 my-3" src="img/user.png"  style="width:44px" alt="Generic placeholder image">
            <div class="media-body">
                 <strong>'.$row2['user_email'].'</strong>'."   ".$row['date'].'
                 <p> '.$comment_title.'</p>
            </div>
        </div>';
        
}

?>          
       

                    
    </div>
    <?php  if($noresult){
                        echo '<div class=" mt-3 jumbotron bg-light text-dark jumbotron-fluid">
                        <div class="container">
                          <p class="display-6">No Result Found <p>
                          <p class="lead">Be the First Person to Comment</p>
                        </div>
                      </div>';
                    }
         ?> 

    <?php include 'partials/_footer.php'?>
    <?php include 'partials/_login.php'?>
    <?php include 'partials/_signup.php'?>
</body>

</html>