<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);


switch ($r=array_shift($request)) {
    case 'send' :handle_msg($method,$input); 
        break;
    default:  header("HTTP/1.1 404 Not Found");
        exit;
}

function handle_msg($method,$input){
    print_r($input);
    
    $to_email = "pantsosxen23@gmail.com";
    $subject = "Mail from Personal Site";
    $name=$input['name'];
    $message=$input['message'];
    $body ="My name is $name and message is $message";
    $headers = $input['email'];
    if (mail($to_email, $subject, $body, $headers)) {
       echo "Email successfully sent to $to_email...";
    } else {
       echo "Email sending failed...";
    }

}







        ?>