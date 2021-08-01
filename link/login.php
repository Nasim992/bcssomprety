<?php 
session_start();
include 'config.php';
include 'functions.php';
if(isset($_POST['login'])){
    $userInput = $_POST['user_input']; 
    $password=md5($_POST["password"]); 

    $sql ="SELECT email,phone,password,type FROM user WHERE (email=:userInput OR phone=:userInput) and password=:password and type='user'";
    $query= $dbh -> prepare($sql); 
    $query-> bindParam(':userInput', $userInput, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();  
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) 
    {
        $_SESSION["userInput"]=$_POST['user_input'];
        set_message('<div class="container p-2">
        <p class="alert alert-success alert-dismissible" id="message">Logged in Success</p>
      </div>');
      redirect("../student/home");
    } else{ 
        $sql ="SELECT email,phone,password,type FROM user WHERE (email=:userInput OR phone=:userInput) and password=:password and type='admin'";
        $query= $dbh -> prepare($sql); 
        $query-> bindParam(':userInput', $userInput, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();  
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0) 
        {
            $_SESSION["userInput"]=$_POST['user_input'];
            set_message('<div class="container p-2">
            <p class="alert alert-success alert-dismissible" id="message">Logged in Success</p>
          </div>');
          redirect($BASE_URL_ADMIN);
        }else {
             set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Logged in Fail.If dont have any account please sign up</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL);
        }
    }
}