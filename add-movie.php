<?php 
	/*session_start();*/
	if(!($_SESSION['islogged'] === true)){
		header('Location: login.php');
		exit();
		}
		if(isset($_GET['emptyFields'])){
			echo '<p class="error">Fields can not be empty!</p>';
}?>
<?php include('includes/header.php')?>
<div class="container">
	<div class="add-form">
		<div class="row">
			<div class="col-md-6">
				<form method="POST" action="add-movie-action.php" enctype="multipart/form-data">
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control"name="title">
					</div>
					<div class="form-group">
						<label>Type</label>
						<select name="type">
							<option>Romance</option>
							<option>Series</option>
							<option>Thriller</option>
							<option>Comedy</option>
							<option>Action</option>
						</select>
					</div>
					<div class="form-group">
						<label>Discription</label>
						<textarea name="description"></textarea>
					</div>
					<input type="file" name="img">
					<br>
					<div class="form-group">
						<input type="submit" value="Add" class="btn btn-default">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php') ?>