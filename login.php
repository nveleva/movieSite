<?php include('includes/header.php') ?>
<div class="container">
	<div class="login-form">
		<?php
			if(isset($_GET['invalidLogin'])){
				echo '<p class="error">Invalid login information!</p>';
			}
		?>
		<div class="row">
			<div class="col-md-6">
				<form method="POST" action="login-action.php">
					<div class="form-group">
						<label>Email:</label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="password">
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
		</div>
	</div>
</div>	
<?php include('includes/footer.php') ?>