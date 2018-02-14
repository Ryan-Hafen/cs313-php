<?php 
require $_SERVER['DOCUMENT_ROOT'].'/pages/project/model/database.php';
include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/header.php'; 

// Get all categories
$query = 'SELECT bookname
            FROM books
           ORDER BY ID';
$statement = $db->prepare($query);
$statement->execute();
$books = $statement->fetchAll();
$statement->closeCursor();


?>
<main>

    
    <section>
    <table>
        <tr>
            <th>Name</th>
        </tr>
        
        <?php foreach ($books as $book) : ?>
        <tr>    
            <td><?php echo $book['bookname']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    </section>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/footer.php'; ?>