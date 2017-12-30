<?php
    $action = $_POST['action'];
    session_start();
    if($action == "reset_session")
    {
        $_SESSION['reset_id'] = $_POST['id'];
        $_SESSION['reset_name'] = $_POST['name'];
    }
?>