<!--Amanda Robinson 
    1181969
    PHP-A1
    Feb-15-2023
    save-book.php-->
<!--Retrieve the information gathered from book-info.php and out then in variables-->
<!--Verify that all information is valid inputs and return a <p> explaining what the problem is using if and else if statements-->
<!--using another if statement, if everything is valid
    3a) connect to the database 
    3b) create the insert SQL query
    3c) perpare and bind the parameter to the variables 
    3d) Run the above and execute
    3e) disconnect from the database 
    3f) Show that the book was saved -->
<!--Anchor a link to books.php to let the user see their books to date-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving book information...</title>
</head>
<body>
    <!--Retrieve the information gathered from book-info.php and out then in variables-->
    <?php
    $bookTitle = $_POST['bookTitle'];
    $authorName = $_POST['authorName'];
    $pageNum = $_POST['pageNum'];
    $rateBookId = $_POST['rateBookId'];
    //Verify that all information is valid inputs and return a <p> explaining what the problem is using if and else if statements
    $valid = true; 
    if (empty($bookTitle)) {
        echo '<p>Book title is required.</p>';
        $valid = false;
    }
    if (empty($authorName)) {
        echo '<p>Author name is required.</p>';
        $valid = false;
    }
    if (empty($pageNum)) {
        echo '<p>Page number is required.</p>';
        $valid = false;
    }
    else if (!is_numeric($pageNum)) {
        echo '<p>The page number must be entered using numbers.</p>';
        $valid = false;
    }
    if (empty($rateBookId)) {
        echo '<p>The books rating is required.</p>';
        $valid = false;
    }
    else if (!is_numeric($rateBookId)) {
        echo '<p>The books rating must be a numeric value.</p>';
        $valid = false;
    }
    /*using another if statement, if everything is valid
    3a) connect to the database 
    3b) create the insert SQL query
    3c) perpare and bind the parameter to the variables 
    3d) Run the above and execute
    3e) disconnect from the database 
    3f) Show that the book was saved*/
    if ($valid) {
        //3a)
        $db = new PDO('mysql:host=172.31.22.43; dbname=Amanda1181969','Amanda1181969', 'NDu-6gx0fw');

        //3b)
        $sql = "INSERT INTO books (bookTitle, authorName, pageNum, rateBookId) 
            VALUES (:bookTitle, :authorName, :pageNum, :rateBookId)";

        //3c)
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':bookTitle', $bookTitle, PDO::PARAM_STR, 255);
        $cmd->bindParam(':authorName', $authorName, PDO::PARAM_STR, 100);
        $cmd->bindParam(':pageNum', $pageNum, PDO::PARAM_INT);
        $cmd->bindParam(':rateBookId', $rateBookId, PDO::PARAM_INT);

        //3d)
        $cmd->execute();

        //3e)
        $db = null;

        //3f
        echo "Book Saved";
    }
    ?>
    <!--Anchor a link to books.php to let the user see their books to date-->
    <a href="books.php">Please click here to see your complete list of books</a>
</body>
</html>