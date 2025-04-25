<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $errors = [];

   // Sanitize and validate the name
   $name = htmlspecialchars($_POST['name']);
   if(empty($name)) {
      $errors[] = 'Name cannot be empty!';
   } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
      $errors[] = 'Name must contain only letters and spaces!';
   }

   // Sanitize and validate the email
   $email = htmlspecialchars($_POST['email']);
   if(empty($email)) {
      $errors[] = 'Email cannot be empty!';
   } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Invalid email format!';
   }

   // Sanitize and validate the password
   $pass = $_POST['pass'];
   $cpass = $_POST['cpass'];
   function validatePassword($password) {
      // Regular expression to check password criteria
      $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?=.{8,})/';
      
      return preg_match($pattern, $password); // Return true if password is valid
  }
   if (empty($pass)) {
       $errors[] = 'Password cannot be empty!';
   } elseif (!validatePassword($pass)) {
       $errors[] = 'Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one special character!';
   } elseif ($pass !== $cpass) {
       $errors[] = 'Password and Confirm Password do not match!';
   }

  
//    $id = create_unique_id();
//    $name = $_POST['name'];
//    $name = filter_var($name, FILTER_SANITIZE_STRING);
//    $email = $_POST['email'];
//    $email = filter_var($email, FILTER_SANITIZE_STRING);
//    $pass = sha1($_POST['pass']);
//    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
//    $cpass = sha1($_POST['cpass']);
//    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

if(empty($errors)){
$id = create_unique_id();
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$pass = sha1($_POST['pass']);
$cpass = sha1($_POST['cpass']);

   $image = $_FILES['image']['name'];
//    $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = create_unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_files/'.$rename;

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email]);
   
   if($select_user->rowCount() > 0){
      $message[] = 'email already taken!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm passowrd not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, email, password, image) VALUES(?,?,?,?,?)");
         $insert_user->execute([$id, $name, $email, $cpass, $rename]);
         move_uploaded_file($image_tmp_name, $image_folder);
         
         $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
         $verify_user->execute([$email, $pass]);
         $row = $verify_user->fetch(PDO::FETCH_ASSOC);
         
         if($verify_user->rowCount() > 0){
            setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
            header('location:home.php');
         }
      }
   }
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

.error-message {
         text-align: center;
         color: var(--red);
         font-size: 1.8rem;
         margin-bottom: 1rem;
         background:var(--white);
      }
   </style>

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container">

  
   

   <form class="register" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
   <?php 
      // Display error messages
      if (!empty($errors)) {
         foreach ($errors as $error) {
            echo '<div class="error-message">'.$error.'</div>';
         }
      } 
      ?>
   
   <h3>create account</h3>
      <div class="flex">
         <div class="col">
            <p>your name <span>*</span></p>
            <input type="text" name="name" placeholder="enter your name" maxlength="50" required class="box">
            <p>your email <span>*</span></p>
            <input type="text" name="email" placeholder="enter your email" maxlength="50" required class="box">
         </div>
         <div class="col">
            <p>your password <span>*</span></p>
            <input type="text" name="pass" placeholder="enter your password" maxlength="50" required class="box">
            <p>confirm password <span>*</span></p>
            <input type="text" name="cpass" placeholder="confirm your password" maxlength="50" required class="box">
         </div>
      </div>
      <p>select pic <span>*</span></p>
      <input type="file" name="image" accept="image/*" required class="box">
      <p class="link">already have an account? <a href="login.php">login now</a></p>
      <input type="submit" name="submit" value="register now" class="btn">
   </form>

</section>












<?php include 'components/footer.php'; ?> 

<!-- custom js file link  -->
<script src="script.js"></script>

   
</body>
</html>