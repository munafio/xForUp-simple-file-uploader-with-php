<?php 
// hide all php error reporting 
error_reporting(E_ALL ^ E_NOTICE);
// ========================= [ PHP code ] ============================
$fileName = $_FILES["fileToUpload"]["name"];
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"];
$fileType = $_FILES["fileToUpload"]["type"];
$fileSize = $_FILES["fileToUpload"]["size"]; 
$fileErrorMsg = $_FILES["fileToUpload"]["error"];
$fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); 
$kaboom = explode(".", $fileName);
$fileExt = end($kaboom);
$fileName = time().rand().".".$fileExt;

// ===================== [ allowed types in array ] ==========================
$types = array(
"jpg",
"aep",
"iso",
"bmp",
"mp3",
"mp4",
"ico",
"wma",
"avi",
"rpm",
"deb",
"txt",
"rtf",
"jpg",
"rar",
"zip",
"png",
"pdf",
"jpeg",
"gif",
"psd",
"wmv",
"mp2",
"xml",
"7z",
"tgz",
"bz2",
"torrent",
"zipx",
"gz",
"xls",
"dotx",
"dcr",
"mov",
"pdb",
"css",
"msi",
"exe",
"run",
"tar",
"taz",
"xlsx",
"sql",
"apk",
"webm",
"ini",
"svg",
"ram",
"3gp");
 // if upload button clicked
if (!$fileTmpLoc) {
    echo "<p class='msg_error'>Please select an image and then try again! </p>";
    exit();
    // if file size more than 2Gb
} else if($fileSize > 222042880000) {
    echo "<p class='msg_error'>Your image must be less than 2GB of size.</p>"; 
    unlink($fileTmpLoc); 
    exit();
    // if file type or format not in allowed ftypes array
} else if (in_array($fileType, $types)) {  
    echo "<p class='msg_error'>File format not allowed!!</p>"; 
     unlink($fileTmpLoc);
     exit();
     // check if there is some error in uploading files 
} else if ($fileErrorMsg == 1) {
    echo "<p class='msg_error'>An error occured while processing the image. Try again.</p>"; 
    exit();
}
// do uploading operation if there are no error happened
$moveResult = move_uploaded_file($fileTmpLoc, "../up/$fileName");
// check if uploading success
if ($moveResult) {
    ?>
    <div class='msg_success'>
    File uploaded successfully 
    <p style='padding:15px;background:#fff;color:#999;border-radius:3px;'><a href="<?php echo 'up/download?f_type='.$fileType.'&f_name='.$fileName; ?>">Click to download the file or right click to copy it</a></p>
    *Please copy and save this link to be able to download your file anytime.
    </div>

    <?php

// if uploading operation failed, echo this message
}else{
    echo "<p class='msg_error'>ERROR: File not uploaded. Try again.</p>"; 
    exit();
}
 ?>