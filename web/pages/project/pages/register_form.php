<?php include '../view/header.php'; ?>
<main>
    <h1>Register</h1>
    
    <form action="." method="post" class="form">
        <input type="hidden" name="action" value="register_user">

        <input type="text" id="first_name" name="first_name" placeholder="First Name" value="" /> 
        <br>
        <input type="text" id="last_name" name="last_name" placeholder="Last Name" value="" /> 
        <br>
        <input type="email" id="email" name="email" placeholder="Email" value="" /> 
        <br>
        <input type="password" id="password" name="password" placeholder="Password" /> <span class="error<?php if (!$error) echo ' hide' ?>">*</span>
        <br>
        <input type="password" id="password_match" name="password_match" placeholder="Re-enter Password" /> <span class="error<?php if (!$error) echo ' hide' ?>">*</span>
        <br>         

        <input type="submit" value="Register" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=sign_in">Sign In</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>