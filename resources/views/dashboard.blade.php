<!-- resources/views/layouts/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Additional styles to handle sidebar visibility */
        #sidebar {
            transition: margin 0.3s ease;
        }

        /* Hide sidebar initially */
        .hide-sidebar {
            margin-left: -250px;
        }

        /* Adjust main content to full width when sidebar is hidden */
        .expand-content {
            margin-left: 0 !important;
        }

        /* Rotate icon when collapsed is open */
        .rotate-icon {
            transition: transform 0.3s ease;
        }

        .rotate-icon.collapsed {
            transform: rotate(-90deg);
        }

        /* Align search bar and profile */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-area {
            display: flex;
            align-items: center;
        }

        .profile-area .username {
            margin-right: 10px;
        }

        .profile-area .dropdown-menu {
            right: 0;
            left: auto;
        }

        /* Smaller hamburger button */
        #toggle-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 7px;
            border-radius: 5px;
        }

        .dashboard-section h4 {
            margin-bottom: 20px;
        }

        .dashboard-section {
            margin-bottom: 30px;
        }

        .shortcut-group {
            margin-bottom: 10px;
        }

        .shortcut-group a {
            display: block;
            margin-bottom: 5px;
        }

        .list-group-item {
            border: none;
            padding: 0.5rem 0;
        }

        .list-group-item a {
            text-decoration: none;
            color: #000;
        }

        .btn-group {
            margin-top: 20px;
        }
         /* Background for the main content with a semi-transparent overlay */
         #sidebar {
            background-image: url("{{ asset('images/main-content.jpg') }}"); /* Replace with your image URL */
            /* background-size: cover; */
            background-position: center;
            position: relative;
            z-index: 1;
        }

        /* Semi-transparent overlay */
        #sidebar::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.2); /* Adjust transparency level */
            z-index: -1;
        }

        /* Text color adjusted for contrast */
        #sidebar h4, #sidebar .list-group-item a {
            color: white; /* Adjust to ensure good contrast with the background */
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar position-relative">
                <button id="toggle-btn" class="btn btn-outline-secondary">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="position-sticky mt-4">
                    <h1 class="h4 text-center">Dashboard</h1>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="#">
                                <span data-feather="home"></span>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-bold " href="#">
                                Material Management
                                <!-- Arrow Icon -->
                                <span class="float-end">
                                    <i class="rotate-icon bi bi-chevron-right collapsed" data-bs-toggle="collapse" href="#ModulSubmenu" aria-expanded="false"></i>
                                </span>
                            </a>
                            <!-- Sub-menu -->
                            <ul class="collapse list-unstyled" id="ModulSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link ms-4" href="#">Masterdata</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ms-4" href="#">Inventory</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ms-4" href="#">Procurement</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ms-4" href="#">Material Control</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Add more sidebar items here -->
                    </ul>
                </div>
            </nav>


            <!-- Main content -->
            <main id="main-content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Navbar with search and profile -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom navbar">
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="50" height="24" class="d-inline-block align-text-top">
                               
                            </a>
                        </div>
                    </nav>
                    <!-- Search Bar -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <!-- Profile Area -->
                    <div class="profile-area dropdown">
                        <span class="username me-2">John Doe</span>
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="profileMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="profileMenuButton">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Dashboard content -->
                <!-- <div class="row">
                    <div class="col-md-6">
                        <h4>WHITE-E ERP</h4>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">Material Management</a>
                            <a href="#" class="list-group-item list-group-item-action">Production Planning</a>
                            <a href="#" class="list-group-item list-group-item-action">Sales And Distibutor</a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4>Material Management</h4>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">Item</a>
                            <a href="#" class="list-group-item list-group-item-action">Customer</a>
                            <a href="#" class="list-group-item list-group-item-action">Supplier</a>
                            <a href="#" class="list-group-item list-group-item-action">Sales Invoice</a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4>Your Shortcuts</h4>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">Item</a>
                            <a href="#" class="list-group-item list-group-item-action">Customer</a>
                            <a href="#" class="list-group-item list-group-item-action">Supplier</a>
                            <a href="#" class="list-group-item list-group-item-action">Sales Invoice</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Your Shortcuts</h4>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">Item</a>
                            <a href="#" class="list-group-item list-group-item-action">Customer</a>
                            <a href="#" class="list-group-item list-group-item-action">Supplier</a>
                            <a href="#" class="list-group-item list-group-item-action">Sales Invoice</a>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h4>Reports & Masters</h4>
                        <ul class="list-group">
                            <li class="list-group-item">Accounting</li>
                            <li class="list-group-item">Stock</li>
                            <li class="list-group-item">CRM</li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <h4>Data Import and Settings</h4>
                        <ul class="list-group">
                            <li class="list-group-item">Import Data</li>
                            <li class="list-group-item">Chart of Accounts</li>
                        </ul>
                    </div>
                </div> -->

                
                <div class="container mt-5">
                    <!-- Your Shortcuts Section -->
                    <div class="row dashboard-section">
                        <div class="col-md-12">
                            <h4>Your Shortcuts</h4>
                            <div class="row">
                                <div class="col-md-3 shortcut-group">
                                    <a href="#">Item</a>
                                </div>
                                <div class="col-md-3 shortcut-group">
                                    <a href="#">Customer</a>
                                </div>
                                <div class="col-md-3 shortcut-group">
                                    <a href="#">Supplier</a>
                                </div>
                                <div class="col-md-3 shortcut-group">
                                    <a href="#">Sales Invoice</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reports & Masters Section -->
                    <div class="row dashboard-section">
                        <div class="col-md-4">
                            <h4>Accounting</h4>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">Chart of Accounts</a></li>
                                <li class="list-group-item"><a href="#">Company</a></li>
                                <li class="list-group-item"><a href="#">Customer</a></li>
                                <li class="list-group-item"><a href="#">Supplier</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Stock</h4>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">Item</a></li>
                                <li class="list-group-item"><a href="#">Warehouse</a></li>
                                <li class="list-group-item"><a href="#">Brand</a></li>
                                <li class="list-group-item"><a href="#">Unit of Measure (UOM)</a></li>
                                <li class="list-group-item"><a href="#">Stock Reconciliation</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>CRM</h4>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">Lead</a></li>
                                <li class="list-group-item"><a href="#">Customer Group</a></li>
                                <li class="list-group-item"><a href="#">Territory</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Data Import and Settings Section -->
                    <div class="row dashboard-section">
                        <div class="col-md-4">
                            <h4>Data Import and Settings</h4>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">Import Data</a></li>
                                <li class="list-group-item"><a href="#">Opening Invoice Creation Tool</a></li>
                                <li class="list-group-item"><a href="#">Chart of Accounts Importer</a></li>
                                <li class="list-group-item"><a href="#">Letter Head</a></li>
                                <li class="list-group-item"><a href="#">Email Account</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Edit and New buttons -->
                    <div class="btn-group">
                        <button class="btn btn-outline-primary">Edit</button>
                        <button class="btn btn-primary">New</button>
                    </div>
                </div>

                @yield('content')
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript to handle sidebar toggle
        document.getElementById('toggle-btn').addEventListener('click', function() {
            let sidebar = document.getElementById('sidebar');
            let mainContent = document.getElementById('main-content');

            // Toggle sidebar visibility
            sidebar.classList.toggle('hide-sidebar');

            // Adjust main content when sidebar is hidden
            mainContent.classList.toggle('expand-content');
        });
    </script>
</body>

</html>