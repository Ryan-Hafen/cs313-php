<?php

function get_user_by_id($user_id) {
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

?>