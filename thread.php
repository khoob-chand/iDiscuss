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
$id=$_GET['catid'];
$sql="SELECT * FROM forum WHERE category_id=$id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $title=$row['category_name'];
    $desc=$row['category_desc'];
}

?>



    <div class="container">
        <div class="mt-4 p-5 bg-secondary container mb-2 text-light rounded">
            <h1 class="display-4">Hello, welcome to the
                <?php echo $title?> Forom
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
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
        <h2 class="my-2">Start A Discussion </h2>
        <?php
        if(isset($_SESSION['useremail']) && $_SESSION['loggedin'] == true){
            echo ' <form class="container" action="'.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input type="text" name="problem_title" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">please write title and description short and sweet.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">problem Description</label>
                <input type="text" name="problem_desc" class="form-control" id="exampleInputPassword1">
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>';

        }
        else{
            echo'<div class="container ">
            <p><a href="#" class="text-primary"  data-toggle="modal" data-target="#loginmodal"> Kindly login to Post Question</a> </p></div>';
        }
       
        ?>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
   $form_title=$_POST['problem_title'];
   $form_desc=$_POST['problem_desc'];
   $email=$_SESSION['useremail'];
   $sno=$_POST['sno'];
   
   $sql = "INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `userid`, `date`) VALUES ('$id', '$form_title', '$form_desc', '$sno', current_timestamp());";
   $result=mysqli_query($conn,$sql);
}?>
        <div class="media my-3 container">

            <div class="media-body ">
         
                <?php 
                    $id=$_GET['catid'];
                   
                    
                    $noresult=true;
                    $sql="SELECT *FROM thread WHERE thread_id=$id order by date desc";
                    
                    $result=mysqli_query($conn,$sql);
                   
                 
                    
                    while($row=mysqli_fetch_assoc($result)){
                        $thread_user_id=$row['userid'];
                        $sql2 = "SELECT user_email FROM `signup` WHERE sno='$thread_user_id' ";
                     
                        
                        $result2=mysqli_query($conn,$sql2);
                       
                        $row2=mysqli_fetch_assoc($result2);
                    
                        
                       
                        
                        $noresult=false;
                        $thread_title=$row['thread_title'];
                        $thread_desc=$row['thread_desc'];
                        echo '<img class="mr-3 mb-2" src="img/user.png"  style="width:44px" alt="Generic placeholder image">
                        <br><small><strong> Asked by :  '.$row2['user_email']."     ".' At '.$row['date'].' </strong></small>
                        <h5 class="mt-2"><a href="threadlist.php?listid='.$row['id'].'">'.$thread_title.'</a></h5>
                        '.$thread_desc.'<hr><br>';
                        
        
                    }
                    if($noresult){
                        echo '<div class="jumbotron bg-light text-dark jumbotron-fluid">
                        <div class="container">
                          <p class="display-6">No Result Found <p>
                          <p class="lead">Be the First Person to ask the Question </p>
                        </div>
                      </div>';
                    }
                 
                 

                    
                    
                
                    
         
        ?>
            </div>
                </div>
                </div>  

            <?php include 'partials/_footer.php'?>
            <?php include 'partials/_login.php'?>
            <?php include 'partials/_signup.php'?>
</body>

</html>