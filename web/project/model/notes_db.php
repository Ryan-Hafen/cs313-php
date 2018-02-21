<?php
function get_notes() {
    global $db;
    $query ='SELECT n.id
			      , n.userid
			      , u.email
			      , n.scripturesid
			      , s.volumeid
			      , v.volumename
			      , s.bookid
			      , b.bookname
			      , s.chapter
			      , s.verse
			      , n.note
			   FROM notes AS n
			   JOIN users AS u ON n.userid = u.id
			   JOIN scriptures AS s on n.scripturesid = s.id
			   JOIN volumes AS v on s.volumeid = v.id
			   JOIN books AS b on s.bookid = b.id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function get_note($note_id) {
    global $db;
    $query = 'SELECT n.id
			      , n.userid
			      , u.email
			      , n.scripturesid
			      , s.volumeid
			      , v.volumename
			      , s.bookid
			      , b.bookname
			      , s.chapter
			      , s.verse
			      , n.note
			   FROM notes AS n
			   JOIN users AS u ON n.userid = u.id
			   JOIN scriptures AS s on n.scripturesid = s.id
			   JOIN volumes AS v on s.volumeid = v.id
			   JOIN books AS b on s.bookid = b.id
               WHERE n.id = :note_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":note_id", $note_id);
    $statement->execute();
    $note = $statement->fetch();
    $statement->closeCursor();
    return $note;
}

function get_volume_list() {
    global $db;
    $query = 'SELECT id as volumeid
	               , volumename
                FROM volumes';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_book_list() {
    global $db;
    $query = 'SELECT ID AS bookid
	               , bookname
                FROM books';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_chapter_list() {
    global $db;
    $query = 'SELECT distinct chapter
                FROM scriptures
				order by chapter';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_verse_list() {
    global $db;
    $query = 'SELECT distinct verse
                FROM scriptures
				order by verse';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_scripture_id($book_id, $chapter_id, $verse_id) {
    global $db;
    $query = 'SELECT s.id as scriptureID
                FROM scriptures as s
               WHERE s.bookID = :book_id
                 AND s.chapter = :chapter_id
                 AND s.verse = :verse_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":book_id", $book_id);
    $statement->bindValue(":chapter_id", $chapter_id);
    $statement->bindValue(":verse_id", $verse_id);
    $statement->execute();
    $scripture = $statement->fetch();
    $statement->closeCursor();
    $scripture_id = $scripture['scriptureID'];
    return $scripture_id; 
}


function delete_note($note_id) {
    global $db;
    $query = 'DELETE FROM notes
                WHERE ID = :note_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':note_id',$note_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_note($note_text, $book_id, $chapter_id, $verse_id, $email) {
    global $db;
    $query = 'INSERT INTO notes(note, scripturesid, usersid)
              VALUES(:note_text, (SELECT id 
                                    FROM scriptures 
                                   WHERE bookid = :book_id 
                                     AND chapter = :chapter_id 
                                     AND verse = :verse_id)
                    , (SELECT id 
                                    FROM users 
                                   WHERE email = :email))';
    $statement = $db->prepare($query);
    $statement->bindValue(':note_text', $note_text);
    $statement->bindValue(':book_id', $book_id);
    $statement->bindValue(':chapter_id', $chapter_id);
    $statement->bindValue(':verse_id', $verse_id);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}

function edit_note($note_id, $book_id, $chapter_id, $verse_id, $note_text) {
    global $db;
    $query = 'Update notes as n
                 Set n.note = :note_text
                   , n.scripturesid = (SELECT id 
                                         FROM scriptures 
                                        WHERE bookid = :book_id
                                          AND chapter = :chapter_id
                                          AND verse = :verse_id)
               WHERE n.id = :note_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':note_id', $note_id);
    $statement->bindValue(':book_id', $book_id);
    $statement->bindValue(':chapter_id', $chapter_id);
    $statement->bindValue(':verse_id', $verse_id);
    $statement->bindValue(':note_text', $note_text);
    $statement->execute();
    $statement->closeCursor();
}
?>