<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/cute-clipart/64/000000/image-gallery.png">
</head>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="main.css">

<body>
    <!--    <div class="container">-->
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="nav-img" src="https://img.icons8.com/cute-clipart/64/000000/image-gallery.png" alt="" width="30" height="24" class="d-inline-block align-top">
                iPhotos
            </a>
        </div>
    </nav>
    <div class="row1">
        <div class="align">
            <a href="https://github.com/amr-coding" class="close-btn"><i class="fas fa-times-circle"></i></a>
            <h1 class="headText" style="text-align:center">iPhotos Upload</h1>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <div class="custom-file">
                    <input type="file" class="custom-file-input custom" id="customFile" name="img[]" id="fileToUpload" multiple accept="image/*" required>
                    <label class="custom-file-label" for="customFile">Choose file or drag and drop here</label>
                </div>
                <div class="submot">
                    <button class="btn btn-success subBtn"><input type="submit" class="btn btn-success subBtn" value="Upload Image" name="submit"><i class="fas fa-cloud-upload-alt"></i></button>
                </div>

                <?php
        if (!file_exists("assets")){
            mkdir("assets");
        }else {
        }
        
        
        
        if(isset($_FILES["img"])){
            
            $img_size = $_FILES["img"]['size'];     
            $img_type = $_FILES["img"]["type"];
            $img_errors = $_FILES["img"]["error"];
            $tmpName = $_FILES['img']['tmp_name'];
            function random_string($length) {
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));
            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }
                return $key;
            }
            
            $total = count($_FILES['img']['name']);
            
//            echo "You have selected: " .$total." files";
            $tdy = date("[M-D-Y]");
        
            
            for($i=0;$i<$total;$i++){
                $img_name = $_FILES["img"]['name'][$i];
                $ext = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_rename ="assets/".rand().$tdy." - iPhotos".".".$ext;

//                echo $img_rename;
//                $img_rename = rand().".".$ext;
//                echo $img_rename;
                
            if($img_size > 1000){
                move_uploaded_file($tmpName[$i],$img_rename);
                $link = realpath($img_rename);
                echo"<h5 class='uploaded'>Picture uploaded successfully</h5> </br>";

//                echo"Picture link: "."<textarea id='w3review'>{$link}</textarea>"."</br>";
                echo"<h4>Files ".$i."/".$i."</h4></br>";
                echo "<img src='{$img_rename}'  id='imgs' class='review rounded mx-auto d-block' width='500'>";
                echo "<br>";
                echo "<div>";
                echo "<h3> Click to copy the link <i class='far fa-clipboard'></i> </h3>";
                echo '<form   class="form-floating">';
                echo '<input type="email"';
                echo 'class="form-control copy"';
                echo 'id="floatingInputGrid"';
                echo 'placeholder="link"'; 
                echo "value='{$link}' readonly onclick='copyLink(this)'>";
                
                echo"</form>"; 
                echo '</div>';
                
            }else{
                echo "File excceded the size limit";
                echo "<br>";
            }
                
        }
            echo "<div class='container made'>"; 
            echo "<p >made with <i class='fas fa-heart'></i> by Amr Ahmed</p>";
            echo "</div>";
    }

        ?>
            </form>
        </div>
    </div>

    <!--    </div>-->
    <div class="container">
        <!--
<div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
-->
    </div>
    <script src="/js/main.js"></script>
</body>

</html>
]
