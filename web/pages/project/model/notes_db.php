<?php
function get_notes($user_id) {
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
			   JOIN books AS b on s.bookid = b.id
               WHERE n.userid = :user_id';  
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
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

function delete_note($note_id) {
    global $db;
    $query = 'DELETE FROM notes
                WHERE ID = :note_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':note_id',$note_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_note($note_id, $user_id, $scriptures_id, $note_text) {
    global $db;
    $query = 'INSERT INTO notes (id, userid, scripturesid, note)
              VALUES (:note_id, :user_id, :scriptures_id, :note_text);';
    $statement = $db->prepare($query);
    $statement->bindValue(':note_id', $note_id);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':note_text', $note_text);
    $statement->bindValue(':scriptures_id', $scriptures_id);
    $statement->execute();
    $statement->closeCursor();
}

function edit_note($note_id, $scriptures_id, $note_text) {
    global $db;
    $query = 'Update notes
                 Set note = :note_text
                   , scripturesid = :scriptures_id
               WHERE id = :note_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':note_id', $note_id);
    $statement->bindValue(':scriptures_id', $scriptures_id);
    $statement->bindValue(':note_text', $note_text);
    $statement->execute();
    $statement->closeCursor();
}

function get_max_note_id() {
    global $db;
    $query = 'SELECT max(id) AS id
			   FROM notes;'
    $statement = $db->prepare($query);
    $statement->execute();
    $note = $statement->fetch();
    $statement->closeCursor();
    $note_id = $note['id'];
    return $note_id; 
}
?>