<!DOCTYPE html>
<html lang="en">  
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
 <?php
  // Check if files exist
  if(!empty($files)) {
    // Loop through the files array
    foreach($files as $file) {
      // Output the video player for each file
      echo "<video width='320' height='240' controls>
                <source src='{$file}' type='video/webm'>
            </video>";
      }
  }else {
      echo "<p>No video files found</p>";
  }
 ?>
</body>
</html>