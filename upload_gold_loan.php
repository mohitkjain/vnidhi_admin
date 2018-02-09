<?php

if(is_array($_FILES)) 
{
    if(is_uploaded_file($_FILES['gold_image']['tmp_name'])) 
    {
        $filename = $_FILES["gold_image"]["name"];
        $file_basename = substr($filename, 0, strripos($filename, '.')); // get file name
        $file_ext = substr($filename, strripos($filename, '.')); // get file ext
        $timestamp = $_POST["timestamp"];
        $newfilename = $file_basename.'_'.$timestamp.$file_ext;

        $sourcePath = $_FILES['gold_image']['tmp_name'];

        $targetPath = "uploaded_images/gold_images/".$newfilename;
        $types = array('image/jpeg', 'image/gif', 'image/png', 'image/jpg');
        if (in_array($_FILES['gold_image']['type'], $types)) 
        {
            if(move_uploaded_file($sourcePath,$targetPath)) 
            {
?>
               <img class="image-preview" src="<?php echo $targetPath; ?>" class="upload-preview" id="gold_loan_image_tag" width="25%" />
<?php
            }
        }
        else
        {
            echo 'wrong extension';
        }
    }
}
?>