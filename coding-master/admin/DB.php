<?php
class DB {

    private $usename;
    private $password;
    private $databasename;
    private $server;
    private $connection;


    function __construct(){
        $this->username = 'root';
        $this->password = '';
        $this->databasename = 'coding_master';
        $this->server = 'localhost';
    }

    function connect(){
        $this->connection = mysqli_connect($this->server, $this->username, $this->password, $this->databasename);
    }

    //save data in mysql database
    function save($user_data,$files){

        $this->connect();
        extract($user_data);
        $fn = $files['about_image']['name'];
        $ftemp = $files['about_image']['tmp_name'];

        if($this->check_about_table() == false){   //empty table
            //create new record/save
            $sql = "INSERT INTO about VALUES(null, '$title', '$description', '$fn', '$no_students', 
            '$no_courses', '$no_trainers', '$no_events')";
            $result = mysqli_query($this->connection, $sql);
            if($result == true){
                //upload the image
                if($fn !='') move_uploaded_file($ftemp, "images/$fn");
                return true;
            }else{
                return false;
            }
        }else{
            //update
            $sql = "UPDATE about SET title='$title', description='$description', about_image='$fn', no_students='$no_students',
            no_courses='$no_courses',no_trainers='$no_trainers', no_events='$no_events' WHERE true ";
            $result = mysqli_query($this->connection, $sql);
            if($result == true){
                if($fn !='') move_uploaded_file($ftemp, "images/$fn");
                return true;
            }else{
                return false;
            }

        }
        
    }
    //check_about_table() : check about table is empty or not, if not return the data
    function check_about_table(){
        $this->connect();
        $sql = "SELECT * FROM about";
        $result = mysqli_query($this->connection, $sql);
        $number_records = mysqli_num_rows($result);
        if($number_records == 0){
            return false;
        }else{
            $row= mysqli_fetch_assoc($result); 
            return $row;
        }
    }

    //save Course
    function save_course($course_data, $image_data){
        $this->connect();
        extract($course_data);
        $fn = $image_data['course_image']['name'];
        $ftemp = $image_data['course_image']['tmp_name'];
         $sql = "INSERT INTO courses VALUES(null, '$course_name', '$description', '$course_fee', '$fn', '$trainer_id')";
         $result = mysqli_query($this->connection, $sql);
         if($result == true){
             //upload the image
             if($fn !='') move_uploaded_file($ftemp, "images/$fn");
             return true;
         }else{
             return false;
         }
    }

    function get_trainer(){
        $this->connect();
        $sql = "SELECT * FROM trainers";
        $result = mysqli_query($this->connection, $sql);
        if($result == true){
            $data=[];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
        }
        return $data;
    }

    function get_courses(){ //all courses
        $this->connect();
        $sql = "SELECT a.id, a.course_name, a.course_fee, a.description, a.course_image, b.name, b.domain FROM courses a
         LEFT JOIN trainers b ON a.trainer_id = b.id";
        $result = mysqli_query($this->connection, $sql);
        if($result == true){
            $data=[];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
        }
        return $data;
    }
    //delete course form TABLE : courses
    function delete_course($course_id){
        $this->connect();
        $sql = "DELETE FROM courses WHERE id='$course_id'";
        $result = mysqli_query($this->connection,$sql);
        if($result == true)  return true;  else  return false;
    }
    //one course from TABLE: courses
    function get_one_course($course_id){
        $this->connect();
        $sql = "SELECT a.id, a.course_name, a.course_fee, a.course_image, a.description, b.name FROM courses a LEFT JOIN trainers b ON a.trainer_id = b.id 
        WHERE a.id = '$course_id'";
        //$sql = "SELECT * FROM courses WHERE id = '$course_id'";
        $result = mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    //update course
    function update_course($post, $file = null){
        $this->connect();
        extract($_POST);

        if($file == null){ //image not selected
            $sql = "UPDATE courses SET course_name='$course_name', course_fee='$course_fee', description='$description',
            trainer_id='$trainer_id' WHERE id='$id'";
            $result = mysqli_query($this->connection, $sql);
        }else{ //image selected
            $course_image = $file['course_image']['name'];
            $temp_image = $file['course_image']['tmp_name'];
            $sql = "UPDATE courses SET course_name='$course_name', course_fee='$course_fee', description='$description',
            course_image='$course_image',trainer_id='$trainer_id' WHERE id='$id'";
            $result = mysqli_query($this->connection, $sql);
            if($result){
                //update
                if($course_image !='') move_uploaded_file($temp_image, "images/$course_image");
            }
        }
        
        return true;        
    }

    //Admin Login
    function admin_login($email, $password){
        $this->connect();
        //to prevent SQL Injection
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);

        $sql = "SELECT * FROM users WHERE email='$email' and password=sha1('$password') and role=9";
        $result = mysqli_query($this->connection,$sql);
        //$row = mysqli_fetch_assoc($result);
        $number = mysqli_num_rows($result); //1 = logged in ,   0 = invalid username/password
        if($number == 1){
            return true;
        }else{
            return false;
        }
    }

    //------------------------------FRONT-END DATABASE HANDLINE HERE -----------------------------
    function get_about(){
        $this->connect();
        $sql = "SELECT * FROM about";
        $result = mysqli_query($this->connection,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }




}//end of class

$db_object = new DB();
?>






