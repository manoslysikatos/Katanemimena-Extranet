<?php 
   session_start();
  if(($_SESSION['isValid']!==1)){
    header('Location: /katanemimena/login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Χαροκόπειο Πανεπιστήμιο</title>


    <!-- Custom styles for TABLES -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img src="https://www.hua.gr/files/logo.png" alt="har-logo" style="width:270px;height:70px;" >
                
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Αρχική Σελίδα</span></a>
            </li>
            <?php if (($_SESSION['role'] == 'ROLE_ADMIN')): ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Χρήστες</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--- TO BE DELETED <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="students.php">Υποψήφιοι διδάκτορες</a>
                        <a class="collapse-item" href="professors.php">Επιβλέποντες καθηγητές</a>
                        <a class="collapse-item" href="bmembers.php">Μέλη Γενικής Συνέλευσης</a>
                        <a class="collapse-item" href="staff.php">Προσωπικό</a>
                    </div>
                </div>
            </li>
            <?php endif; ?>
            <!-- Nav Item - Utilities Collapse Menu -->
            <?php if (($_SESSION['role'] == 'ROLE_ADMIN')||($_SESSION['role'] == 'ROLE_SUPER')||($_SESSION['role'] == 'ROLE_BOARD')): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Έργα</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="all-tasks.php">Όλα τα έργα</a>
                      <!--  <a class="collapse-item" href="task-per-student.php">Έργα ανά υποψήφιο</a>
                        <a class="collapse-item" href="task-per-professor.php">Έργα ανά καθηγητή</a>-->
                        <a class="collapse-item" href="approved-tasks.php">Εγκεγκριμένα έργα</a>
                        <a class="collapse-item" href="disapproved-tasks.php">Απορριφθέντα έργα</a>
                        <?php if (($_SESSION['role'] == 'ROLE_ADMIN')): ?>
                        <a class="collapse-item" href="pending-tasks.php">Αιτήματα</a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
     <?php endif; ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <?php if (($_SESSION['role'] == 'ROLE_CAN')): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-history"></i>
                    <span>Έργα</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="all-tasks.php">Όλα τα έργα</a>
                        <a class="collapse-item" href="approved-tasks.php">Ανολοκλήρωτα έργα</a> 
                        <a class="collapse-item" href="completed-tasks.php">Ολοκληρωμένα έργα</a>
       
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="points.php">Πόντοι</a> 
            </li>
            <hr class="sidebar-divider">
            <?php endif; ?>
            <?php if (($_SESSION['role'] == 'ROLE_ADMIN')||($_SESSION['role'] == 'ROLE_BOARD')): ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - vote -->
            <li class="nav-item active">
                <a class="nav-link" href="task-details.php">
                    <i class="fas fa-check"></i>
                    <span>Έγκριση ή απόρριψη νέων έργων</span></a>
            </li>
            <?php endif; ?>
            <?php if (($_SESSION['role'] == 'ROLE_SUPER')): ?>
                <hr class="sidebar-divider">
             <!-- Nav Item - new task -->
             <li class="nav-item active">
                <a class="nav-link" href="addnewtask.php">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Νέα Ανάθεση Έργου</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php endif; ?>  

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


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['firstName']?> <?php echo $_SESSION['lastName']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="user.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Προφίλ
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ρυθμίσεις
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/katanemimena/logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Αποσύνδεση
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="modal" tabindex="-1" role="dialog" id="myModal">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="modal-title">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p id="modal-text">Modal body text goes here.</p>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">ΟΚ</button>
				      </div>
				    </div>
				  </div>
				</div>
