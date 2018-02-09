<?php

if(is_array($_FILES)) 
{
    if(is_uploaded_file($_FILES['customer_image']['tmp_name'])) 
    {
        $filename = $_FILES["customer_image"]["name"];
        $file_basename = substr($filename, 0, strripos($filename, '.')); // get file name
        $file_ext = substr($filename, strripos($filename, '.')); // get file ext
        $timestamp = $_POST["timestamp"];
        $newfilename = $file_basename.'_'.$timestamp.$file_ext;
        $sourcePath = $_FILES['customer_image']['tmp_name'];

        $targetPath = "uploaded_images/customer/". $newfilename;
        $types = array('image/jpeg', 'image/gif', 'image/png', 'image/jpg');
        if (in_array($_FILES['customer_image']['type'], $types)) 
        {
            if(move_uploaded_file($sourcePath,$targetPath)) 
            {
               echo '<img src="'. $targetPath.'"  id="cust_image_tag" width="25%" >';
            }
        }
        else
        {
            echo 'wrong extension';
        }
    }
}
?>