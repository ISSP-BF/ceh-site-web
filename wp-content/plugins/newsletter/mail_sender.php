<?php
function sendMailNewLetter($visitor_email,$f_name,$l_name,$subject,$message){
    $plugin_url = site_url();             
				//$headers = array('From: '.$adminemail);
    $adminemail = "newsletter@ceh-uemoa.org";
    $plugin_url = "CEH";
    $headers = 'Content-type: text/html'."\r\n"."From:$plugin_url <$adminemail>"."\r\n".'Reply-To: '.$adminemail . "\r\n".'X-Mailer: PHP/' . phpversion();			
    
    $subject =  'CEH NewsLetter '+$subject;
        $message = 'Hi '.$f_name.' '.$l_name.', <br/>'.$message;			
    global $current_user;
    wp_get_current_user();
    $mail= wp_mail( $visitor_email, $subject, $message, $headers);
}
