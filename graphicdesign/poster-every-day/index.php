<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../../resources/php/db.php");

$imageDir = "../../resources/img/everyday-design/";
$fileExtension = ".jpg";
?>
<html>
    <head>
        <title>Designing a Poster every day - Eric Wätke</title>
        <link rel="stylesheet" href="/resources/css/substyle.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" name="viewport">
    </head>
    <body>
        <h1>Eric Wätke</h1>
        <a href="/" class="back">← go back</a>
        <h2>Designing a Poster every day</h2>

        <div class="gallery" itemscope itemtype="http://schema.org/ImageGallery">
            <?php
                $sql = "SELECT * FROM gallery_postereveryday";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $image = $imageDir.$row['fileName'].$fileExtension;
                        $thumbnail = $imageDir.'tn/'.$row['fileName'].$fileExtension;
                        $imageSize = getimagesize($image)[0]."x".getimagesize($image)[1];

                        echo '
                        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            <a href="'.$image.'" itemprop="contentUrl" data-size="'.$imageSize.'">
                                <img src="'.$thumbnail.'" itemprop="thumbnail" alt="Image description" />
                            </a>
                        </figure>
                        ';
                    }
                }
            ?>
        </div>
    </body>
</html>

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Schließen (ESC)"></button>
                <button class="pswp__button pswp__button--share" title="Teilen"></button>
                <button class="pswp__button pswp__button--fs" title="Vollbild"></button>
                <button class="pswp__button pswp__button--zoom" title="Rain/Raus Zoomen"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Vorheriges (Linke Pfeiltaste)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Nächstes (rechte Pfeiltaste)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="../../resources/css/photoswipe.css">
<link rel="stylesheet" href="../../resources/css/default-skin/default-skin.css">
<script src="../../resources/js/photoswipe.min.js"></script>
<script src="../../resources/js/photoswipe-ui-default.min.js"></script>

<script src="../../resources/js/initializer.js"></script>