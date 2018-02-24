<?php include '../view/header.php'; ?>

<div class="row-padding">
	<div class="half center card-4">
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
				<input class="button" type="submit" value="Sign In" /> 
			</div>
		</form>
	</div>
		
	<div class="responsive align-left padding-16">
		<a href="index.php?action=register_form" class="button">Register</a>
	</div>
</div>

<?php include '../view/footer.php'; ?>