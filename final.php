<?php session_start(); ?>
<?php session_destroy(); ?>
<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8" />
     <title>PHP Quizzer</title>
     <link rel="stylesheet" type="text/css" href="css/style.css" />
 </head>
 <body>
    <header> 
        <div class="container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>

    <main>
        <div class="container"> 
          <h2>You're Done!</h2>  
          <p>Congratulations, you have completed the test!</p>
          <p>Final Score: <?php echo $_SESSION['score']; ?></p>
          <a href="question.php?n=1" class="start">Redo Quiz</a>
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; 2018, Jakse
        </div> 
    </footer>

 </body>
 </html>