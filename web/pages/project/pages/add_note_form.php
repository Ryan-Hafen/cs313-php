<?php include '../view/header.php'; ?>
<div class="container">
	<div class="row row-padding center">
		<div class="half card-4 margin padding-16">
			<h2 class="text-theme">Edit Note</h2>
        
			<form action="." method="post" class="form">
				<input type="hidden" name="action" value="edit_note">
   
				<div class="section">
					<label class="text-theme left">Volume:  </label>
					<select class="select" name="volume_id">
						<?php foreach ($volumes as $volume) : ?>
						<option value="<?php echo $volume['volumeid']; ?>" 
							<?php echo $volume['volumename']; ?>
						</option>
						<?php endforeach; ?>
					</select> 
				</div>
				<div class="section">
					<label class="text-theme left">Book:  </label>
					<select class="select" name="book_id">
						<?php foreach ($books as $book) : ?>
						<option value="<?php echo $book['bookid']; ?>" 
							<?php echo $book['bookname']; ?>
						</option>
					<?php endforeach; ?>
					</select> 
				</div>
				<div class="section">
					<label class="text-theme left">Chapter:  </label>
					<select class="select" name="chapter_id">
					<?php foreach ($chapters as $chapter) : ?>
						<option value="<?php echo $chapter['chapter']; ?>" 
							<?php echo $chapter['chapter']; ?>
						</option>
					<?php endforeach; ?>
					</select> 
				</div>
				<div class="section">
					<label class="text-theme left">Verse:  </label>
					<select class="select" name="verse_id">
					<?php foreach ($verses as $verse) : ?>
						<option value="<?php echo $verse['verse']; ?>" 
							<?php echo $verse['verse']; ?>
						</option>
					<?php endforeach; ?>
					</select> 
				</div>
				<div class="section">
					<label class="text-theme left">Note:</label>
					<textarea class="input" name="note_text" id="note_text" rows="4" cols="50"><?php echo $note['note']; ?></textarea><br><br>
				</div>
				<div class="section">
					<input class="button margin padding-16" type="submit" value="Save Changes"> 
				</div>
			</form>
		</div>
	</div>
</div>
<?php include '../view/footer.php'; ?>