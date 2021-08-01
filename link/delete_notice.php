<?php
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['delete_notice'])){
 

$notice_id = $_POST['notice_id'];

$deleteSuccess=false;

$notice_image_source = $NOTICE_SRC.returnSingleValue($NOTICE,'notice_file_name','id',$notice_id);


unlink($notice_image_source);

Delete_Table($NOTICE,'id',$notice_id)==true?$deleteSuccess=true:$deleteSuccess=false;


if($deleteSuccess){
    set_message('<div class="container p-2">
      <p class="alert alert-success alert-dismissible" id="message">Notice Deleted Successfully</p>
    </div>');
    redirect('../admin/notice');
  }else{
      set_message('<div class="container p-2">
      <p class="alert alert-warning alert-dismissible" id="message">Something went wrong.Try Again</p>
      </div>');
      redirect('../admin/notice');
  }

}