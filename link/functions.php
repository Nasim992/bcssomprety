<?php 
include '../link/config.php';
class bcsFunction{
    //  Set Message Function starts Here 
function set_message($message) {
    if(!empty($message)){ 
    $_SESSION['message']= $message;  
    }else {  
    $message = "";
    }
}
// Display Function Starts Here
function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
// Redirect Function section starts Here 
function redirect($location){
    return header("Location: {$location}");
}
}

?>