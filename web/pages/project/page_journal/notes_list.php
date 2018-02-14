<?php 
require $_SERVER['DOCUMENT_ROOT'].'/pages/project/model/database.php';
include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/header.php'; 

// Get all categories
$query = 'SELECT *
            FROM books
           ORDER BY id';
$statement = $db->prepare($query);
$statement->execute();
$books = $statement->fetchAll();
$statement->closeCursor();


?>
<main>

	<label>Book:</label>
    <select name="book_id">
		<?php foreach ($books as $book) : ?>
			<option value="<?php echo $book['id']; ?>" >
				<?php echo $book['bookname']; ?>
			</option>
        <?php endforeach; ?>
    </select><br>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/footer.php'; ?>