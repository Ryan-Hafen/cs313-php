<?php
function get_volumes() {
    global $db;
    $query = 'SELECT *
                FROM volumes';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}
function get_books($volume_id) {
    global $db;
    $query = 'SELECT b.id, b.bookname
                FROM scriptures AS s
				JOIN books AS b ON s.bookid = b.id
               WHERE s.volumeid = :volume_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}
function get_chapters($book_id) {
    global $db;
    $query = 'SELECT distinct chapter
                FROM scriptures AS s
               WHERE s.bookid = :book_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}
function get_verses($book_id) {
    global $db;
    $query = 'SELECT Verse
                FROM scriptures AS s
               WHERE s.bookid = :book_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

?>