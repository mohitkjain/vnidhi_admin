<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST') 
{
    $user_name = trim($_POST['login']);
    $user_password = trim($_POST['password']);

    $login = base64_encode($user_name);
    $password = base64_encode($user_password);


    $url = 'http://test.vaibhavnidhi.com/api/users/auth';
    $ch = curl_init();
  
    $post_data = "login=".$login."&password=".$password;
                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);// No header in the result
    
    // Fetch and return content, save it.
    $output_data= curl_exec($ch);
    $ch_error = curl_error($ch);

    if($ch_error)
    {
        echo "Login Error : $ch_error";
    }
    else
    {
        if(!empty($output_data))
        {
            $json_data = json_decode($output_data);
            if($json_data->usertype === 'Admin')
            {
                echo "ok";
                $_SESSION['user_session'] = $json_data->firstname. ' '. $json_data->lastname;
            }
            else
            {
                echo "Login-id or Password does not exist.";
            }
        }
        else
        {
            echo "Login-id or Password does not exist.";
        }   
    }
    curl_close($ch);
}
?>