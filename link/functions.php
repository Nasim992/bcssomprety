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
function IsUserLoggedIn($userInput){
    global $dbh;
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

// Function Selecting User ID 
function userID($userInput){
    global $dbh;
    $stmt = $dbh->prepare("SELECT id FROM user WHERE email=? OR phone=?");
    $stmt->execute([$userInput,$userInput]); 
    $user = $stmt->fetch();
    return $user['id'];
}

// Function Return Remaining Courses Number

function remaining_courses($user_id){
    global $dbh;
    $stmt = $dbh->prepare("SELECT remaining_courses FROM create_course WHERE user_id=? ORDER BY id DESC");
    $stmt->execute([$user_id]); 
    $rcourse = $stmt->fetch();
    return $rcourse['remaining_courses'];
}

// Function all users is equal to the userid 

function all_by_userID($table_name,$user_id){
global $dbh;
return $dbh->query("SELECT * FROM ".$table_name." WHERE user_id='$user_id'")->fetchAll();
}

// Function return all inside the table 
function all($table_name){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$table_name."")->fetchAll();
}

// Update One Column in Table 
function updateOne($table_name,$id,$update_variable,$text) {
 global $dbh;
 $sql = "UPDATE ".$table_name." SET $update_variable=? WHERE id=?";
$query = $dbh->prepare($sql);
$query->execute([$text,$id]);
if($query->rowCount() > 0) {
    return true;
}else {
    return false;
}
}

// Convert English to bangla 
function englishToBangla($number){
    $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    return str_replace($en,$bn,$number);
}
function banglaToEnglish($number){
    $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    return str_replace($bn,$en,$number);
}
// String to Date Time Format
function stringToDate($date){
    $date = strtotime($date);
    return date('d-M-Y', $date);
}
function stringToTime($date){
    $date = strtotime($date);
    return date('h:i a', $date);
}
