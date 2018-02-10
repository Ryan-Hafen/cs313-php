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
    $query = 'SELECT *
                FROM books
               WHERE VolumeID = :volume_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}
function get_chapters($book_id) {
    global $db;
    $query = 'SELECT distinct chapter
                FROM scriptures
               WHERE bookID = :book_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}
function get_verses($book_id) {
    global $db;
    $query = 'SELECT Verse
                FROM scriptures
               WHERE bookID = :book_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

?>