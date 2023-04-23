<?php
require_once '../library/php/checksession.php';
require_once  '../Library/Classes/users.php';

$user = new User();

if (isset($_SESSION['username'])) {

    $data = $user->currentUser($_SESSION['username']);
    $status = $data['status'];
    $userType = $data['userType'];
    // $mobile_number = $data['mobile_number'];
    // $email = $data['email'];
    // $gender = $data['gender'];
    // $bday = $data['bday'];
    // $Address = $data['Address'];
    // $image = $data['image'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Components/Css/adminstyle.css" />
    <link rel="stylesheet" type="text/css" href="../Components/Css/button.css" />

    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" />
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />








    <style>
        body {
            background: #181a1b;
            color: white;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .navItems {
            background: #181a1b;

        }

        a {
            color: white;
        }

        .vertical-nav {
            min-width: 17rem;
            width: 17rem;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.4s;
        }

        .webexInfo {
            position: absolute;
            bottom: 0;
            left: 0;
            font-size: 12px;
        }

        .page-content {
            width: calc(100% - 17rem);
            margin-left: 17rem;
            transition: all 0.4s;
        }

        #sidebar.active {
            margin-left: -17rem;
        }

        #content.active {
            width: 100%;
            margin: 0;
        }

        .separator {
            margin: 3rem 0;
            border-bottom: 1px dashed #fff;
        }

        .text-uppercase {
            letter-spacing: 0.1em;
        }

        .text-gray {
            color: #aaa;
        }

        .nav-link {
            text-transform: capitalize;
        }

        .nav-link:hover {
            background: #1D2124;
        }

        .text-primary {
            color: white !important;
        }

        .outline-sm {
            border: 1px solid #33373b !important;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -17rem;
            }

            #sidebar.active {
                margin-left: 0;
            }

            #content {
                width: 100%;
                margin: 0;
            }

            #content.active {
                margin-left: 17rem;
                width: calc(100% - 17rem);
            }
        }

        .img-thumbnail {
            padding: .25rem;
            background-color: #222628;
            border: 1px solid #3f4243;
            border-radius: .25rem;
            max-width: 100%;
            height: auto;
        }
    </style>

</head>

<body>
    <!-- Vertical navbar -->
    <div class="vertical-nav bg-dark" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-dark">
            <div class="media d-flex align-items-center">
                <img loading="lazy" src="../Components/Images/empImage.png" alt="" width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm" />
                <div class="">
                    <h4 class="m-0">CELLENTRIC</h4>
                    <h6 class="m-0"><?= $_SESSION['username'] ?></h6>
                    <span class="badge rounded-pill bg-success">
                        <?php
                        if ($userType == "1") {
                            echo "Admin";
                        } else {

                            echo "User";
                        }
                        ?></span>
                </div>
            </div>
        </div>

        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">
            Dashboard
        </p>

        <ul class="nav flex-column mb-0">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link text-primary">
                    <i class="fa fa-home mr-3 text-primary fa-fw"></i>
                    Home
                </a>
            </li>

            <?php
            if ($userType ==  "1") {
            ?>
                <li>
                    <a href="#empMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link text-primary"><i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>Employee</a>

                    <ul class="collapse list-unstyled" id="empMenu">
                        <li>
                            <a href="addEmployee.php" class="nav-link text-primary bg-dark">- Add Employees</a>
                        </li>
                        <li>
                            <a href="employeeManage.php" class="nav-link text-primary bg-dark">- Manage Employee</a>
                        </li>
                    </ul>
                </li>
            <?php
            } else {
            }

            ?>
            <li class="nav-item">
                <a href="getcustomer.php" class="nav-link text-primary">
                    <i class="fa fa-users mr-3 text-primary fa-fw"></i>
                    Customers
                </a>
            </li>

            <li>
                <a href="#productMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link text-primary"><i class="fa fa-cube mr-3 text-primary fa-fw"></i>Product</a>

                <ul class="collapse list-unstyled" id="productMenu">
                    <li>
                        <a href="addProduct.php" class="nav-link text-primary bg-dark">- Add Product</a>
                    </li>
                    <li>
                        <a href="manageProduct.php" class="nav-link text-primary bg-dark">- Manage Product</a>
                    </li>
                    <li>
                        <a href="productImageChange.php" class="nav-link text-primary bg-dark">- Image Change</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="ManageOrder.php" class="nav-link text-primary">
                    <i class="fa fa-file-text mr-3 text-primary fa-fw"></i>
                    Orders
                </a>
            </li>

            <li>
                <a href="#reportMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link text-primary"><i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>reports</a>

                <ul class="collapse list-unstyled" id="reportMenu">
                    <li>
                        <a href="getReport.php" class="nav-link text-primary bg-dark">- Daily sales report</a>
                    </li>
                    <li>
                        <a href="getsalesreport.php" class="nav-link text-primary bg-dark">- Sales report</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#returnMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link text-primary"><i class="fa fa-reply mr-3 text-primary fa-fw"></i>return</a>

                <ul class="collapse list-unstyled" id="returnMenu">
                    <li>
                        <a href="return.php" class="nav-link text-primary bg-dark">- Add return</a>
                    </li>
                    <!-- <li>
                        <a href="#" class="nav-link text-primary bg-dark">- Manage return</a>
                    </li> -->
                </ul>
            </li>
            <li class="nav-item">
                <a href="../Library/PHP/logout.php" class="nav-link text-primary">
                    <i class="fal fa-chevron-double-left mr-3 text-primary fa-fw"></i>Logout
                </a>
            </li>
        </ul>

        <div class="webexInfo ml-2">
            <p class="text-center"><small>Copyright &copy;2021 | Designed by</small> <strong>WebEX Solutions</strong></p>
        </div>
    </div>
    <!-- End vertical navbar -->

    <!-- Page content holder -->
    <div class="page-content p-5" id="content">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-dark bg-dark rounded-pill shadow-sm px-4 mb-4 outline-sm">
            <i class="fa fa-bars mr-2 text-primary"></i><small class="text-uppercase font-weight-bold text-primary">Menu</small>
        </button>