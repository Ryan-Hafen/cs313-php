<?php include '../view/header.php'; ?>
<main>
    <h1>Add Note</h1>
    
    <form action="." method="post" class="form">
        <input type="hidden" name="action" value="add_note">

        <label>Volume:</label>
        <select name="volume_id">
        <?php foreach ($volumes as $volume) : ?>
            <option value="<?php echo $volume['volumeid']; ?>">
                <?php echo $volume['volumename']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        <label>Book:</label>
        <select name="book_id">
        <?php foreach ($books as $book) : ?>
            <option value="<?php echo $book['bookid']; ?>">
                <?php echo $book['bookname']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        <label>Chapter:</label>
        <select name="chapter_id">
        <?php foreach ($chapters as $chapter) : ?>
            <option value="<?php echo $chapter['chapter']; ?>">
                <?php echo $chapter['chapter']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        <label>Verse:</label>
        <select name="verse_id">
        <?php foreach ($verses as $verse) : ?>
            <option value="<?php echo $verse['verse']; ?>">
                <?php echo $verse['verse']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        
        <label>Note:</label>
        <textarea name="note_text" id="note_text" rows="4" cols="50"></textarea>
        <br>            

        <label>&nbsp;</label>
        <input type="submit" value="Add Note" />
        <br>
    </form>

</main>
<?php include '../view/footer.php'; ?>