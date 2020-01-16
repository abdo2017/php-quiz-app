<?php
//initialize session if it hasn't already been
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//include quiz code
require_once "inc/quiz.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Math Quiz: Addition</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="container">
    <?php if ($questionNumber==11){?>
      <div class="congrats-box box">
        <h2>You got <?php echo $_SESSION["score"]; ?> out of 10!</h2>
        <h1><?php echo getFinalMessage($_SESSION["score"]); ?></h1>
        <form action="play.php" method="post">
          <input type="submit" class="btn" name="answer" value="Play Again!" />
        </form>
      </div>
    <?php } else {?>
      <div class="quiz-box box">
        <div class="toast <?php echo $toastColor ?>"><?php echo $toastMessage; ?></div>
        <p class="breadcrumbs">Question <?php echo $questionNumber ?> of 10</p>
        <p class="quiz">What is <?php echo $questionQuestion; ?>?</p>
        <form action="play.php" method="post">
          <input type="hidden" name="id" value="0" />
          <?php
          //display answers
          foreach($questionAnswers as $answer){ ?>
            <input type="submit" class="btn" name="answer" value="<?php echo $answer ?>" />
          <?php } ?>
        </form>
      </div>
    <?php } ?>
  </div>
</body>

</html>
