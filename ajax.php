<?php
    $action = $_POST['action'];
    session_start();
    if($action == "reset_session")
    {
        $_SESSION['reset_id'] = $_POST['id'];
        $_SESSION['reset_name'] = $_POST['name'];
    }
    if($action == "edit_session")
    {
        $_SESSION['edit_user_id'] = $_POST['user_id'];
        $_SESSION['edit_fname'] = $_POST['fname'];
        $_SESSION['edit_lname'] = $_POST['lname'];
        $_SESSION['edit_login'] = $_POST['login'];
        $_SESSION['edit_usertype'] = $_POST['usertype'];
        $_SESSION['edit_empid'] = $_POST['empid'];
        $_SESSION['edit_position'] = $_POST['position'];
        $_SESSION['edit_tl_id'] = $_POST['tl_id'];
        $_SESSION['edit_tl_name'] = $_POST['tl_name'];
    }
?>