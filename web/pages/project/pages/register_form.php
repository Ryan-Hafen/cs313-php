<?php include '../view/header.php'; ?>
<div class="container">
	<div class="row row-padding center">
		<div class="half card-4 margin padding-16">
			<h2 class="text-theme">Register</h2>
    
				<form action="." method="post" class="form">
					<input type="hidden" name="action" value="register_user">
					<div class="section">
						<input class="input" type="text" id="first_name" name="first_name" placeholder="First Name" value="" /> 
					</div>
					<div class="section">
						<input class="input" type="text" id="last_name" name="last_name" placeholder="Last Name" value="" /> 
					</div>
					<div class="section">
						<input class="input" type="email" id="email" name="email" placeholder="Email" value="" /> 
					</div>
					<div class="section">
						<input class="input" type="password" id="password" name="password" placeholder="Password" />
					</div>
					<div class="section">
						<input class="input" type="password" id="password_match" name="password_match" placeholder="Re-enter Password" />
					</div>
					<div class="section">
						<input class="button margin padding-16" type="submit" value="Register" />
					</div>
				</form>	
	
<?php include '../view/footer.php'; ?>