<?php $this->load->view( 'header' ) ?>

<main role = 'main' class = 'col-md-9 ml-sm-auto col-lg-10 px-4'>
<h1 class = 'h2'>Add Designation</h1>
<a href = "<?php echo base_url('index.php/designation'); ?>">Back</a>
<form method = 'post' action = "<?php echo base_url('index.php/designation/insert'); ?>">
<label for = 'department'>Choose a department:</label>
<select name = 'department' id = 'department'>
<option value = '' selected disabled>Select</option>
<?php foreach ( $departments as $department ): ?>

<option value = "<?php echo $department->department_name ?>">
<?php echo $department->department_name ?></option>
<?php endforeach;
?>
</select><br><br>
<label>Designation</label>
<input type = 'text'  name = 'designation' placeholder = 'Designation'><br><br>
<button type = 'submit' class = 'btn btn-primary'>Submit</button>
</form>
</main>
