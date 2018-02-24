<!DOCTYPE html>
<html lang="en-us">

<head>
	<title>HOME | My Scripture Journal</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/head.php';?>
</head>

<body>
<!-- Header -->
	<?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php';?>
	
<!-- Nav -->
	<?php include $_SERVER['DOCUMENT_ROOT'].'/modules/navigation.php';?>
	
<!-- Modal About-->
	<?php include $_SERVER['DOCUMENT_ROOT'].'/modules/modal_about.php';?>


<!-- Modal Contact-->
	<?php include $_SERVER['DOCUMENT_ROOT'].'/modules/modal_contact.php';?>


<!-- Main -->
<main>
    <section>
		<a href="index.php?action=add_note" class="button circle large theme">
			<i class="fa fa-plus">
		</a>
		<div class="responsive card-4">
			<table class="table striped bordered">
				<thead>
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
				</thead>
				<tbody>
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
				</tbody>
			</table> 
		</div>
    </section>
</main>


<!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer.php';?>

</body>

</html>