<?php
require '../model/database.php';
require '../model/notes_db.php';
require '../model/scriptures_db.php';
require '../model/users_db.php';

$action = filter_input(INPUT_POST, 'action');
$_SESSION["user_id"] = 0;

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'sign_in_form';
    }
}  
if ($action == 'sign_in_form'){
    include('sign_in_form.php');

 } 
else if ($action == 'sign_in'){
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
	
	$email_in_use = get_user_by_email($email);
	$password_check = get_password($email);
	
    if ($email == "" || $password == "") {
        $error = "All fields are required.";
		$page = 'sign_in_form.php';
        include('../errors/error.php');
    } 
	else if ($email_in_use == false) { 
        $error = "This email address has not been registered. ". $email;
        include('../errors/error.php');
	} 
	else if ($password != $password_check) { 
        $error = "Passwords do not match.";
        include('../errors/error.php');
	} 
	else { 
		$_SESSION["user_id"] = get_user_by_email($email);
		echo $_SESSION["user_id"];
		// $notes = get_notes($$_SESSION["user_id"]);
		// include('notes_list.php');
	} 

 } 
// else if ($action == 'register_form') {
    // include('register_form.php');

// } else if ($action == 'register_user') {
    // $first_name = filter_input(INPUT_POST, 'first_name', FILTER_VALIDATE_INT);
    // $last_name = filter_input(INPUT_POST, 'last_name', FILTER_VALIDATE_INT);
    // $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_INT);
    // $password = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_INT);
    // $password_match = filter_input(INPUT_POST, 'password_match', FILTER_VALIDATE_INT);
	
	// $email_in_use = get_user_by_email($email);
	
    // if ($first_name == "" || $last_name == "" || $email == "" || $password == "" || $password_match == "") {
        // $error = "All fields are required.";
        // include('../errors/error.php');
    // } else if ($email_in_use != false) { 
        // $error = "This email address has already been registered. ". $email;
        // include('../errors/error.php');
	// } else if ($password == $password_match) { 
        // $error = "Passwords do not match.";
        // include('../errors/error.php');
	// } else { 
        // add_user($note_id);
		// include('notes_list.php');
	// } 
// }
else if ($action == 'list_notes') {
	$notes = get_notes($_SESSION["user_id"]);
	include('notes_list.php');
}	
else if ($action == 'edit_note_form') {
    $note_id = filter_input(INPUT_POST, 'note_id', FILTER_VALIDATE_INT);
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
    $volume_id = filter_input(INPUT_POST, 'volume_id', FILTER_VALIDATE_INT);
    $chapter_id = filter_input(INPUT_POST, 'chapter', FILTER_VALIDATE_INT);
    $verse_id = filter_input(INPUT_POST, 'verse', FILTER_VALIDATE_INT);
    
    if ($note_id != false) {
        $note = get_note($note_id);
        $volumes = get_volume_list();
        $books = get_book_list();
        $chapters = get_chapter_list();
        $verses = get_verse_list();
        
        include('edit_note_form.php');
    }
} 
else if ($action == 'edit_note') {
    $note_id = filter_input(INPUT_POST, 'note_id', FILTER_VALIDATE_INT);
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
    $volume_id = filter_input(INPUT_POST, 'volume_id', FILTER_VALIDATE_INT);
    $chapter_id = filter_input(INPUT_POST, 'chapter_id', FILTER_VALIDATE_INT);
    $verse_id = filter_input(INPUT_POST, 'verse_id', FILTER_VALIDATE_INT);
    $note_text = filter_input(INPUT_POST, 'note_text');
    
    if ($note_id == false || $book_id == false || $chapter_id == false || $verse_id == false || $note_text == "") {
        $error = 'All fields are required. note_id = ' .$note_id;
        include('../errors/error.php');
    } else {
		$scriptures_id = get_scripture_id($book_id, $chapter_id, $verse_id);
		
        edit_note($note_id, $scriptures_id, $note_text);
		
		$notes = get_notes($_SESSION["user_id"]);
        header("Location: .?note_id=$note_id");
		include('notes_list.php');
    }
} 
else if ($action == 'delete_note') {
    $note_id = filter_input(INPUT_POST, 'note_id', FILTER_VALIDATE_INT);
    if ($note_id == false) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else { 
        delete_note($note_id);
        header("Location: .?note_id=$note_id");
        include('notes_list.php');
    }
} 
else if ($action == 'add_note_form') {
    $volumes = get_volume_list();
    $books = get_book_list();
    $chapters = get_chapter_list();
    $verses = get_verse_list();
    include('add_note_form.php');
} 
// else if ($action == 'add_note') {
    // $note_text = filter_input(INPUT_POST, 'note_text');
    // $book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
    // $chapter_id = filter_input(INPUT_POST, 'chapter_id', FILTER_VALIDATE_INT);
    // $verse_id = filter_input(INPUT_POST, 'verse_id', FILTER_VALIDATE_INT);
	
	
		
    // if ($book_id == false) {
        // $error = "Invalid product data. Check all fields and try again.";
        // include('../errors/error.php');
    // } else {
		// $scriptures_id = get_scripture_id($book_id, $chapter_id, $verse_id);
		
		// // echo $book_id;
		// // echo $chapter_id;
		// // echo $verse_id;
		// // echo $scriptures_id;
		// // echo $note_text;
		
        // add_note($note_text, $scriptures_id);
        // header("Location: .?note_id=$note_id");
        // include('notes_list.php');
    // }
// }
?>


