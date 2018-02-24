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

function get_max_user_id() {
    global $db;
    $query = 'SELECT MAX(id) + 1 AS id
			   FROM users';
    $statement = $db->prepare($query);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    $user_id = $user['id'];
    return $user_id; 
}

function add_user($user_id, $email, $first_name, $last_name, $full_name) {
    global $db;
    $query = 'INSERT INTO users (id, email, firstname, lastname, fullname)
              VALUES (:user_id, :email, :first_name, :last_name, :full_name);';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':full_name', $full_name);
    $statement->execute();
    $statement->closeCursor();
}
?>