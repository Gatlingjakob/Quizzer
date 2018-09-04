<?php include 'database.php'; ?>
<?php session_start(); ?>

<?php 
    // Set Question Number
    $number = (int) $_GET['n'];

    /*
     * Get Question
     */
    $query = "SELECT * FROM `questions`
                WHERE question_number = $number";

    // Get Result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);   
    $question = $result->fetch_assoc();

    //Get total questions
    $query = "SELECT * FROM `questions`";
    //Get result
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

    /*
     * Get Choices
     */
    $query = "SELECT * FROM `choices`
                WHERE question_number = $number";

    // Get Result
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

?>

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
            <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
                <p class="question"> 
                   <?php echo $question['text']; ?>
                </p>
                <form method="post" action="process.php">
                    <ul class="choices">
                        <?php while($row = $choices->fetch_assoc()): ?>
                            <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"/> <?php echo $row['text']; ?> </li>
                        <?php endwhile; ?>
                    </ul>
                    <input type="submit" value="Submit" />
                    <input type="hidden" name="number" value="<?php echo $number; ?>" />
                </form>
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; 2018, Jakse
        </div> 
    </footer>

 </body>
 </html>