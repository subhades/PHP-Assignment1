<!--Amanda Robinson 
    1181969
    PHP-A1
    Feb-15-2023
    This file needs to:-->
<!--display the information we created in the book info and saved to the sql database in the save-books-->
<!--1a)Connect to database 
    1b)Combine both of the table from the SQL database
    1c)execute the query from 1b)
    1e)fet all of the data from the table finished-->
<!--Once I have all the information, I need to:-->
<!--2a)create the html table using php echo 
    2b)Assign the proper values to correct collumns and display them -->
<!--3 disconnect the database-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Book details and rating</title>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/app.css"/> 
    <!-- https://www.kryogenix.org/code/browser/sorttable/ for column sortio -->
    <script src="js/sorttable.js" defer></script>
</head>
<body>
    <main>
        <h1>Book details and rating</h1>
        <?php
        //1a)
        $db = new PDO('mysql:host=172.31.22.43; dbname=Amanda1181969','Amanda1181969', 'NDu-6gx0fw');
        //1b)
        $sql = "SELECT * FROM books INNER JOIN rateBooks ON books.rateBookId = rateBooks.rateBookId";
        //1c)
        $cmd = $db->prepare($sql);
        //1d)
        $cmd->execute();
        //1e)
        $books = $cmd->fetchAll();
        //2a)
        echo '<table class="sortable">
                    <thead>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Page Number</th>
                        <th>Rating</th>
                    </thead>';
        //2b)
        foreach ($books as $books) {
            echo '<tr>
                    <td>' . $books['bookTitle'] . '</td>
                    <td>' . $books['authorName'] . '</td>
                    <td>' . $books['pageNum'] . '</td>
                    <td>' . $books['rating'] . '</td>
                </tr>';
        }
        echo '</table>';
        //3
        $db = null;
        ?>
        <a class="button-add" href="book-info.php">Add New!</a>
</main>

</body>
</html>