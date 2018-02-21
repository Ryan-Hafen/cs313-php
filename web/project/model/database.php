<?php
  function get_bom($year, $month) {
    return new DateTime("$year-$month-1");
  }
  function get_eom($year, $month) {
    return get_bom($year, $month)->modify('last day of this month');
  }
  function get_edit_budget_url($budget_id) {
    return "edit_budget.php?budget_id=$budget_id";
  }
  function get_edit_budget_category_url($budget_id, $budget_category_id) {
    return "edit_budget_category.php?budget_id=$budget_id&budget_category_id=$budget_category_id";
  }  
  function get_edit_item_url($budget_id, $budget_item_id) {
    return "edit_item.php?budget_id=$budget_id&budget_item_id=$budget_item_id";
  }
  function get_view_budget_url($budget_id, $filter_date = null) {
    return "budget.php?budget_id=$budget_id" .
      ($filter_date != null ? "&year={$filter_date->format('Y')}&month={$filter_date->format('n')}" : '');
  }
  function get_view_budgets_url() {
    return 'budgets.php';
  }
  function is_date($value) {
    $parts = explode('-', $value);
    if (count($parts) != 3) return false;
    return checkdate(intval($parts[1]) /*Month*/, intval($parts[2]) /*day*/, intval($parts[0]) /*year*/);
  }
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
  function show_errors($errors, $class='warning') {
    if (!isset($errors) || count($errors) == 0) return;
    echo "<div class=\"alert alert-$class\">";
    if (count($errors) == 1) {
      echo $errors[0];
    } else {
      echo '<ul>';
      foreach($errors as $error) {
        echo "<li>$error</li>";
      }
      echo '</ul>';
    }
    echo '</div>';
  }
  session_start();
  $current_page = htmlspecialchars($_SERVER['REQUEST_URI']);
  $dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 $dbUrl = "postgres://rhafen:919191@localhost:5432/myScriptureJournal";
}
$dbopts = parse_url($dbUrl);
$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // $db->exec('SET search_path TO cs313_project');
} catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
  $user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;
  $valid_user = $user_id > 0;
  if (!$valid_user && basename($_SERVER['PHP_SELF']) != 'index.php') {
    header("Location: ./"); 
    die();
  }
?>