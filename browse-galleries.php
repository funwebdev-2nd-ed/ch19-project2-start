<?php

include 'includes/art-config.inc.php';

$db = new GalleryDB($connection);
$galleries = $db->getAll();

?>

<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
  
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
    
    
</head>
<body >
    
<?php include 'includes/art-header.inc.php'; ?>
    
<main >
    <section class="ui" style="background: url(images/banner1.jpg); height: 100px; padding: 20px">
        <div class="ui container">
            <h1 class="ui header">Genres</h1>
        </div>        
    </section>
    
    <section class="ui basic segment container">

        <div class="ui large relaxed divided list">
          <?php foreach ($galleries as $gallery) { ?>
    
            <div class="item">
                <i class="large marker middle aligned icon"></i>
                <div class="content">
                    <a href="single-gallery.php?id=<?php echo $gallery['GalleryID']; ?>" class="header">
                        <?php 
                        if ($gallery['GalleryName'] === $gallery['GalleryNativeName'])
                            echo $gallery['GalleryName'];
                        else 
                            echo $gallery['GalleryName'] . ' [' . $gallery['GalleryNativeName'] . ']';

                        ?> 
                    </a>
                    <div class="description"><?php echo $gallery['GalleryCity'] . ', ' . $gallery['GalleryCountry']; ?></div>
                </div>
            </div>
    
          <?php } ?>            
        </div>

    </section>    
</main>    
    
  <footer class="ui black inverted segment">
      <div class="ui container">footer</div>
  </footer>
</body>
</html>    