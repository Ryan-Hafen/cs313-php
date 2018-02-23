<?php
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
    $query = 'SELECT id
                FROM scriptures
               WHERE bookid = :book_id
                 AND chapter = :chapter_id
                 AND verse = :verse_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":book_id", $book_id);
    $statement->bindValue(":chapter_id", $chapter_id);
    $statement->bindValue(":verse_id", $verse_id);
    $statement->execute();
    $scripture = $statement->fetch();
    $statement->closeCursor();
    $scripture_id = $scripture['id'];
    return $scripture_id; 
}

// function get_volumes() {
    // global $db;
    // $query = 'SELECT *
                // FROM volumes';
    // $statement = $db->prepare($query);
    // $statement->execute();
    // return $statement;    
// }
// function get_books($volume_id) {
    // global $db;
    // $query = 'SELECT *
                // FROM books
               // WHERE VolumeID = :volume_id';
    // $statement = $db->prepare($query);
    // $statement->execute();
    // return $statement;    
// }
// function get_chapters($book_id) {
    // global $db;
    // $query = 'SELECT distinct Chapter
                // FROM scriptures
               // WHERE BookID = :book_id';
    // $statement = $db->prepare($query);
    // $statement->execute();
    // return $statement;    
// }
// function get_verses($book_id) {
    // global $db;
    // $query = 'SELECT Verse
                // FROM scriptures
               // WHERE BookID = :book_id';
    // $statement = $db->prepare($query);
    // $statement->execute();
    // return $statement;    
// }

?>