<?php $this->load->view('header') ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1 class="h2">Edit Blog</h1>
    <a href="<?php echo base_url('index.php/payroll'); ?>">Back</a>
    <form id="editForm" method="post" action="<?php echo base_url() ?>index.php/payroll/editdept_post">
    <input type="hidden" name="id" value="<?php echo $id ?>">
            <label>Department Name</label>
            <input type="text"  name="dept_name" value="<?php echo $result[0]['department_name'] ?>">
      
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script>
		$("#editForm").submit(function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('index.php/payroll/editdept_post'); ?>",
				data: $("#editForm").serialize(),
				type: "post",
				success: function (data) {
					alert('Successfully updated');
					window.location.href = '<?php echo base_url("index.php/payroll"); ?>';
				},
				error: function () {
					alert("error");
				}
			});
		});
	</script>

      