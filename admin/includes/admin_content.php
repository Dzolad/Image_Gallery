<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Welcome

        <?php
      		$user = new User($database);
      		$user->find($_SESSION['user_id']);
      		echo $user->data['username'];
        ?>

      </h1>
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-file"></i> Blank Page
        </li>
      </ol>
  </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container-fluid -->
