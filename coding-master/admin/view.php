<?php
     require('header.php');
     require('left_panel.php');
     require("DB.php");
     $course_id = $_GET['id'];
     if(is_numeric($course_id)){
        $course_detail = $db_object->get_one_course($course_id);
     }
?>
<<div id="layoutSidenav_content">
     <main>
     <div class="container-fluid">
         <h1 class="mt-4">View : Course</h1>
         <ol class="breadcrumb mb-4">
             <li class="breadcrumb-item"><a href="index1.php">Dashboard</a></li>
             <li class="breadcrumb-item active">course view</li>
         </ol>
         
         <div class="card mb-4">   
             <table class="table table-bordered">
                 <tr>
                     <th>Course Name </th>
                     <td><?=$course_detail['course_name']?></td>
                 </tr>
                 <tr>
                     <th>Course Fee</th>
                     <td><?=$course_detail['course_fee']?></td>
                 </tr>
                 <tr>
                     <th>Trainer Name</th>
                     <td><?=$course_detail['name']?></td>
                 </tr>
                 <tr>
                     <td colspan="2">
                         <img src="images/<?=$course_detail['course_image']?>" width="150" height="150" alt="Course Image">
                     </td>
                 </tr>
                 
             </table>
         </div>
    </div>
    </main>
    </div>
     