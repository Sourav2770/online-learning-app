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
   <title>playlist</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">



</head>
<body>

<?php include 'components/user_header.php'; ?>


    <!-- -----------about section ------------------------- -->
    <section class="about">
        <div class="row">
            <div class="image">
                    <img src="images/about-img.svg">
            </div>

            <div class="content">
                <h3>Why Choose Us?</h3>
                <p>Choose our online learning platform for its engaging content, expert instructors, flexible schedules, interactive features, and exceptional support. Achieve your goals effortlessly!</p>
                <a href="courses.php" class="inline-btn">Our courses</a>
            </div>
        </div>

        
    </section>


    <!-- -------ends-------------- -->



    <!-- review session -->

        <section class="reviews">

            <h1 class="heading">Student's Reviews</h1>

            <div class="box-container">

                <div class="box">
                    <p>"An excellent platform with engaging content and intuitive design. Ideal for learners of all levels. Highly recommended for growth!"</p>
                    <div class="user">
                        <img src="./images/pic-3.jpg" alt="">
                        <div>
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="box">
                    <p>"An excellent platform with engaging content and intuitive design. Ideal for learners of all levels. Highly recommended for growth!"</p>
                    <div class="user">
                        <img src="./images/pic-2.jpg" alt="">
                        <div>
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="box">
                    <p>"An excellent platform with engaging content and intuitive design. Ideal for learners of all levels. Highly recommended for growth!"</p>
                    <div class="user">
                        <img src="./images/pic-4.jpg" alt="">
                        <div>
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="box">
                    <p>"An excellent platform with engaging content and intuitive design. Ideal for learners of all levels. Highly recommended for growth!"</p>
                    <div class="user">
                        <img src="./images/pic-5.jpg" alt="">
                        <div>
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="box">
                    <p>"An excellent platform with engaging content and intuitive design. Ideal for learners of all levels. Highly recommended for growth!"</p>
                    <div class="user">
                        <img src="./images/pic-6.jpg" alt="">
                        <div>
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <p>"An excellent platform with engaging content and intuitive design. Ideal for learners of all levels. Highly recommended for growth!"</p>
                    <div class="user">
                        <img src="./images/pic-7.jpg" alt="">
                        <div>
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="box">
                    <p>"An excellent platform with engaging content and intuitive design. Ideal for learners of all levels. Highly recommended for growth!"</p>
                    <div class="user">
                        <img src="./images/pic-8.jpg" alt="">
                        <div>
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="box">
                    <p>"An excellent platform with engaging content and intuitive design. Ideal for learners of all levels. Highly recommended for growth!"</p>
                    <div class="user">
                        <img src="./images/pic-9.jpg" alt="">
                        <div>
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>








            </div>

        </section>

    <!-- ends it -->


    



<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="script.js"></script>
   
</body>
</html>