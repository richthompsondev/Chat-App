<?php 
require 'db.php';
$sql = 'SELECT * FROM courses';
$statement = $connection->prepare($sql);
$statement->execute();
$courses = $statement->fetchAll(PDO::FETCH_OBJ);

?>
<?php require "header.php";?>


<div class="container">
	<div class="card bg-dark p-3 shadow-lg rounded">
		
		<div class="card-head">
			<h2 class="text-light mb-5">All Courses</h2>
		</div>
		<div class="card-body">
			<table class="table table-hover table-striped table-dark">
			  	<thead>
			  		<tr>
				      	<th scope="col">S/N</th>
				      	<th scope="col">Name of Course</th>
				      	<th scope="col">Tutor Email</th>
				      	<th scope="col">Number of Children</th>
				      	<th scope="col" colspan="2">Edit/Delete</th>
		    		</tr>
			  	</thead>
		  		<tbody>
				<?php foreach ($courses as $course): ?>

		    		<tr>
		      			<th scope="row">
							<?= $course->id; ?>
						</th>
						<td>
							<?= $course->name; ?>
						</td>
						<td>
							<?= $course->tutor_email; ?>
						</td>
						<td>
							<?= $course->children; ?>
						</td>
						<td>
							<a href="edit.php?id=<?= $course->id ?>" class="btn btn-info">Edit</a>
							<a onclick="return confirm('Confirm you want to delete this course')" href="delete.php?id=< $course->id ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</div>

<?php require "footer.php";?>