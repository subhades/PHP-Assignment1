<!--
    Amanda Robinson 
    1181969
    PHP-A1
    Feb-15-2023
    This file needs to:-->
<!--In html: 
    - form which will link to the save-books.php which will be set to post
        - inside of this form I need 
            - label called book title 
                - it will be a text area 
            -label for author 
                - it will be a text area 
            - Label called page number
                - it will be a a type number, min will be 1 with no max 
            - label called book rating 
                - following for more information -->
<!--In the book rating I need to:-->
<!--in a php tag I need to 
    - Open the database and connect to mySQL database 
    - pull the SQL table called 
    - Pull the information needed 
    - use the cmd function to prepare the sql dattabase 
    - use the cmd function to execute the  query created to pull the sql table 
    - Then I am store the query in a variable and using the fetchall command 
    - then create a loop to display each option being pulled from the sql table.
    - Disconnmec from the database-->
<!--Save button -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ratings</title>
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/normalize.css" />
</head>
<body>
    <!--In html: 
   1) - form which will link to the save-books.php which will be set to post
        - inside of this form I need 
            1a)- label called book title 
                    - it will be a text area 
            1b)-label for author 
                    - it will be a text area 
            1c)- Label called page number
                    - it will be a a type number, min will be 1 with no max 
            1d)- label called book rating 
                    - following for more information -->
<!--1-->
    <form action="save-books.php" method="post">
        <!--1a)-->
        <fieldset>
            <label for="bookTitle">Book Title:</label>
            <textarea name="bookTitle" id="bookTitle" required></textarea>
        </fieldset>
        <!--1b)-->
        <fieldset>
            <label for="authorName">Author Name:</label>
            <textarea name="authorName" id="authorName" required></textarea>
        </fieldset>
        <!--1c)-->
        <fieldset>
            <label for="pageNum">Page Number:</label>
            <input name="pageNum" id="pageNum" type="number" required min="1">
        </fieldset>
        <!--1d)-->
        <fieldset>
            <label for="rateBookId">Book rating:</label>
            <select name="rateBookId" id="rateBook">
                <?php
               /*in a php tag I need to 
                2a) Open the database and connect to mySQL database 
                2b) pull the SQL table called rateBooks
                2c) use the cmd function to prepare the sql dattabase 
                2d) use the cmd function to execute the  query created to pull the sql table 
                2e) Then I am store the query in a variable and using the fetchall command 
                2f) then create a loop to display each option being pulled from the sql table.
                2g) Disconnmec from the database*/
                //2a)
                $db = new PDO('mysql:host=172.31.22.43; dbname=Amanda1181969', 'Amanda1181969', 'NDu-6gx0fw');
                //2b)
                $sql = "SELECT * FROM rateBooks";
                //2c)
                $cmd = $db->prepare($sql);
                //2d)
                $cmd->execute();
                //2e)
                $rateBooks = $cmd->fetchAll();
                //2f)
                foreach ($rateBooks as $value){
                        echo '<option value="'. $value['rateBookId'].
                            '">'. $value['rating']. '</option>';
                }
                //2g)
                $db = null;
                ?>
                </select>
            </fieldset>
        <button>Save</button>
    </form>
</body>
</html>