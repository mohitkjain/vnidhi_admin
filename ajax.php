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
    if($action == "incentive_session")
    {
        $_SESSION['pay_user_id'] = $_POST['user_id'];
        $_SESSION['pay_usertype'] = $_POST['usertype'];
        $_SESSION['pay_month'] = $_POST['month'];
        $_SESSION['pay_year'] = $_POST['year'];
        $_SESSION['pay_username'] = $_POST['user_name'];
        $_SESSION['pay_position'] = $_POST['position'];
        $_SESSION['pay_incentive'] = $_POST['incentive'];
        $_SESSION['pay_monthName'] = $_POST['monthName'];
    }
?>