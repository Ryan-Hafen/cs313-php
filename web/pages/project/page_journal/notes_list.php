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
		<form name="form_books" action="<?php echo $current_page; ?>" method="post">
		<select name="book">
			<option value="">All</option>
			<?php foreach($books as $book) {
				echo "<option>$book</option>";
			}
			?>
		</select>
      <input type="submit" value="Search" />
    </form>
	</section>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/footer.php'; ?>