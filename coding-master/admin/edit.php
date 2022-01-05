<?php
    ob_start();
     require('header.php');
     require('left_panel.php');
    require("DB.php");
    $course_id = $_GET['id'];
    if(is_numeric($course_id)){
       $course_detail = $db_object->get_one_course($course_id); //getting data of course from DB
       //echo $course_detail['course_image'];exit;
       
    }

    $trainers = $db_object->get_trainer();
    
    if(isset($_POST['submit'])){ //form submitted
        
        if(empty($_FILES['course_image']['name']))  $files = null; else $files = $_FILES;

        //save about data
        if($db_object->update_course($_POST,$files)){   
           header("location:courses_list.php?msg=updated");
        }else{
           header("location:courses_list.php?msg=notupdated");
        }
    }
?>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-7">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Course</h3>
            
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name='id' value="<?=$course_detail['id']?>">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="title">Course Name</label>
                            <input name="course_name" class="form-control py-4" type="text"
                             value="<?=$course_detail['course_name']?>" placeholder="Enter Page Title" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="description">Course Description</label>
                            <textarea name="description" class="form-control py-4" cols="30" rows="10" required placeholder="Enter Page Description">
                                <?=$course_detail['description']?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="about_image">Upload Course Image</label>
                    <input type="file" name="course_image" class="form-control py-4" aria-describedby="emailHelp"/>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="no_students">Course Fee</label>
                            <input name="course_fee" class="form-control py-4" type="number" 
                            value="<?=$course_detail['course_fee']?>" required  />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="no_courses">Choose Trainer</label>
                            <select name="trainer_id" class="form-control" required>
                                <?php  foreach($trainers as $one){ 
                                    if($one['name'] == $course_detail['name']){  ?>                 
                                        <option value="<?=$one['id']?>" selected> <?php echo $one['name'],' - ' , $one['domain']?> </option>
                                    <?php }else{ ?>
                                        <option value="<?=$one['id']?>"> <?php echo $one['name'],' - ' , $one['domain']?> </option>    
                                    <?php } ?>
                                <?php } ?> 
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4 mb-0">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update Course">
                </div>
                <div class="form-group mt-4 mb-0">
                    <img src="images/<?=$course_detail['course_image']?>" width="150" height="150" alt="course image">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>