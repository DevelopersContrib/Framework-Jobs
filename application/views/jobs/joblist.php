<?php  
    include 'header.php';
?>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php include('navigation.php');?>
        </div>
        
        <div class="wrapPage2All">
            <div class="container margDown">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <h2 class="pageTitle"><?php echo ucfirst($site)?> Jobs</h2>
                        </div>
                        <div class="col-md-6">
                            <p class="com-value">Starting at $99 for 30 days&nbsp;&nbsp;<button class="btn btn-lg btn-primary" type="button">Post A Job</button></p>
                            <p class="com-desc">Jobs at companies attracting the best developers to help them solve unique challenges in an awesome environment.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="wrapSecondSectn">
                <div class="container margNgtvUp">
                    <div class="row">
                       <?php if (count($other_jobs)>0):?>
                         <?php foreach ($other_jobs as $key=>$val):?>
                        <div class="col-lg-12 whteS1">
                            <div class="row">
                                <a href="<?php echo BASE_URL?>jobs/details/<?php echo $val['slug']?>/<?php echo $val['job_id']?>">
                                    <div class="col-lg-8 bckgrnds1">
                                        <h3><?php echo $val['title']?></h3>
                                        <p>
                                            <?php echo $val['category']?>
                                        </p>
                                        <p>
                                           <?php echo stripcslashes($val['summary'])?>
                                        </p>
                                    </div>
                                </a>
                                <div class="col-lg-4 rght4s1">
                                    <p class="team ellipsis">
                                      <?php if ($val['logo'] != ""):?>
                                      <img src="<?php echo $val['logo']?>" class="team-logo" style="height:100px;width:100px;">
                                         <?php else:?>
                                         <img src="https://coderwall-assets-0.s3.amazonaws.com/uploads/team/avatar/4f6909d08512b4000d00000d/icon_moon_rgb_128.png" class="team-logo"> 
                                      <?php endif;?>
                                        <?php echo ucfirst($val['domain'])?>
                                    </p>
                                    <p class="location"> <i class="fa fa-map-marker"></i> <?php echo $val['domain_category']?></p>
                                    <p class="tagline">
                                        <?php echo $val['domain_title']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                      <?php endif?>  
                        
                   
                    </div>
                </div>
            </div>
        </div>
              <?php include ('footer.php')?>
