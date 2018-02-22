<?php

function get_user_data($user_id) {
    global $db;
    $query = 'SELECT * 
                FROM users
               WHERE id = :user_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    return $statement;    
}

function get_user_by_email($email) {
    global $db;
    $query = 'SELECT id 
                FROM users
               WHERE email = :email';    
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    $user_id = $user['id'];
    return $user_id; 
}

function get_password($email) {
    global $db;
    $query = 'SELECT password 
                FROM users
               WHERE email = :email';     
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    $user_password = $user['password'];
    return $user_password;  
}

// function add_user($note_text, $scriptures_id) {
    // global $db;
    // $query = 'INSERT INTO users (scripturesid, note)
              // VALUES (1, :scriptures_id, :note_text)';
    // $statement = $db->prepare($query);
    // $statement->bindValue(':note_text', $note_text);
    // $statement->bindValue(':scriptures_id', $scriptures_id);
    // $statement->execute();
    // $statement->closeCursor();

?>