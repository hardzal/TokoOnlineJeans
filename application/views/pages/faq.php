

<div class="container">
    <div class=" p-1" style="margin-top: 50px;">
        <h2 style="letter-spacing: 6px;" class="text-center">FAQ</h2>
        <h3 class="text-center">Frequently Asked Question</h3>
        <hr>
    <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12"> -->
        <div class="accrodion-regular mb-5">
            <!-- <div id="accordion4"> -->
                <?php foreach ($faqs as $row) : ?>
                <div class="card my-2">
                    <div class="card-header" id="headingTen">
                        <h5 class="mb-0">
                           <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                             <span class="fas fa-angle-down mr-3"></span><?php echo $row->question; ?>
                           </button>
                          </h5>
                    </div>
                    <div id="collapseTen" class="collapse show" aria-labelledby="headingTen" data-parent="#accordion4">
                        <div class="card-body">
                            <!-- <p class="lead"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</p> -->
                            <p> <?php echo $row->answer; ?></p>
                            <!-- <a href="#" class="btn btn-secondary">Go somewhere</a> -->
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <!-- <div class="card my-2">
                    <div class="card-header" id="headingEleven">
                        <h5 class="mb-0">
                           <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                             <span class="fas fa-angle-down mr-3"></span>Pertanyaan Kedua
                         </button>       </h5>
                    </div>
                    <div id="collapseEleven" class="collapse show" aria-labelledby="headingEleven" data-parent="#accordion4">
                        <div class="card-body">
                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-header" id="headingTwelve">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                 <span class="fas fa-angle-down mr-3"></span>Pertanyaan Ketiga
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwelve" class="collapse show" aria-labelledby="headingTwelve" data-parent="#accordion4">
                        <div class="card-body">
                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-tabhetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->
        </div>
    <!-- </div> -->
    </div>
</div>