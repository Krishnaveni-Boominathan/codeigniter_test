<?php $this->load->view('header') ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <h1 class="h2">View Designation</h1>
    <a href="<?php echo base_url('index.php/dashboard'); ?>">Back</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th>ID</th>
                    <th>Department Name</th>
                    <th>Designation Name</th>
                    <th>status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $value): ?>
                    <tr>
                        <td>
                            <?php echo $value->id ?>
                        </td>
                        <td>
                            <?php echo $value->department_name ?>
                        </td>
                        <td>
                            <?php echo $value->designation_name ?>
                        </td>
                        <td><?php if($value->status == 1){ ?>
                <a class="btn btn-success" href="<?php echo base_url()?>index.php/designation/active_status_user/<?= $value->id?>">Active</a>

                 <?php } else { ?>

            <a class="btn btn-danger" href="<?php echo base_url()?>index.php/designation/deactive_status_user/<?= $value->id?>">Deactive</a>
                <?php }?>
                </td>
                     
                        <!-- <td><a class="btn btn-success"
                                href="<?php //echo base_url('index.php/admin/blog/blog_show/' . $value->blog_id) ?>"
                                data-id='<?php //echo $value->blog_id ?>'>Show</a>
                        </td> -->
                        <td><a class="btn btn-info"
                                href="<?php echo base_url('index.php/designation/edit/' . $value->id) ?>">Edit</a>
                        </td>
                        <td><a class="btn delete btn-danger" href="" data-id='<?php echo $value->id ?>'>Delete</a>
                        </td>

                    </tr>
                <?php endforeach; ?>



            </tbody>
        </table>
    </div>

</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(".delete").click(function () {
        var delete_id = $(this).attr('data-id');
        var bool = confirm("Are you sure you want to delete?");
        if (bool) {
            //alert("Move to delete functionality using AJAX");
            $.ajax({
                url: "<?php echo base_url('index.php/designation/deletedesg') ?>",
                data: { 'delete_id': delete_id },
                type: "post",
                success: function (data) {
                    console.log(data);
                    if (data == 'deleted') {
                        alert('Deleted');
                        location.reload();
                    } else if (data == 'notdeleted') {
                        alert('something went wrong');
                    }

                }
            });
        } else {
            alert("Your Data is save");
           // window.location.href = '<?php // echo base_url("index.php/admin/blog"); ?>';
        }
    });


    <?php
    if (isset($_SESSION['inserted'])) {
        if ($_SESSION['inserted'] == 'yes') {
            echo "alert('Data inserted successfully')";
        } else {
            echo "alert('Data not inserted')";
        }
    }
    ?>



    <?php
    if (isset($_SESSION['updated'])) {
        if ($_SESSION['updated'] == 'yes') {
            echo "alert('Data updated successfully')";
        } else {
            echo "alert('Data not updated')";
        }
    }
    ?>
</script>