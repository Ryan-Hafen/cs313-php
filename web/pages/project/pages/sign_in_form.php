<!DOCTYPE html>
<html lang="en-us">

<head>
	<title>Sign In | Scripture Journal</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/head.php';?>
</head>

<body>
<!-- Header -->
	<?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php';?>
	
<main>
    <h1>Sign in</h1>
    
    <form action="." method="post" class="form">
        <input type="hidden" name="action" value="sign_in">

        <input type="text" id="email" name="email" placeholder="Email" value="" /> 
        <br>
        <input type="password" id="password" name="password" placeholder="Password" /> <span class="error<?php if (!$error) echo ' hide' ?>">*</span>
        <br>           

        <input type="submit" value="Sign In" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=register_form">Register</a>
    </p>

</main>


<!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer.php';?>

</body>

</html>