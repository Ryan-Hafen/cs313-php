<?php 
require $_SERVER['DOCUMENT_ROOT'].'/pages/project/model/database.php';
include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/header.php'; 

// Get all categories
$query = 'SELECT * 
            FROM books
           ORDER BY ID';
$statement = $db->prepare($query);
$statement->execute();
$books = $statement->fetchAll();
$statement->closeCursor();


?>
<main>

    
    <section>
        <?php foreach ($books as $book) : ?>
        <tr>    
            <td><?php echo $book['bookName']; ?></td>
            <td><form action="." method="post">
                    <input type="hidden" name="category_ID"
                        value="<?php echo $book['ID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </section>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'].'/pages/project/view/footer.php'; ?>