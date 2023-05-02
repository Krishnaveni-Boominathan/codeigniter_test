<?php $this->load->view('header') ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1 class="h2">Edit Blog</h1>
    <a href="<?php echo base_url('index.php/designation'); ?>">Back</a>
    <form id="editForm" method="post">
	
	<label for="department">Choose a department:</label>
	<select name="department" id="department">
<option value="" selected disabled>Select</option>
<?php foreach ($departments as $department): ?>

  <option value="<?php echo $department->department_name ?>">
<?php echo $department->department_name ?></option>
<?php endforeach; ?>
</select><br><br>    
    <label>Designation Name</label>
            <input type="text"  name="designation_name" value="<?php echo $data->designation_name?>">
      
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<!-- <script>
		$("#editForm").submit(function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php //echo base_url('index.php/designation/editdesg_post'); ?>",
				data: $("#editForm").serialize(),
				type: "post",
				success: function (data) {
					alert('Successfully updated');
					window.location.href = '<?php //echo base_url("index.php/designation"); ?>';
				},
				error: function () {
					alert("error");
				}
			});
		});
	</script> -->
	<script>
		$("#editForm").submit(function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('index.php/designation/update/'.$data->id); ?>",
				data: $("#editForm").serialize(),
				type: "post",
				success: function (data) {
					alert('Successfully updated');
					window.location.href = '<?php echo base_url("index.php/designation"); ?>';
				},
				error: function () {
					alert("error");
				}
			});
		});
	</script>

      