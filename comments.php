<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
}

if(isset($_POST['delete_comment'])){

   $delete_id = $_POST['comment_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ?");
   $verify_comment->execute([$delete_id]);

   if($verify_comment->rowCount() > 0){
      $delete_comment = $conn->prepare("DELETE FROM `comments` WHERE id = ?");
      $delete_comment->execute([$delete_id]);
      $message[] = 'comment deleted successfully!';
   }else{
      $message[] = 'comment already deleted!';
   }

}

if(isset($_POST['update_now'])){

   $update_id = $_POST['update_id'];
   $update_id = htmlspecialchars($update_id, ENT_QUOTES, 'UTF-8');

   $update_box = $_POST['update_box'];
   $update_box= htmlspecialchars($update_box, ENT_QUOTES, 'UTF-8');


   $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ? AND comment = ? ORDER BY date DESC");
   $verify_comment->execute([$update_id, $update_box]);

   if($verify_comment->rowCount() > 0){
      $message[] = 'comment already added!';
   }else{
      $update_comment = $conn->prepare("UPDATE `comments` SET comment = ? WHERE id = ?");
      $update_comment->execute([$update_box, $update_id]);
      $message[] = 'comment edited successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user comments</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

   <style>
    
.comments .show-comments{
   background-color: var(--white);
   border-radius: .5rem;
   padding: 2rem;
   display: grid;
   gap: 2.5rem;
}

.comments .show-comments .user{
   display: flex;
   align-items: center;
   gap: 1.5rem;
   margin-bottom: 2rem;
}

.comments .show-comments .user img{
   height: 5rem;
   width: 5rem;
   border-radius: 50%;
   object-fit: cover;
}

.comments .show-comments .user h3{
   font-size: 2rem;
   color: var(--black);
   margin-bottom: .2rem;
}

.comments .show-comments .user span{
   color: var(--light-color);
   font-size: 1.5rem;
}

.comments .show-comments .content{
   margin-bottom: 2rem;
}

.comments .show-comments .content p{
   font-size: 2rem;
   color: var(--black);
   padding: 0 1rem;
   display: inline-block;
}

.comments .show-comments .content span{
   font-size: 1.7rem;
   color: var(--light-color);
}

.comments .show-comments .content a{
   color: var(--main-color);
   font-size: 1.8rem;
}

.comments .show-comments .content a:hover{
   text-decoration: underline;
}

.comments .show-comments .text{
   border-radius: .5rem;
   background-color: var(--light-bg);
   padding: 1rem 1.5rem;
   color: var(--black);
   margin: .5rem 0;
   position: relative;
   z-index: 0;
   white-space: pre-line;
   font-size: 1.8rem;
}

.comments .show-comments .text::before{
   content: '';
   position: absolute;
   top: -1rem; left: 1.5rem;
   height: 1.2rem;
   width: 2rem;
   background-color: var(--light-bg);
   clip-path: polygon(50% 0%, 0% 100%, 100% 100%); 
}

.edit-comment form{
   background-color: var(--white);
   border-radius: .5rem;
   padding: 2rem;
}

.edit-comment form .box{
   width: 100%;
   border-radius: .5rem;
   padding: 1.4rem;
   font-size: 1.8rem;
   color: var(--black);
   background-color: var(--light-bg);
   resize: none;
   height: 20rem;
}

.edit-comment form .flex{
   display: flex;
   gap: 1.5rem;
   justify-content: space-between;
   margin-top: .5rem;
}


   </style>

</head>
<body>

<?php include 'components/user_header.php'; ?>

<?php
   if(isset($_POST['edit_comment'])){
      $edit_id = $_POST['comment_id'];
      $edit_id= htmlspecialchars($edit_id, ENT_QUOTES, 'UTF-8');

      $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ? LIMIT 1");
      $verify_comment->execute([$edit_id]);
      if($verify_comment->rowCount() > 0){
         $fetch_edit_comment = $verify_comment->fetch(PDO::FETCH_ASSOC);
?>
<section class="edit-comment">
   <h1 class="heading">edti comment</h1>
   <form action="" method="post">
      <input type="hidden" name="update_id" value="<?= $fetch_edit_comment['id']; ?>">
      <textarea name="update_box" class="box" maxlength="1000" required placeholder="please enter your comment" cols="30" rows="10"><?= $fetch_edit_comment['comment']; ?></textarea>
      <div class="flex">
         <a href="comments.php" class="inline-option-btn">cancel edit</a>
         <input type="submit" value="update now" name="update_now" class="inline-btn">
      </div>
   </form>
</section>
<?php
   }else{
      $message[] = 'comment was not found!';
   }
}
?>

<section class="comments">

   <h1 class="heading">your comments</h1>

   
   <div class="show-comments">
      <?php
         $select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
         $select_comments->execute([$user_id]);
         if($select_comments->rowCount() > 0){
            while($fetch_comment = $select_comments->fetch(PDO::FETCH_ASSOC)){
               $select_content = $conn->prepare("SELECT * FROM `content` WHERE id = ?");
               $select_content->execute([$fetch_comment['content_id']]);
               $fetch_content = $select_content->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="box" style="<?php if($fetch_comment['user_id'] == $user_id){echo 'order:-1;';} ?>">
         <div class="content"><span><?= $fetch_comment['date']; ?></span><p> - <?= $fetch_content['title']; ?> - </p><a href="watch_video.php?get_id=<?= $fetch_content['id']; ?>">view content</a></div>
         <p class="text"><?= $fetch_comment['comment']; ?></p>
         <?php
            if($fetch_comment['user_id'] == $user_id){ 
         ?>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="comment_id" value="<?= $fetch_comment['id']; ?>">
            <button type="submit" name="edit_comment" class="inline-option-btn">edit comment</button>
            <button type="submit" name="delete_comment" class="inline-delete-btn" onclick="return confirm('delete this comment?');">delete comment</button>
         </form>
         <?php
         }
         ?>
      </div>
      <?php
       }
      }else{
         echo '<p class="empty">no comments added yet!</p>';
      }
      ?>
      </div>
   
</section>

<!-- comments section ends -->










<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="script.js"></script>
   
</body>
</html>