<?php $this->load->view('header') ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1 class="h2">Add Employee</h1>
    <a href="<?php echo base_url('index.php/employee'); ?>">Back</a>
    <form id="addForm" method="post" >
       
            <label>Employee Name</label>
            <input type="text"  name="emp_name" placeholder="Employee Name"><br><br>
            <label>Salary</label>
            <input type="text"  name="salary" placeholder="Salary"><br><br>
            <label>Date of joining</label>
            <input type="date"  name="doj" placeholder="Date of joining"><br><br>
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

</select> 
       <br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script>
        $(document).ready(function(){
        $('#department').change(function(){
      var department = $('#department').val();
      $.ajax({
        url:"<?php echo base_url('index.php/employee/getdesignationsbydepartment');?>",
        method: 'post',
        data: 'department=' + department,
        dataType: 'json',
        success: function(data){
            console.log(data);
           // designation = JSON.parse(data);
            const obj = JSON.stringify("[data]");
            //designation = JSON.parse(obj);
            $.each(data,function(index,obj){
                $('#designation').append('<option value="'+obj['designation_name']+'">'+obj['designation_name']+'</option>');
            });
           // $('#department').find('option').not(':first').remove();
            // $('#designation').find('option').not(':first').remove();
            // $.each(data,function(index,data){
            //  $('#designation').append('<option value="'+data['designation_name']+'">'+data['designation_name']+'</option>');
          //});
        }
     });
   });
});
        
		$("#addForm").submit(function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('index.php/employee/store'); ?>",
				data: $("#addForm").serialize(),
				type: "post",
				success: function (data) {
					alert('Successfully updated');
					window.location.href = '<?php echo base_url("index.php/employee"); ?>';
				},
				error: function () {
                    console.log(data);
					alert("error");
				}
			});
		});
	</script> 





<!-- <?php //require_once("modal/add_employee.php"); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <button class="btn btn-primary pull-left" id="add">Add New</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <table class="table table-responsive table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="icon_profile"></i> Full Name</th>
                            <th><i class="icon_datareport"></i> Designation</th>
                            <th><i class="icon_datareport_alt"></i> Department</th>
                            <th><i class="icon_clipboard"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php //foreach($results as $list){ ?>
                        <tr>
                            <td>
                                <a href="<?php //echo base_url(); ?>employee/view_employee/<?php //echo $list->employee_id; ?>"><?php //echo $list->employee_name; ?></a>
                            </td>
                            <td><?php //echo $list->employee_designation; ?></td>
                            <td><?php //echo $list->employee_department; ?></td>
                            <td>
                                <a href="<?php //echo base_url(); ?>employee/update_employee/<?php //echo $list->employee_id; ?>">Edit</a>
                                <?php //if($list->employee_salary == 0 ) {?>
                                | <a href="<?php //echo base_url(); ?>salary/add_salary/<?php //echo $list->employee_id; ?>">Salary</a>
                                <?php //}?>
								|
								<a href="<?php //echo base_url(); ?>employee/delete_employee/<?php //echo $list->employee_id; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php// } ?>
                </table>
            </div>
        </section>
        <div class="text-center"><p><?php //echo $links; ?></p></div>
    </div>
</div> -->