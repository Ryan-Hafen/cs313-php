<?php include '../view/header.php'; ?>
<main>
        <h1>Edit Note</h1>
        
        <form action="." method="post" class="form">
        <input type="hidden" name="action" value="edit_note">
        
            <label>Volume:  </label>
            <select name="volume_id">
            <?php foreach ($volumes as $volume) : ?>
                <option value="<?php echo $volume['volumeid']; ?>" 
                    <?php if ($volume['volumeid'] == $volume_id) { echo 'selected="selected"';}?>>
                    <?php echo $volume['volumename']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
                
            <label>Book:  </label>
            <select name="book_id">
            <?php foreach ($books as $book) : ?>
                <option value="<?php echo $book['bookid']; ?>" 
                    <?php if ($book['bookid'] == $book_id) { echo 'selected="selected"';}?>>
                    <?php echo $book['bookname']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
                
            <label>Chapter:  </label>
            <select name="chapter_id">
            <?php foreach ($chapters as $chapter) : ?>
                <option value="<?php echo $chapter['chapter']; ?>" 
                    <?php if ($chapter['chapter'] == $chapter_id) { echo 'selected="selected"';}?>>
                    <?php echo $chapter['chapter']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
                
            <label>Verse:  </label>
            <select name="verse_id">
            <?php foreach ($verses as $verse) : ?>
                <option value="<?php echo $verse['verse']; ?>" 
                    <?php if ($verse['verse'] == $verse_id) { echo 'selected="selected"';}?>>
                    <?php echo $verse['verse']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            
            <label>Note:</label>
            <textarea name="note_text" id="note_text" rows="4" cols="50"><?php echo $note['note']; ?></textarea><br><br>
            
			<input type="hidden" name="note_id" value="<?php echo $note_id; ?>">
			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="submit" value="Save Changes"><br>
        </form>
    </main>
<?php include '../view/footer.php'; ?>