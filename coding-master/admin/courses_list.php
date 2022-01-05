<?php
     require('header.php');
     require('left_panel.php');
    require("DB.php");
    $courses = $db_object->get_courses();

?>
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Course List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index1.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Course List</li>
                        </ol>
                        
                        <div class="card mb-4">   
                                                  
                               <?php
                                    if(isset($_GET['msg']) and $_GET['msg']=='deleted'){
                                        echo '<div class="alert alert-danger">The Record is Deleted!</div>';
                                    }elseif(isset($_GET['msg']) and $_GET['msg']=='notdeleted'){
                                        echo 'Error! The Record is NOT Deleted!';
                                    }
                               ?>
                                <?php
                                    if(isset($_GET['msg']) and $_GET['msg']=='updated'){
                                        echo '<div class="alert alert-danger">The Record is Updated!</div>';
                                    }elseif(isset($_GET['msg']) and $_GET['msg']=='notupdated'){
                                        echo 'Error! The Record is NOT Updated!';
                                    }
                               ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Course Name</th>
                                                <th>Trainer's Name</th>
                                                <th>Course Fee</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Name</th>
                                                <th>Trainer's Name</th>
                                                <th>Course Fee</th>
                                                <th colspan='3'>Options</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach($courses as $oneCourse ) { ?>
                                            <tr>
                                                <td><?=$oneCourse['course_name']?></td>
                                                <td><?=$oneCourse['name']?></td>
                                                <td><?=$oneCourse['course_fee']?></td>
                                                <td>
                                                    <a href="#" onClick="deleteCourse(<?=$oneCourse['id']?>)" class="btn btn-sm btn-danger">Delete</a>
                                                    <a href="view.php?id=<?=$oneCourse['id']?>" class="btn btn-sm btn-success">View</a>
                                                    <a href="edit.php?id=<?=$oneCourse['id']?>" class="btn btn-sm btn-info">Edit</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        
            </div>
        </div>
        <script>
            
            function deleteCourse(id){
                if(confirm("Want to Delete Course?")){
                    document.location="delete.php?id="+id;
                }
                return false;
            }

        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
   