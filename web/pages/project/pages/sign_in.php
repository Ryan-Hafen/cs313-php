<?php include '../view/header.php'; ?>
<main>
    <h1>Sign in</h1>
    
    <form action="." method="post" class="form">
        <input type="hidden" name="action" value="list_notes">

        <input type="text" id="email" name="email" placeholder="Email" value="" /> 
        <br>
        <input type="password" id="password" name="password" placeholder="Password" /> <span class="error<?php if (!$error) echo ' hide' ?>">*</span>
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