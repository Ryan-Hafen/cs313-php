<?php 
require $_SERVER['DOCUMENT_ROOT'].'/pages/project/model/database.php';
include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/header.php'; 

$current_page = htmlspecialchars($_SERVER["PHP_SELF"]);
$dbUrl = getenv('DATABASE_URL');
$filter_book = safe_post('book');
try {
	$books = $db->query('SELECT DISTINCT book FROM scriptures ORDER BY book');
    $params = [];
    $sql = 'SELECT id, book, chapter, verse, content FROM scriptures';
    if ($filter_book != '') {
      $sql .= ' WHERE book = :book';
      $params['book'] = $filter_book;
    }
    $sql .= ' ORDER BY book';
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
		<fieldset>
			<legend>Search</legend>
				<form name="form_books" action="<?php echo $current_page; ?>" method="post">
					<select name="book">
						<option value="">All</option>
							<?php foreach($books as $row) {
								$book = $row['book'];
								$selected = ($book == $filter_book) ? ' selected' : '';
								echo "<option$selected>$book</option>";
								}
							?>
					</select>
					<input type="submit" value="Search" />
				</form>
		</fieldset>     
		
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
<?php include '../view/footer.php'; ?>