<main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/5.jpg">
            
        </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <?php
        $id = $_GET["id"];
        require 'vendor/autoload.php';

        EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
        EasyRdf\RdfNamespace::set('dc', 'http://purl.org/dc/elements/1.1/');
        EasyRdf\RdfNamespace::set('jbv', 'http://www.jobvacancy.fakeurl.com/vocab#');

        $newturtle = new \EasyRdf\Graph("https://salsabilarhdsy.github.io/semantic-web-data/job_vacancy.ttl");
        $newturtle ->load();
        $jobvacancy = $newturtle->resourcesMatching('dc:title');
        
        $title = $newturtle->get($jobvacancy[$id], 'dc:title');

        // about company
        $company = $newturtle->get($jobvacancy[$id], 'jbv:company');
        $c_name = $newturtle->get($company, 'rdf:about');
        $c_desc = $newturtle->get($company, 'dc:description');
        $c_industry = $newturtle->get($company, 'jbv:cIndustry');
        $c_size = $newturtle->get($company, 'jbv:cSize');


        $type = $newturtle->get($jobvacancy[$id], 'dc:type');
        $area = $newturtle->get($jobvacancy[$id], 'jbv:area');
        $salary = $newturtle->get($jobvacancy[$id], 'jbv:salary');
        $postDate = $newturtle->get($jobvacancy[$id], 'jbv:postDate');
        $descs = $newturtle->allLiterals($jobvacancy[$id], 'dc:description');
        $reqs = $newturtle->allLiterals($jobvacancy[$id], 'dc:requires');
        $image = $newturtle->get($jobvacancy[$id], 'jbv:image');

        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
        
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }

        ?>
        <div class="container mt-90">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h1 style="font-size: 50px"><?=$title?></h1>
                        </div>
                    </div>
                </div>
            </div>
        <div class="job-post-company pt-50 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-7">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="<?=$image?>" alt=""></a>
                                </div>
                                
                                <div class="job-tittle">
                                    <a href="#">
                                        </br>
                                        <h4><?=$title?></h4>
                                    </a>
                                    <ul>
                                        <li><?=$c_name?></li>
                                        <li><i class="fas fa-map-marker-alt"></i><?=$area?></li>
                                        <li><?=$salary?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <!-- job single End -->
                       
                        <div class="post-details3">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Diskripsi Pekerjaan</h4>
                                </div>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <ul>
                                   <?php 
                                   $no=1;
                                   
                                   foreach($descs as $desc) {
                                   echo "<li>";
                                   echo $no, ". ", $desc;
                                   echo "</li>";
                                   $no++;
                                   } ?>
                                </ul>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Requirements</h4>
                                </div>
                                <ul>
                                   <?php 
                                   $no=1;
                                   
                                   foreach($reqs as $req) {
                                   echo "<li>";
                                   echo $no, ". ", $req;
                                   echo "</li>";
                                   $no++;
                                   } ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-5 col-lg-5">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle" style="text-align:center">
                               <h4>Gambaran Pekerjaan</h4>
                           </div>
                           <table>
                               <tr>
                                   <th style="width:35%"> </th>
                                   <th style="width:5%"> </th>
                                   <th style="width:60%"> </thstyle=>
                               </tr>
                               <tr>
                                   <td>Tanggal Publikasi</td>
                                   <td style="text-align:center"> : </td>
                                   <td><?=tgl_indo($postDate)?></td>
                               </tr>
                               <tr>
                                   <td>Lokasi</td>
                                   <td style="text-align:center"> : </td>
                                   <td><?=$area?></td>
                               </tr>
                               <tr>
                                   <td>Tipe Pekerjaan</td>
                                   <td style="text-align:center"> : </td>
                                   <td><?=$type?></td>
                               </tr>
                               <tr>
                                   <td>Gaji</td>
                                   <td style="text-align:center"> : </td>
                                   <td><?=$salary?></td>
                               </tr>
                           </table>
                         <div class="apply-btn2 mt-20" style="text-align:center">
                            <a href="#" class="btn">Daftar Sekarang</a>
                         </div>
                       </div>
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle" style="text-align:center">
                               <h4>Informasi Perusahaan</h4>
                           </div>
                              <span><?=$c_name?></span>
                              <p style="text-align:justify"><?=$c_desc?></p>
                              <table>
                               <tr>
                                   <th style="width:25%"> </th>
                                   <th style="width:5%"> </th>
                                   <th style="width:70%"> </thstyle=>
                               </tr>
                               <tr>
                                   <td>Nama</td>
                                   <td style="text-align:center"> : </td>
                                   <td><?=$c_name?></td>
                               </tr>
                               <tr>
                                   <td height="30px">Industri</td>
                                   <td style="text-align:center"> : </td>
                                   <td style="vertical-align: bottom;"><?=$c_industry?></td>
                               </tr>
                               <tr>
                                   <td>Ukuran Perusahaan</td>
                                   <td style="text-align:center"> : </td>
                                   <td><?=$c_size?></td>
                               </tr>
                           </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>
