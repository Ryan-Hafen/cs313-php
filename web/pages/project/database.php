<?php

  function safe_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
  function safe_get($key, $default = '') {
      return safe_input(isset($_GET[$key]) ? $_GET[$key] : $default);
  }
  
  function safe_post($key, $default = '') {
      return safe_input(isset($_POST[$key]) ? $_POST[$key] : $default);
  }
  
// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://rhafen:919191@localhost:5432/myScriptureJournal";
}

$dbopts = parse_url($dbUrl);

// print "<p>$dbUrl</p>\n\n";

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

// print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName;dbuser=$dbUser;dbPassword=$dbPassword</p>\n\n";

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}

// foreach ($db->query('SELECT now()') as $row)
// {
 // print "<p>$row[0]</p>\n\n";
// }


// sql functions
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
