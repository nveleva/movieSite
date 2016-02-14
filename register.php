<?php include('includes/header.php') ?>
<div class="container">
	<div class="login-form">
		<?php 
			if(isset($_GET['matchpass'])){
					echo '<p class="error">Password does not match!</p>';
			}
		?>
		<div class="row">
			<div class="col-md-6">
				<form method="POST" action="register-action.php">
					<div class="form-group">
						<label>Email:</label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<label>Confirm Password:</label>
						<input type="password" class="form-control" name="confirmPassword">
					</div>
					<input type="submit" value="Register">
				</form>
			</div>
		</div>
	</div>
</div>	
<?php include('includes/footer.php') ?>