<?php 
require 'db.php';

$message = '';

if(isset($_POST['name']) &&  isset($_POST['tutoremail']) && isset($_POST['nochildren'])){

	$name = $_POST['name'];
	$tutoremail = $_POST['tutoremail'];
	$noofchildren = $_POST['nochildren'];

	$sql = 'INSERT INTO courses(name, tutor_email, children) VALUES(:name, :tutor_email, :children)';
	$statement = $connection->prepare($sql);
	if($statement->execute([':name' => $name, ':tutor_email' => $tutoremail, ':children' => $noofchildren ])){
		$message = 'Course added successfully.';
	}

}
?>

<?php require "header.php" ?>

<div class="container">
	<div class=" bg-dark p-3 shadow-lg rounded">
		
		<div class="card-head">
			<h2 class="text-light mb-5">Create Course</h2>
		</div>
		<div class="card-body">

			<?php if (! empty($message)): ?>
				<div class="alert alert-info">			
					<?= $message; ?>
				</div>
			<?php endif ?>
			<form method="post">
		  		<div class="form-group">
					<label for="name">Name of Course</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>
		  		<div class="form-group">
					<label for="tutoremail">Tutor's Email</label>
					<input type="email" name="tutoremail" id="tutoremail" class="form-control">
				</div>
		  		<div class="form-group">
					<label for="nochildren">No of sub posts</label>
					<input type="number" name="nochildren" id="nochildren" class="form-control">
				</div>
				<div class="input-group">
					<button class="btn btn-primary" type="submit" name="save" >Add Course</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php require "footer.php" ?>