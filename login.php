<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
   $pass = sha1($_POST['pass']);
   $pass = htmlspecialchars($pass, ENT_QUOTES, 'UTF-8');

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   
   if($select_user->rowCount() > 0){
     setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
     header('location:home.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

   <style>
    
.form-container{
   display: flex;
   align-items: center;
   justify-content: center;
   min-height:80vh;
}

.form-container form{
   background-color: var(--white);
   border-radius: .5rem;
   padding: 2rem;
}

.form-container .login{
   width: 50rem;
}

.form-container .register{
   width: 80rem;
}

.form-container form h3{
   text-align: center;
   font-size: 2.5rem;
   margin-bottom: 1rem;
   color: var(--black);
   text-transform: capitalize;
}

.form-container form p{
   padding-top: 1rem;
   font-size: 1.7rem;
   color: var(--light-color);
}

.form-container form p span{
   color: var(--red);
}

.form-container .link{
   padding-bottom: 1rem;
   text-align: center;
   font-size: 2rem;
}

.form-container .link a{
   color: var(--main-color);
}

.form-container .link a:hover{
   color: var(--black);
   text-decoration: underline;
}

.form-container form .box{
   width: 100%;
   border-radius: .5rem;
   margin: 1rem 0;
   font-size: 1.8rem;
   color: var(--black);
   padding: 1.4rem;
   background-color: var(--light-bg);
}

.form-container .flex{
   display: flex;
   gap: 2rem;
}

.form-container .flex .col{
   flex: 1 1 25rem;
}


   </style>

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data" class="login">
      <h3>welcome back!</h3>
      <p>your email <span>*</span></p>
      <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
      <p>your password <span>*</span></p>
      <input type="password" name="pass" placeholder="enter your password" maxlength="20" required class="box">
      <p class="link">don't have an account? <a href="register.php">register now</a></p>
      <input type="submit" name="submit" value="login now" class="btn">
   </form>

</section>


<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="script.js"></script>
   
</body>
</html>
