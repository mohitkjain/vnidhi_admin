<?php
    $url = "http://test.vaibhavnidhi.com/api/users";
    header('Content-type: application/json');
    $data = file_get_contents($url);
    $user_data = json_decode($data);
    if(isset($user_data))
    {
        foreach($user_data as $user)
        {
            echo $user->user_id;
            echo $user->fname;
        }
    }
?>