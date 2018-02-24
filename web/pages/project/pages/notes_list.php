<?php include '../view/header.php'; ?>
<main>

    
    <section>
        <br>
			<a href="index.php?action=add_note">Add Note</a>
        <br>	
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

            <?php foreach ($notes as $note) : ?>
            <tr>
                <td><?php echo $note['volumename']; ?></td>
                <td><?php echo $note['bookname']; ?></td>
                <td><?php echo $note['chapter']; ?></td>
                <td><?php echo $note['verse']; ?></td>
                <td><?php echo $note['email']; ?></td>
                <td><?php echo $note['note']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="edit_note_form">
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
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_note">
                    <input type="hidden" name="note_id"
                           value="<?php echo $note['id']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table> 
        <br>
    </section>
</main>
<?php include '../view/footer.php'; ?>