<main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/4.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Dapatkan Pekerjaan Anda</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                    <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg 
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                    </div>
                                    <h4>Filter</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Tipe Pekerjaan</h4>
                                    </div>
                                    <label class="container">Penuh
                                        <input type="checkbox" >
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Paruh Waktu
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Pekerja Lepas
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single two -->
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Lokasi</h4>
                               </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="select">
                                        <option value="">Dimanapun</option>
                                        <option value="">Jakarta</option>
                                        <option value="">Semarang</option>
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories End -->
                            </div>
                            <!-- single three -->
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <span></span>
                                            <!-- Select job items start -->
                                            <div class="select-job-items">
                                                <span>Urutkan</span>
                                                <select name="select">
                                                    <option value="">None</option>
                                                </select>
                                            </div>
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                                <?php
                                require 'vendor/autoload.php';

                                EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
                                EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
                                EasyRdf\RdfNamespace::set('dc', 'http://purl.org/dc/elements/1.1/');
                                EasyRdf\RdfNamespace::set('jbv', 'http://www.jobvacancy.fakeurl.com/vocab#');

                                $newturtle = new \EasyRdf\Graph("https://salsabilarhdsy.github.io/semantic-web-data/job_vacancy.ttl");
                                $newturtle ->load();

                                $jobvacancy = $newturtle->resourcesMatching('dc:title');

                                $i = 0;

                                foreach($jobvacancy as $n){
                                    $title[$i] = $newturtle->get($n, 'dc:title');

                                    // company
                                    $company[$i] = $newturtle->get($n, 'jbv:company');
                                    $c_name = $newturtle->get($company[$i], 'rdf:about');

                                    $type[$i] = $newturtle->get($n, 'dc:type');
                                    $area[$i] = $newturtle->get($n, 'jbv:area');
                                    $salary[$i] = $newturtle->get($n, 'jbv:salary');
                                    $image[$i] = $newturtle->get($n, 'jbv:image');
                                    $id = $i;

                                ?>
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img width="100px" src="<?=$image[$i]?>" alt=""></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="cdetail.php?id=<?=$id?>">
                                                <h5><?=$title[$i]?></h5>
                                            </a>
                                            <ul>
                                                <li><?=$c_name?></li>
                                            </ul>
                                            <ul>
                                                <li><i class="fas fa-map-marker-alt"></i><?=$area[$i]?></li>
                                            </ul>
                                            <ul>
                                            <li><?=$salary[$i]?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="cdetail.php?id=<?=$id?>"><?=$type[$i]?></a>
                                    </div>
                                </div>
                                <?php
                                    $i++;
                                }
                                ?>
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        
    </main>