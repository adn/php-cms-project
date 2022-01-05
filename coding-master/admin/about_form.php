<?php
    require('header.php');
    require('left_panel.php');
    require("DB.php");
    
    if(isset($_POST['submit'])){ //form submitted
        //save about data
        if($db_object->save($_POST,$_FILES)){
            $message = "About Page is Saved!";
            $data = $db_object->check_about_table();
            extract($data);
        }else{
            $message = "Data NOT saved ! Error !";
        }
    }else{
        $message = null;
        if($db_object->check_about_table() == false){  
            //initialize the variable
            $data['title']='';
            $data['description']='';
            $data['no_students']='';
            $data['no_courses']='';
            $data['no_trainers']='';
            $data['no_events']='';
            $data['about_image']='';
        }else{
            // fetch the data 
            $data = $db_object->check_about_table();
            extract($data);
        }
    }
?>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-7">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create About Page</h3>
            <h6 class='success'><?=$message?></h6>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="title">Page Title</label>
                            <input name="title" class="form-control py-4" type="text"
                             placeholder="Enter Page Title"  value="<?=$data['title']?>" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="description">Page Description</label>
                            <textarea name="description" class="form-control py-4" cols="30" rows="10" required placeholder="Enter Page Description">
                                <?=$data['description']?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="about_image">Upload About Image</label>
                    <input type="file" name="about_image" class="form-control py-4" aria-describedby="emailHelp" required/>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="no_students">Number of Students</label>
                            <input name="no_students" class="form-control py-4" type="number" required value="<?=$data['no_students']?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="no_courses">Number of Courses</label>
                            <input name="no_courses" class="form-control py-4" type="number" required value="<?=$data['no_courses']?>"/>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="no_trainers">Number of Trainers</label>
                            <input name="no_trainers" class="form-control py-4"  type="number" required value="<?=$data['no_trainers']?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="no_events">Number of Events</label>
                            <input name="no_events" class="form-control py-4"  type="number" required value="<?=$data['no_events']?>"/>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4 mb-0">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Create About Page">
                </div>
                <div class="col-md-6">
                    <img src="images/<?=$data['about_image']?>" width="200" height="200" alt="About Page Image">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>