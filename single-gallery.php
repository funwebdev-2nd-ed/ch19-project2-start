<?php

include 'includes/art-config.inc.php';

$default = 30;
if (isset($_GET['id']) && ! empty($_GET['id'])) {
    $default = $_GET['id'];
}
try {
    
    $gallerydb = new GalleryDB($connection);
    $gallery = $gallerydb->findById($default);
    
    $paintingdb = new PaintingDB($connection);
    $paintings = $paintingdb->getAllForGallery($default);
    
    // get data from flickr
    
}
catch (PDOException $e) {
   die( $e->getMessage() );
}



?>

<!DOCTYPE html>
<html lang=en>
<head>
    <title>Chapter 19</title>
<meta charset=utf-8>
    <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    <!-- Add your own Google API key -->
    <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=add google api key here&libraries=places'></script>    
    <script src="css/semantic.js"></script>
    <script src="js/misc.js"></script>
  
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
    
    <style>
    #map {
        height:500px;
        width: 100%;
        }
    </style>  
    
<script>

</script>    
    
</head>
<body >
    
<?php include 'includes/art-header.inc.php'; ?>
    
<main >
    
    <section class="ui segment grey100">
        <div class="ui doubling stackable grid container">
            <div class="three wide column">
                <h1><?php echo $gallery['GalleryName']; ?></h1>
                <p><?php echo $gallery['GalleryCity'] . ', ' . $gallery['GalleryCountry']; ?> </p>
                <p><a href="<?php echo $gallery['GalleryWebSite'] ?>">Gallery Website</a> </p>
                
                <h4>Flickr Feed</h4>
                <div class="ui mini images">
                    <?php
                    
                    // output flickr images
      
                    ?>
                    
                </div>
            </div>
            <div class="thirteen wide column">
              
                <div id="map"></div>
                
            </div>            
        </div>                
    </section>
    <div class="ui hidden divider"></div>
    
    
    <!-- Tabs for Description, On the Web, Reviews -->
    <section class="ui doubling stackable grid container">
        <div class="sixteen wide column">
        
            <div class="ui top attached tabular menu ">
              <a class="active item" data-tab="first">Paintings at the <?php echo $gallery['GalleryName']; ?></a>
              <a class="item" data-tab="second">Google Photos</a>
              <a class="item" data-tab="third">Google Reviews</a>
            </div>
            <div class="ui bottom attached active tab segment" data-tab="first">

                    <div class="ui six doubling cards ">

                        <?php foreach ($paintings as $work) { ?>
               
                            <div class="ui fluid card">
                                <a href="single-painting.php?id=<?php echo $work['PaintingID']; ?>">
                                <div class="ui fluid image">
                                    <img src="images/art/works/square-medium/<?php echo $work['ImageFileName']; ?>.jpg">
                                </div>
                                </a>
                            </div>
            
                        <?php } ?>
                        
                            
                    </div>
            </div>
            <div class="ui bottom attached tab segment" data-tab="second">

                <div class="ui images" id="placeImages"></div>

            </div>
            <div class="ui bottom attached tab segment" data-tab="third">

                <div class="ui comments" id="placeReviews"></div>

            </div>            
         
        
        </div>        
    </section>     
    

</main>    
    
  <footer class="ui black inverted segment">
      <div class="ui container">footer</div>
  </footer>
</body>
</html>    