<?php 
require 'db.php';

$id = $_GET['id'];
$sql = 'SELECT * FROM courses WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$course = $statement->fetch(PDO::FETCH_OBJ);

$message = '';

if(isset($_POST['name']) &&  isset($_POST['tutoremail']) && isset($_POST['nochildren'])){

	$name = $_POST['name'];
	$tutoremail = $_POST['tutoremail'];
	$noofchildren = $_POST['nochildren'];

	$sql = 'UPDATE courses SET name=:name, tutor_email=:tutor_email, children=:children WHERE id=:id';
	$statement = $connection->prepare($sql);
	if($statement->execute([':name' => $name, ':tutor_email' => $tutoremail, ':children' => $noofchildren, ':id' => $id ])){
		header('Location: /');
		$message = 'Course updated successfully.';
	}

}
?>

<?php require "header.php" ?>

<div class="container">
	<div class="bg-dark p-3 shadow-lg rounded">
		
		<div class="card-head">
			<h2 class="text-light mb-5">Edit Course</h2>
		</div>
		<div class="card-body">
			<?php if (! empty($message)): ?>
				<div class="alert alert-info">			
					<?= $message; ?>
				</div>
			<?php endif ?>
			<form method="post">
		  		<div class="form-group">
					<label for="name" class="text-light">Name of Course</label>
					<input type="text" name="name" id="name" class="form-control" value="<?= $course->name; ?>">
				</div>
		  		<div class="form-group">
					<label for="tutoremail" class="text-light">Tutor's Email</label>
					<input type="email" name="tutoremail" id="tutoremail" class="form-control" value="<?= $course->tutor_email; ?>">
				</div>
		  		<div class="form-group">
					<label for="nochildren" class="text-light">No of sub posts</label>
					<input type="number" name="nochildren" id="nochildren" class="form-control" value="<?= $course->children; ?>">
				</div>
				<div class="input-group">
					<button class="btn btn-primary" type="submit" name="save" >Update Course</button>
				</div>
			</form>
		</div>
	</div>

</div>

<?php require "footer.php" ?>