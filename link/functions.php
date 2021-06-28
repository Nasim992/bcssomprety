<?php 
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
//  Functions that logged in or not 
function checkLoggedInOrNot() {
    if(strlen($_SESSION['alogin'])=="")  
    {     
    echo "<script type='text/javascript'> document.location = '../login'; </script>";  
    }   
}

// Function Checked that author is logged in or not
function IsUserLoggedIn(){
    global $dbh;
    if (isset($_SESSION['userInput'])){
        $userInput = $_SESSION["userInput"];
    } 
    $sql = "SELECT user.id,user.name,user.phone,user.email,user.institute,user.password from user where email='$userInput' OR phone='$userInput'"; 
    $query = $dbh->prepare($sql); 
    $query->execute(); 
    $results=$query->fetchAll(PDO::FETCH_OBJ); 
    if($query->rowCount() === 0) 
    {
        set_message('<div class="container p-2">
        <p class="alert alert-warning alert-dismissible" id="message">You are not Logged in. Try to logged first.</p>
        </div>');
        redirect('/bcssomprety');
    }
} 
// Author is Available or not
function is_author_available($authoremail) {
    global $dbh;
    $query = "SELECT COUNT(*) as total_rows FROM user where email='$authoremail'";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $reviewered = $row['total_rows'];
    return $reviewered;
}