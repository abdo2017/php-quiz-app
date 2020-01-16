<?php

//initialize session if it hasn't already been
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function generateNewQuestionBank(){

  unset($_SESSION['question_bank']);
  $_SESSION["question_bank"] = [];
  $_SESSION["score"] = 0;

  // Loop for required number of questions
  for ($i=1; $i<=10; $i++){
    generateRandomQuestion($i);
  }

}

// Generate random questions
//q stands for question
//a stands for answer, where a1 is the correct one
function generateRandomQuestion($i){

  // Get random numbers to add
  $question1 = rand(10,90); // it's the number 1 actually
  $question2 = rand(10,90); // it's the number 2 actually

  // CALCULATE correct answer
  $answer1 = $question1 + $question2;
  $answer2 = generateWrongAnswer($answer1);

  // Make sure the two are unique answers
  do{
    $answer3 = generateWrongAnswer($answer1);
  } while ($answer2 == $answer3);

// Add question and answer to questions array
  $_SESSION["question_bank"][$i] = [
    "question" => "$question1 + $question2",
    "answers" => [$answer1,$answer2,$answer3]
  ];
}

// Get incorrect answers within 10 numbers either way of correct answer

function generateWrongAnswer($answer1){
  do{
    $deviation = rand(-10,10);
  } while ($deviation == 0);
 
  return $answer1 + $deviation;
}
