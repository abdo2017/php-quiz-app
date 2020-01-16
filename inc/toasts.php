<?php

$correctToasts=[
  "That was correct, great job!",
  "Awesome work, that was right!",
  "Nice, you got that correct!"
];

$wrongToasts=[
  "Oh no! That was incorrect",
  "Rats! That wasn't quite right",
  "Oops! Wrong answer"
];

function getCorrectToast(){
  global $correctToasts;
  return $correctToasts[rand(0,2)];
}

function getWrongToast(){
  global $wrongToasts;
  return $wrongToasts[rand(0,2)];
}



?>
