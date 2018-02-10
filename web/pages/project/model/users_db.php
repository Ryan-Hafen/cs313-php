<?php

function get_user($user_id) {
    global $db;
    $query = 'SELECT * 
                FROM users
               WHERE ID = :user_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    return $statement;    
}
?>