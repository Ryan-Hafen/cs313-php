<?php include '../view/header.php'; ?>
<main>
    <h1>Sign in</h1>
    
    <form action="." method="post" class="form">
        <input type="hidden" name="action" value="list_notes">

        <label>Email:</label>
        <input type="text" id="email" name="email" placeholder="Email" value="" /> 
        <br>
        <label>Password:</label>
        <input type="password" id="password" name="password" placeholder="password" /> <span class="error<?php if (!$error) echo ' hide' ?>">*</span>
        <br>     
        <label>Re-enter Password:</label>
        <input type="password" id="password_match" name="password" placeholder="password" /> <span class="error<?php if (!$error) echo ' hide' ?>">*</span>
        <br>         

        <label>&nbsp;</label>
        <input type="submit" value="Sign In" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=register_user">Register</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>