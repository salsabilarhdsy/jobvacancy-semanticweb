    <!-- Header -->


    <!-- Carousel -->
    </br>
    </br>
    </br>
    </br>
    <!-- Akhir Carousel -->
    <!-- content -->
    <div class="container">
        <br>
        <h3>Our Rooms</h3>
        <p class="text-black-50">Fill the Comfort</p>
        <br>
        <?php
        require '../vendor/autoload.php';

        EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        EasyRdf\RdfNamespace::set('dc', 'http://purl.org/dc/elements/1.1/');
        
        $newrdf = new \EasyRdf\Graph("https://tamir3232.github.io/rdf/hotell.rdf");
        $newrdf ->load();
        
        $hotels = $newrdf->resourcesMatching('dc:type');
        
        $i = 0;
        
        foreach($hotels as $hotel) {
            $type[$i]   = $newrdf->get($hotel,'dc:type');
            $price[$i]  = $newrdf->get($hotel,'dc:price');
            $review[$i]  = $newrdf->get($hotel,'dc:review');
            $guest[$i] = $newrdf->get($hotel,'dc:guest');
            $description[$i]  = $newrdf->get($hotel,'dc:description');
            $image[$i]    = $newrdf->get($hotel,'dc:image');


        ?>
        <div class="row bg-white mb-5 p-3 pb-4">
            <h4><?=$type[$i]; ?></h4>
            <div class="col-md-4">
                <img src="<?=$image[$i]; ?>" width="300px" alt="">
            </div>
            <div class="col-md-5">

                <div class="row">
                    <div class="col-md-6"><img src="assets/img/org.png" width="50px" alt="">
                        <p style="display: inline-block; margin-left:5px"><?=$guest[$i]; ?> Guest</p>
                    </div>
                    <div class="col-md-6"><img src="assets/img/rate.png" width="35px" alt="">
                        <p style="display: inline-block; margin-left:5px; margin-top:10px;"><?=$review[$i]; ?></p>
                    </div>
                    <hr>
                    <div>
                        <p><?=$description[$i]; ?></p>
                    </div>
                </div>

            </div>
            <div class="col-md-3" align="right">
                <br><br>
                <h4 class="text-warning"><?=$price[$i]; ?>,-</h4>
                <p class="text-black-50">/room/night</p>
                <a href="#">
                    <button class="btn btn-warning text-white" style="width: 160px;">Book Now</button>
                </a>
            </div>
        </div>
        <?php
        $i++;}
        ?>
    </div>
    