<?php include '../view/header.php'; ?>

<div class="container half center ">
	<div class="responsive card-4">
		<h2>Sign in</h2>
    
		<form action="." method="post" class="form">
			<input type="hidden" name="action" value="sign_in">
			<div class="section">
				<input class="input" type="text" id="email" name="email" placeholder="Email" value="" /> 
			</div>
			<div class="section">
				<input class="input" type="password" id="password" name="password" placeholder="Password" /> 
			</div>
			<div class="section">
				<input class="button" type="submit" value="Sign In" /> 
			</div>
		</form>
	</div>
		
	<div class="responsive padding-16">
		<a href="index.php?action=register_form" class="button">Register</a>
	</div>
</div>

<?php include '../view/footer.php'; ?>