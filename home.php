<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
    $user_id= $_COOKIE['user_id'];

}else{
    $user_id='';
}


$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- header -->
 <?php include 'components/user_header.php'; ?>
<!-- end  -->

    <!-- home page -->

    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-12 col-lg-6 col-md-10">
            <img src="./images/girl.png" class="d-block mx-lg-auto img-fluid " style="border-radius: 10px;" alt="Bootstrap Themes" width="450" height="150" loading="lazy">
          </div>
          <div class="col-lg-6">
            <h1 id="mytext" class="display-5 fw-bold lh-1 mb-3">Welcome to EduMate - Path to Smarter Learning</h1>
            <p id="mytext1" class="lead"><B>EDUMATE</B> is an AI-powered online learning platform designed to simplify education. With personalized learning paths, real-time doubt clearing, interactive discussion forums, and daily quizzes, it offers a user-friendly and engaging experience. Its responsive design ensures seamless access on all devices, empowering learners to achieve their goals anytime, anywhere.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
              <button type="button" onclick="location.href='courses.php';" id="my-btn" class="btn btn-primary btn-lg px-4 me-md-2">Explore Course</button>
              <button type="button" onclick="location.href='courses.php';" id="my-btn2" class="btn btn-outline-secondary btn-lg px-4">Start learning <i class="fa-solid fa-arrow-right"> </i></button>
            </div>
          </div>
        </div>
      </div>


    <!-- ends here -->

         <!-- quick select section -->

         <section class="quick-select">
            <h1 class="heading">Quick Options</h1>

            <div class="box-container">

<?php
   if($user_id != ''){
?>
<div class="box">
   <h3 class="title">likes and comments</h3>
   <p>total likes : <span><?= $total_likes; ?></span></p>
   <a href="likes.php" class="inline-btn">view likes</a>
   <p>total comments : <span><?= $total_comments; ?></span></p>
   <a href="comments.php" class="inline-btn">comments</a>
   <p>suscribed courses : <span><?= $total_bookmarked; ?></span></p>
   <a href="bookmark.php" class="inline-btn">Joined Courses</a>
</div>
<?php
   }else{ 
?>
                 <div class="box">
                    <h3 class="title">Likes and Comments</h3>
                    <p>total likes : <span>0</span></p>
                    <a id="view" href="#" class="inline-btn">view likes</a>

                    <p>total comments : <span>0</span></p>
                    <a   style="font-size: 17px;" href="#" class="inline-btn">view comments</a>
                    
                    <p>saved playlist : <span>0</span></p>
                    <a style="font-size: 17px;"  href="#" class="inline-btn">view playlists</a>
                </div>
<?php
}
?>








                
                <div class="box">
                    <h3 class="title">Top Categories</h3>
                    <div class="flex">
                     <a href="#"><i class="fas fa-code"></i><span>developement</span></a>

                     <a href="#"><i class="fas fa-chart-simple"></i><span>business</span></a>

                     <a href="#"><i class="fas fa-pen"></i><span>design</span></a>

                     <a href="#"><i class="fa-solid fa-music"></i><span>music</span></a>

                     <a href="#"><i class="fas fa-camera"></i><span>photography</span></a>

                     <a href="#"><i class="fas fa-cog"></i><span>softwares</span></a>

                     <a href="#"><i class="fas fa-vial"></i><span>science</span></a>

   
                    </div>
                </div>





                <div class="box">
                    <h3 class="title">Popular Courses</h3>
                    <div class="flex">
                     <a href="#"><i class="fab fa-html5"></i><span>HTML</span></a>
                     <a href="#"><i class="fab fa-css3"></i><span> CSS</span></a>
                     <a href="#"><i class="fab fa-js"></i><span>Javascript</span></a>
                     <a href="#"><i class="fab fa-react"></i><span>React</span></a>
                     <a href="#"><i class="fab fa-angular"></i><span>Angular</span></a>
                     <a href="#"><i class="fab fa-php"></i><span>PHP</span></a>
                     <a href="#"><i class="fa-brands fa-java"></i><span>Java</span></a>
                     <a href="#"><i class="fa-brands fa-python"></i><span>Python</span></a>
                     <a href="#"><i class="fa-brands fa-linux"></i><span>Linux</span></a>
                     <a href="#"><i class="fa-brands fa-node"></i><span>Nodejs</span></a>


                   
   
                    </div>
                </div>



                <div class="box">
                <div class="box-tutor">
                    <h3 class="title">Become a teacher</h3>
                    <p>Join our online platform today and become an inspiring teacher.Share your knowledge,connect with students worldwide,and make a meaningfull impact on their educational journey.Start teaching today!</p>
                    <a href="admin/tutor_register.php" class="inline-btn">Get started</a>
                </div>
            </div>


            </div>



        </section>



        <!-- courses section starts  -->

<section class="courses">

<h1 class="heading">latest courses</h1>

<div class="box-container">

   <?php
      $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? ORDER BY date DESC LIMIT 6");
      $select_courses->execute(['active']);
      if($select_courses->rowCount() > 0){
         while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
            $course_id = $fetch_course['id'];

            $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
            $select_tutor->execute([$fetch_course['tutor_id']]);
            $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
   ?>
   <div class="box">
      <div class="tutor">
         <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
         <div>
            <h3><?= $fetch_tutor['name']; ?></h3>
            <span><?= $fetch_course['date']; ?></span>
         </div>
      </div>
      <img src="uploaded_files/<?= $fetch_course['thumb']; ?>" class="thumb" alt="">
      <h3 class="title"><?= $fetch_course['title']; ?></h3>
      <a href="playlist.php?get_id=<?= $course_id; ?>" class="inline-btn">view playlist</a>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">no courses added yet!</p>';
   }
   ?>

</div>

<div class="more-btn">
   <a href="courses.php" class="inline-option-btn">view more</a>
</div>

</section>

<!-- courses section ends -->


<!-- footer -->
<?php include 'components/footer.php'; ?>
<!-- end  -->

 <script src="script.js"></script>   
</body>
</html>