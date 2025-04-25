
<!-- original -->
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mentor AI Chatbot</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="bot.css">
  <style>


  </style>
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Mentor AI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ms-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="home.php">Home</a>
          <a class="dropdown-item" href="courses.php">Course</a>
          <a class="dropdown-item" href="about.php">About</a>
          <a class="dropdown-item" href="contact.php">contact</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</div>





  <header class="header">
    <h1 class="title">Welcome to Mentor AI</h1>
    <p class="subtitle">Your Ai Chat Assistant!</p>

    <ul class="suggestion-list list-inline" style="margin-bottom:6rem">
      <li class="suggestion list-inline-item">
        <h4 class="text">Can you help me find the latest news on data science?</h4>
        <span class="icon material-symbols-rounded">draw</span>
      </li>
      <li class="suggestion list-inline-item">
        <h4 class="text">What are the best tips to improve my public speaking skills?</h4>
        <span class="icon material-symbols-rounded">lightbulb</span>
      </li>
      <li class="suggestion list-inline-item">
        <h4 class="text">Can you help me find the latest news on web development?</h4>
        <span class="icon material-symbols-rounded">explore</span>
      </li>
      <li class="suggestion list-inline-item">
        <h4 class="text">Write JavaScript code to sum all elements in an array.</h4>
        <span class="icon material-symbols-rounded">code</span>
      </li>
    </ul>
  </header>

  <div class="chat-list">
    <!-- Example messages for testing -->
    
    <!-- <div class="message outgoing">
      <p>user inputs</p>
    </div>
    <div class="message incoming" style="margin-bottom: 1rem;;">
      <p>Chatbot response here</p>
    </div> -->
  </div>

  <div class="typing-area">
    <form action="#" class="typing-form d-flex align-items-center">
      <input type="text" placeholder="Enter a prompt here" class="typing-input form-control" required />
      <span id="delete-chat-button" class="icon material-symbols-rounded">delete</span>
      <button id="send-message-button" class="icon material-symbols-rounded btn btn-primary"><i class="fa-solid fa-arrow-right"></i></button>

    </form>
   
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="bot_script.js"></script>
</body>
</html>





