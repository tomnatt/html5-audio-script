<!doctype html public "✰">
<head>
    <meta charset="utf-8">
    <title>Audio files</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }
    </style>

</head>
<body>

<?php 

$path = ".";
$file = "";
if (isset($_GET["file"])) {
    $file = urldecode($_GET["file"]);
}

// put a player a the top if we're given a valid files
if (isset($_GET["file"]) && !preg_match("/\//", $file)) {

    // check the file is actually in here
    $dir_handle = @opendir($path) or die("Unable to open $path");
    while ($f = readdir($dir_handle)) {
        if (preg_match("/" . $file . "$/", $f)) {
            // if the file actually exists output an audio tag
?>
            <h2><?php echo $file; ?></h2>
            <audio controls="controls" autoplay="autoplay">
                <source src="<?php echo $file; ?>" type="audio/mp3" />
                Your browser does not support the audio tag.
            </audio>
<?php
        }
    }
}

?>

<h2>Audio files</h2>

<ul>

<?php

// process the dir
$dir_handle = @opendir($path) or die("Unable to open $path");
while ($file = readdir($dir_handle)) {

    if (preg_match("/\.mp3$/", $file)) {
        
        echo '<li><a href="?file=' . urlencode($file) . '">' . $file . '</a></li>';
        
    }
    
}

?>

</ul>

</body>
</html>
