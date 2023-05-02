<?php $this->load->view('header') ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1 class="h2">Add Department</h1>
	<a href="<?php echo base_url('index.php/payroll'); ?>">Back</a>
    <form id="addForm" method="post">
       
            <label>Department Name</label>
            <input type="text"  name="dept_name" placeholder="Department Name">
      
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script>
		$("#addForm").submit(function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('index.php/payroll/do_insert'); ?>",
				data: $("#addForm").serialize(),
				type: "post",
				success: function (data) {
					alert('Successfully updated');
					window.location.href = '<?php echo base_url("index.php/payroll"); ?>';
				},
				error: function () {
                    console.log(data);
					alert("error");
				}
			});
		});
	</script>
