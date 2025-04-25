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

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script defer src="quiz.js"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

   <style>
    .begin-quiz{
        width:50%;
    }
    .begin-quiz h1{
        font-size:3rem;
    }
    .begin-quiz p{
        font-size:1.7rem;
    }

   .full {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    width:100%;
}

.hidden {
    display: none;
}

.error-msg {
    color: red;
    font-style: bold;
}

.correct-answer {
    background-color: #198754 !important;
    color: #f7f7f7 !important;
}

.question-heading {
    border-bottom: 1px black solid;
}

.display-answer {
    color: rgb(234, 96, 32);
    font-weight: bold;
}

.custom-label {
    display: block; /* Use block to ensure full width */
    padding: 15px; 
    width:50px;/* Set uniform padding */
    border: 2px solid #ccc; /* Border style */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Cursor on hover */
    margin: 5px 0; /* Space between options */
    text-align: center; /* Center text */
    width: 100%; /* Make the label take full width */
    box-sizing: border-box; /* Include padding in width calculation */
    transition: background-color 0.3s, border-color 0.3s; /* Transition effects */
    font-size:1.6rem;
}

.form-check-input {
    display: none; /* Hide the default radio button */
}

.form-check-input:checked + .custom-label {
    background-color: aliceblue; /* Background color when selected */
    color: var(--black); /* Text color when selected */
    border-color: #007bff; /* Border color when selected */
}

.form-check-input:not(:checked) + .custom-label:hover {
    background-color: #e0e0e0; /* Background color on hover */
}

.question-area p{
    font-size:1.8rem;
}

.question-area h5{
    font-size:1.5rem;
}





   </style>


</head>
<body>
 

<?php include 'components/user_header.php'; ?>
<div class="full">
<div class="begin-quiz text-center">
        <h1>Take a Quiz!</h1>
        <p class="lead">Press Begin To Start The Quiz!:</p>
        
        <button class="btn btn-primary begin-btn">Begin</button>
    </div>
    <div class="m-4 quiz-area hidden">
        <div class="question-area">
            <h5 class=" text-success mt-3 question-heading text-center">Question <span class="question-number"></span> of <span class="total-questions"></span></h5>
            <p class="question lead"></p>
        </div>
        <div class="option-area text-center">
    <div class="form-check">
        <input class="form-check-input btn-check" type="radio" id="option-1" name="options">
        <label class="form-check-label custom-label" for="option-1"></label>
    </div>
    <div class="form-check">
        <input class="form-check-input btn-check" type="radio" id="option-2" name="options">
        <label class="form-check-label custom-label" for="option-2"></label>
    </div>
    <div class="form-check">
        <input class="form-check-input btn-check" type="radio" id="option-3" name="options">
        <label class="form-check-label custom-label" for="option-3"></label>
    </div>
    <div class="form-check">
        <input class="form-check-input btn-check" type="radio" id="option-4" name="options">
        <label class="form-check-label custom-label" for="option-4"></label>
    </div>
    <div class="error-msg hidden">Please select an option</div>
    <div class="display-answer hidden"></div>
    <div class="buttons my-4">
        <button class="inline-btn btn-primary previous-btn">Previous</button>
        <button class="inline-btn btn-primary next-btn" style="padding:1rem 4.6rem">Next</button>
    </div>
</div>

    </div>
    <div class="end-area hidden text-center">
        <h1 class="total-score"></h1>
        <p class="total-score">End of Quiz!</p>
        <button class="restart-btn btn btn-primary" onclick="restart()">Try again!</button>
    </div>
</div>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="script.js"></script>

   
</body>
</html>