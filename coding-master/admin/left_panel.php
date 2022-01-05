<?php session_start();?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">                            
                            <a class="nav-link" href="index1.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Manage Pages</div>
                                                      
                            <a class="nav-link" href="about_form.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Create About Page
                            </a>
                            <a class="nav-link" href="courses_form.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Create Courses Page
                            </a>
                            <a class="nav-link" href="courses_list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                List of Courses
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Create Trainers Page
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?=$_SESSION['email']?>
                    </div>
                </nav>
            </div>