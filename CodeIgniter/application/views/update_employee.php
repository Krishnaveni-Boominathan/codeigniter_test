<?php $this->load->view('header') ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h4>Edit user</h4>
        <a href="<?php echo base_url('index.php/employee'); ?>">Back</a>
        <form id="editForm"  method="POST">
            <label>Employee Name</label>
            <input type="text" name="emp_name" value="<?php echo $data->employee_name;?>"><br><br>
            <label>Salary</label>
            <input type="text" name="salary" value="<?php echo $data->salary;?>"><br><br>
            <label>Date_of_joining</label>
            <input type="text" name="doj" value="<?php echo $data->date_of_joining;?>"><br><br>
            <label for="department">Choose a department:</label>
			<select name="department" id="department">
<option value="" selected disabled>Select</option>
<?php foreach ($departments as $department): ?>

  <option value="<?php echo $department->department_name ?>">
<?php echo $department->department_name ?></option>
<?php endforeach; ?>
</select><br><br>

<label for="designation">Choose a designation:</label>
<select name="designation" id="designation">
<option value="" selected disabled>Select</option>
<?php foreach ($designations as $designation): ?>

  <option value="<?php echo $designation->designation_name ?>">
<?php echo $designation->designation_name ?></option>
<?php endforeach; ?>
</select>
       <br><br>
			<button type="submit">Update</button>
        </form>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

	<script>
		$("#editForm").submit(function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('index.php/employee/update/'.$data->id); ?>",
				data: $("#editForm").serialize(),
				type: "post",
				success: function (data) {
					alert('Successfully updated');
					window.location.href = '<?php echo base_url("index.php/employee"); ?>';
				},
				error: function () {
					alert("error");
				}
			});
		});
	</script>