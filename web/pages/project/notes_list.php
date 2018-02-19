<?php 
require 'database.php';
include 'header.php'; 

$current_page = htmlspecialchars($_SERVER["PHP_SELF"]);

$book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);

// Get all books
$query = 'SELECT *
            FROM books
           ORDER BY id';
$statement = $db->prepare($query);
$statement->execute();
$books = $statement->fetchAll();
$statement->closeCursor();

if ($book_id != false) {
    $queryNotes = 'SELECT * 
                    FROM notes AS n
					JOIN users AS u ON n.userid = u.id
					JOIN scriptures AS s on n.scripturesid = s.id
					JOIN volumes AS v on s.volumeid = v.id
					JOIN books AS b on s.bookid = b.id
                   WHERE s.bookid = :book_id';
    $statement = $db->prepare($queryNotes);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $notes = $statement->fetchAll();
	$statement->closeCursor();
} else {
    // $queryNotes = 'SELECT * 
                    // FROM notes AS n
				    // JOIN users AS u ON n.userid = u.id
				    // JOIN scriptures AS s on n.scripturesid = s.id
				    // JOIN volumes AS v on s.volumeid = v.id
				    // JOIN books AS b on s.bookid = b.id';
    // $statement = $db->prepare($queryNotes);
    // $statement->execute();
    // $notes = $statement->fetchAll();
	// $statement->closeCursor();	
	$notes = get_notes();
}

?>


<main>
	<form name="form_books" action="<?php echo $current_page; ?>" method="post">
		<label>Book:</label>
		<select name="book_id">
			<option value="">All</option>
			<?php foreach ($books as $book) : ?>
				<option value="<?php echo $book['id']; ?>" 
					<?php if ($book['id'] == $book_id) { echo 'selected="selected"';}?>>
					<?php echo $book['bookname']; ?>
				</option>
			<?php endforeach; ?>
		</select>
		<input type="submit" value="Search" />
	</form>
    
	<p><a href="?action=add_note_form">Add Note</a></p> 
	
	<table>
		<tr>
            <th>Volume</th>
            <th>Book</th>
            <th>Chapter</th>
            <th>Verse</th>
            <th>Note</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
        </tr>
        <?php foreach ($notes as $note) : ?>
        <tr>
            <td><?php echo $note['volumename']; ?></td>
            <td><?php echo $note['bookname']; ?></td>
            <td><?php echo $note['chapter']; ?></td>
            <td><?php echo $note['verse']; ?></td>
            <td><?php echo $note['note']; ?></td>
                <td><form action="edit_note_form.php" method="post">
                    <input type="hidden" name="note_id"
                           value="<?php echo $note['id']; ?>">
                    <input type="hidden" name="book_id"
                           value="<?php echo $note['bookid']; ?>">
                    <input type="hidden" name="volume_id"
                           value="<?php echo $note['volumeid']; ?>">
                    <input type="hidden" name="chapter"
                           value="<?php echo $note['chapter']; ?>">
                    <input type="hidden" name="verse"
                           value="<?php echo $note['verse']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="<?php echo $current_page; ?>" method="post">
                    <input type="hidden" name="note_id"
                           value="<?php echo $note['id']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
        </tr>
        <?php endforeach; ?>
	</table>
</main>





<?php include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/footer.php'; ?>