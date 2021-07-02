<?php
session_start();
include 'config.php';
include 'functions.php';

    if (isset($_SESSION['userInput'])){
        $userInput = $_SESSION["userInput"];
    } 
// Update Course Name
    if(isset($_POST['update_course_name'])){
        $course_id = $_POST['course_id'];
        $course_name = $_POST['course_name'];

        if(empty($course_name)){
            set_message('<div class="container p-2">
            <p class="alert alert-warning alert-dismissible" id="message">Required Field is empty</p>
            </div>');
            redirect('../student/edit_my_courses');
        }else {
            if(updateOne($CREATE_COURSE,$course_id,'course_name',$course_name )){
                set_message('<div class="container p-2">
                <p class="alert alert-success alert-dismissible" id="message">Course Name Updated Success</p>
              </div>');
              redirect('../student/my_courses');
            }else {
                set_message('<div class="container p-2">
                <p class="alert alert-warning alert-dismissible" id="message">Not Updated Yet</p>
                </div>');
                redirect('../student/edit_my_courses');
            }
        }
    }
// Update Payment Status
if(isset($_POST['update_payment_status'])){
    $course_id = $_POST['course_id'];
    $payment_status = $_POST['payment_status'];
    $payment_status==='Paid'?$payment_status=0:$payment_status=1;

        if(updateOne($CREATE_COURSE,$course_id,'payment_status', $payment_status )){
            set_message('<div class="container p-2">
            <p class="alert alert-success alert-dismissible" id="message">Payment Status Updated Success</p>
          </div>');
          redirect('../student/my_courses');
        }else {
            set_message('<div class="container p-2">
            <p class="alert alert-warning alert-dismissible" id="message">Not Updated Yet</p>
            </div>');
            redirect('../student/edit_my_courses');
        }
}
// Update Payment
if(isset($_POST['update_payment_amount'])){
    $course_id = $_POST['course_id'];
    $payment_amount = $_POST['payment_amount'];

    if(empty($payment_amount)){
        set_message('<div class="container p-2">
        <p class="alert alert-warning alert-dismissible" id="message">Required Field is empty</p>
        </div>');
        redirect('../student/edit_my_courses');
    }else {
        if(updateOne($CREATE_COURSE,$course_id,'payment_amount', $payment_amount )){
            set_message('<div class="container p-2">
            <p class="alert alert-success alert-dismissible" id="message">Payment info Updated Success</p>
          </div>');
          redirect('../student/my_courses');
        }else {
            set_message('<div class="container p-2">
            <p class="alert alert-warning alert-dismissible" id="message">Not Updated Yet</p>
            </div>');
            redirect('../student/edit_my_courses');
        }
    }
}