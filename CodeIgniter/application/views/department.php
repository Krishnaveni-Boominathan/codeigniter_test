<?php $this->load->view('header') ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  
  </div>


  <h2>Section title</h2>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url() . 'index.php/payroll' ?>">
        <span data-feather="file"></span>
        Department
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url() . 'index.php/designation' ?>">
        <span data-feather="shopping-cart"></span>
        Designation
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url() . 'index.php/employee' ?>">
        <span data-feather="shopping-cart"></span>
        Employee
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url() . 'index.php/viewcontroller' ?>">
        <span data-feather="shopping-cart"></span>
        Active Employees
      </a>
    </li>
  </ul>
</main>
</div>
</div>


</body>

</html>