<?php
    require("DB.php");
    if($db_object->update_course($_POST, $_FILES)){
        header("location:courses_list.php?msg=updated");
    }else{
        header("location:courses_list.php?msg=notupdated");
    }


?>