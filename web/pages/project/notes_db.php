<?php
function get_notes() {
    global $db;
    $query = 'SELECT n.id
	               , n.note AS noteText
				   , n.scripturesid
				   , s.chapter
				   , s.verse
                   , s.bookid
				   , b.bookname
				   , s.volumeid
				   , b.volumename
                   , u.email
                FROM notes as n 
                JOIN users as u on n.userid = u.id 
                JOIN scriptures as s on n.scripturesid = s.id 
                JOIN books as b on s.bookid = b.id 
                JOIN volumes as v on s.volumeid = v.id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_note($note_id) {
    global $db;
    $query = 'SELECT n.id
	               , n.note AS noteText
				   , n.scripturesid
				   , s.chapter
				   , s.verse
                   , s.bookid
				   , b.bookname
				   , s.volumeid
				   , b.volumename
                   , u.email
                FROM notes as n 
                JOIN users as u on n.userid = u.id 
                JOIN scriptures as s on n.scripturesid = s.id 
                JOIN books as b on s.bookid = b.id 
                JOIN volumes as v on s.volumeid = v.id
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
    $query = 'SELECT id as volumeid, volumename
                FROM volumes';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_book_list() {
    global $db;
    $query = 'SELECT ID AS bookid, bookname
                FROM books';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_chapter_list() {
    global $db;
    $query = 'SELECT distinct chapter
                FROM scriptures';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_verse_list() {
    global $db;
    $query = 'SELECT Distinct verse
                FROM scriptures';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_scripture_id($book_id, $chapter_id, $verse_id) {
    global $db;
    $query = 'SELECT s.id as scriptureid
                FROM scriptures as s
               WHERE s.bookid = :book_id
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
                WHERE id = :note_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':note_id',$note_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_note($note_text, $book_id, $chapter_id, $verse_id) {
    global $db;
    $query = 'INSERT INTO notes(note, scriptureid, userid)
              VALUES(:note_text
			        , (SELECT id 
                         FROM scriptures 
                        WHERE bookid = :book_id 
                          AND chapter = :chapter_id 
                          AND verse = :verse_id)
                    , 1)';
    $statement = $db->prepare($query);
    $statement->bindValue(':note_text', $note_text);
    $statement->bindValue(':book_id', $book_id);
    $statement->bindValue(':chapter_id', $chapter_id);
    $statement->bindValue(':verse_id', $verse_id);
    $statement->execute();
    $statement->closeCursor();
}

function edit_note($note_id, $book_id, $chapter_id, $verse_id, $note_text) {
    global $db;
    $query = 'Update notes as n
                 Set n.note = :note_text
                   , n.scripturesID = (SELECT id 
                                         FROM scriptures 
                                        WHERE bookid = :book_id
                                          AND chapter = :chapter_id
                                          AND verse = :verse_id)
               WHERE n.ID = :note_id';
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