<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>courses</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>







<!-- start here -->





<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-10">
                    <img src="images/contact1.png" alt="" style="width:50rem;height:40rem;">
            </div>

        
            <div class="col contact-form">
                <form action="" method="post" >
          
                    <h2>Contact Form</h2>
                    <input class="text" type="text"  placeholder="enter your name" class="box" required maxlength="100">
                    <br>
                    <input class="text" type="text" placeholder="enter your email" class="box" required maxlength="100">
                    <br>
                    <input class="text" type="text" placeholder="enter your mobile no." class="box" required maxlength="100">
                    <br>
                    <textarea class="text-area" name="comment_box" placeholder="write your comment...." maxlength="500" cols="10" rows="5"></textarea>
                    <br>
                    <input type="button" value="Send Message" name="submit" class="btn" style="width:97%">
                    <br>
                    
                </form>
            </div>
        </div>
    </div>

   
    </section>


    <section class="cards">
        <div class="container">
            <div class="row">
                <div class="col final1">
                    <i class="fa-solid fa-phone"></i>
        
                    <p class="p">phone number</p>
             
                    <p>8848892723</p>
                    <p>9656867998</p>
                </div>
    
                <div class="col final">
                    <i class="fa-solid fa-envelope"></i>
                
                    <p class="p">email address</p>
                    <p>souravshaji429@gmail.com</p>
                    <p>sourav@123</p>
                </div>
    
                <div class="col final">
                    <i class="fa-solid fa-location-dot"></i>
                    <p class="p">location</p>
                    <p>Lorem ipsum dolor maga cator</p>
                    <p>Lorem ipsum dolor maga anime ali</p>
                </div>
            </div>
        </div>
    
    </section>














<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="script.js"></script>
   
</body>
</html>