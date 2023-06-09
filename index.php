<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss</title>
    <link rel="stylesheet" href="partials/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


</head>

<body>
    <?php include 'partials/_header.php'?>
   

    <?php if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
        echo '<div class="alert alert-success" role="alert">
        Sign up Successfully ! you can  login in now 
      </div>';
    }?>
    

    <?php include 'partials/_carousel.php'?>
    <div class="container ">
        <h2 class="text-center my-3 mb-3">Welcome To iDiscuss Forum!</h2>
        <div class="row">

        <?php 
        include 'partials/_dbconnect.php';
       $sql= "SELECT *FROM forum ORDER BY date ASC";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo ' <div class="col-md-4">
            <div class="card mb-3">
                <img src="https://source.unsplash.com/random/500x300?coding,'.$row['category_name'].'" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a href="thread.php?catid='.$row['category_id'].'">'.$row['category_name'].'<a></h5>
                    <p class="card-text">'.substr($row['category_desc'],0,100).'  ....
                      </p>
                    <a href="thread.php?catid='.$row['category_id'].'" class="btn btn-primary">Visit Threads</a>
                </div>
            </div>

        </div>';

        }
        ?>
            
           
    
        </div>

    </div>

   
    <?php include 'partials/_footer.php'?>
    <?php include 'partials/_login.php'?>
    <?php include 'partials/_signup.php'?>
</body>

</html>