<?php include '../view/header.php'; ?>

<div class="row row-padding center">
	<div class="half card-4 margin padding-16">
		<h2 class="text-theme">Sign in</h2>
    
		<form action="." method="post" class="form">
			<input type="hidden" name="action" value="sign_in">
			<div class="section">
				<input class="input" type="text" id="email" name="email" placeholder="Email" value="" /> 
			</div>
			<div class="section">
				<input class="input" type="password" id="password" name="password" placeholder="Password" /> 
			</div>
			<div class="section">
				<input class="button margin padding-16" type="submit" value="Sign In" /> 
				<a href="index.php?action=register_form" class="button margin padding-16 theme">Register</a>
			</div>
		</form>
	</div>
</div>

<?php include '../view/footer.php'; ?>