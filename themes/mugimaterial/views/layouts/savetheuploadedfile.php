<?php

//TODO List
// 1) Rename the File
// 2) For Multiple Upload , Loop through $_FILES
$dir_name = "uploads/";
    move_uploaded_file($_FILES['file']['tmp_name'],$dir_name.$_FILES['file']['name']);
    echo $dir_name.$_FILES['file']['name'];
?>