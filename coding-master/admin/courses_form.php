<?php
    require('header.php');
    require('left_panel.php');
    require("DB.php");
    $trainers = $db_object->get_trainer();
    
    if(isset($_POST['submit'])){ //form submitted
        //save about data
        if($db_object->save_course($_POST,$_FILES)){
            
            $message = "Course Data is Saved!";
        }else{
            $message = "Data NOT saved ! Error !";
        }
    }else{
        $message=null;
    }
?>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-7">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Course Page</h3>
            <h6 class='success'><?=$message?></h6>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="title">Course Name</label>
                            <input name="course_name" class="form-control py-4" type="text"
                             placeholder="Enter Page Title" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="description">Course Description</label>
                            <textarea name="description" class="form-control py-4" cols="30" rows="10" required placeholder="Enter Page Description">
                                
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="about_image">Upload Course Image</label>
                    <input type="file" name="course_image" class="form-control py-4" aria-describedby="emailHelp" required/>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="no_students">Course Fee</label>
                            <input name="course_fee" class="form-control py-4" type="number" required  />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="no_courses">Choose Trainer</label>
                            <select name="trainer_id" class="form-control" required>
                                <?php  foreach($trainers as $one){ ?>
                                    <option value="<?=$one['id']?>"> <?php echo $one['name'],' - ' , $one['domain']?> </option>
                                <?php } ?> 
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4 mb-0">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Create Course Page">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>