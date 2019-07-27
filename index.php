<?php
 // Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login.php");
    exit;
}
?>
<?php
 $connect = mysqli_connect("localhost", "root", "", "learnerdb");
 $query ="SELECT * FROM subjects ORDER BY ID";
 $result = mysqli_query($connect, $query);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Learner</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://learner.abtz.ru/img/favicon.ico" type="image/x-icon">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Learner <sup>1</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="http://learner.abtz.ru/index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Панель</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        ПРЕДМЕТЫ
      </div>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="http://learner.abtz.ru/add_subject.html">
          <i class="fa fa-plus"></i>
          <span>Добавить</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="http://learner.abtz.ru/view_subjects.html">
          <i class="fa fa-list-ol"></i>
          <span>Список</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        ОБУЧЕНИЕ
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="http://learner.abtz.ru/links.html">
          <i class="fa fa-link"></i>
          <span>Ссылки</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="http://learner.abtz.ru/timer.html">
          <i class="fa fa-play"></i>
          <span>Таймер</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        РЕЗУЛЬТАТ
      </div>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="http://learner.abtz.ru/learner_list.html">
          <i class="fa fa-book"></i>
          <span>Изучено</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="http://learner.abtz.ru/docs.html">
          <i class="fa-file-pdf-o"></i>
          <span>Документы</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>



            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                <img class="img-profile rounded-circle" src="https://pp.userapi.com/c856016/v856016294/983c0/wReqoTwmq9s.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="http://learner.abtz.ru/reset-password.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Изменить пароль
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://learner.abtz.ru/logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Выйти
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Approach -->
          <div class="card shadow mb-4">
           <div class="card-body">
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Время. ссылки, план, предметы и результаты обучения в одном месте!<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 10rem;" src="http://learner.abtz.ru/img/undraw_learning_2q1h.svg" align="right"  alt=""></h6>

            </div>
              <p>Управляй своим самонаправленным обучением. Добавляй предметы в свой план обучения. </p>
                <div class="page-header">
                    <h1>Привет, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Добро пожаловать в приложение.</h1>
                </div>
                <p>
                    <a href="http://learner.abtz.ru/reset-password.php" class="btn btn-warning">Обновить пароль</a>
                    <a href="http://learner.abtz.ru/logout.php" class="btn btn-danger">Выйти из аккаунта</a>
                </p>
            </div>
            <div class="alert alert-primary" role="alert">
              <ul class="list-group">
                <li class="list-group-item active">Управляй своим самонаправленным обучением:</li>
                <li class="list-group-item">1) <a href="http://learner.abtz.ru/add_subject.html" class="alert-link">Добавляй категории  предметов</a> в свой план обучения согласно учебному плану/ФГОС.</li>
                <li class="list-group-item">2) <a href="http://learner.abtz.ru/add_subject.html" class="alert-link">Добавляй предметы </a> в свой план обучения.</li>
                <li class="list-group-item">3) Засекай время занятия по <a href="http://learner.abtz.ru/timer.html" class="alert-link">Таймеру</a></li>
                <li class="list-group-item">4) Добавляй изученное в свой список результатов</li>
                <li class="list-group-item">5) Смотри, что еще осталось изучить в <a href="http://learner.abtz.ru/learner_list.html" class="alert-link">Списке</a></li>
                <li class="list-group-item">6) Сохраняй все <a href="http://learner.abtz.ru/links.html" class="alert-link">ссылки</a> для изучения</li>
              </ul>


            </div>
          </div>


      <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; learner.com 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
