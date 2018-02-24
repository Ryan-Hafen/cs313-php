<?php include '../view/header.php'; ?>

<div class="row row-padding center">
	<div class="half card-4 padding-16">
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
				<input class="button padding" type="submit" value="Sign In" /> 
				<a href="index.php?action=register_form" class="button padding">Register</a>
			</div>
		</form>
	</div>
		
	<div class="align-left padding-16">
		<a href="index.php?action=register_form" class="button">Register</a>
	</div>
</div>

<?php include '../view/footer.php'; ?>