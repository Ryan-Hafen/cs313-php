<?php 
require $_SERVER['DOCUMENT_ROOT'].'/pages/project/model/database.php';
// include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/header.php'; 

$current_page = htmlspecialchars($_SERVER["PHP_SELF"]);

$dbUrl = getenv('DATABASE_URL');

$filter_book = safe_post('book');

try {
	$books = $db->query('SELECT DISTINCT bookName 
						   FROM books 
						  ORDER BY bookName');
						  
    $params = [];
	
    $sql = 'SELECT n.id
	             , n.userId
				 , u.email
				 , n.scripturesId
				 , s.volumeID
				 , v.volumeName
				 , s.bookId
				 , b.bookName
				 , s.chapter
				 , s.verse
				 , n.note
	          FROM notes AS n
			  JOIN users AS u on n.userId = u.id
			  JOIN scriptures AS s ON n.scripturesId = s.id
			  JOIN volumes AS v ON s.volumeID = v.id
			  JOIN books AS b ON s.bookId = b.id';
			  
    if ($filter_book != '') {
      $sql .= ' WHERE b.bookName = :book';
      $params['book'] = $filter_book;
    }
    $sql .= ' ORDER BY s.bookId';
    $filtered_books = $db->prepare($sql);
    $filtered_books->execute($params);
  }
  catch (PDOException $ex) {
    print "<p>error: {$ex->getMessage()} </p>\n\n";
    die();
  }


?>
<main>

    
    <section>
		<form name="form_books" action="<?php echo $current_page; ?>" method="post">
			<select name="book">
				<option value="">All</option>
				<?php foreach($books as $row) {
					$book = $row['bookName'];
					$selected = ($book == $filter_book) ? ' selected' : '';
					echo "<option$selected>$book</option>";
					}
				?>
			</select>
			<input type="submit" value="Search" />
		</form>
				
		
        <table>
            <tr>
                <th>Volume</th>
                <th>Book</th>
                <th>Chapter</th>
                <th>Verse</th>
                <th>Email</th>
                <th>Note</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>


        </table> 
    </section>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/footer.php'; ?>