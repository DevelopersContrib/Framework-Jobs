<?php  
    include 'header.php';
?>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php include('navigation.php');?>
        </div>
        
        <div class="container thirdPadTop">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="cntrContnt">
                                <div class="wrapHeaderThird thirdPaddMarg">
                                    <h3 class="list-group-item-heading"><?php echo $job['title']?></h3>
                                </div>
                                <div class="thirdPaddMarg">
                                    <p class="list-group-item-text">
                                        <?php echo stripcslashes($job['description'])?>
                                    </p>
                                    <h4>Other Opportunities At <?php echo ucfirst($site)?></h4>
                                    <p class="other-opp">
                                          <?php if (count($other_jobs)>0):?>
                                          <?php foreach ($other_jobs as $key=>$val):?>
                                            <?php if ($val['job_id'] != $job['job_id']):?>
	                                         <a href="<?php echo BASE_URL?>jobs/details/<?php echo $val['slug']?>/<?php echo $val['job_id']?>"><?php echo $val['title']?></a>
	                                        <?php endif;?>
	                                      <?php endforeach;?>  
                                        <?php endif?>
                                    </p>
                                    <div class="row text-center">
                                        <button class="btn btn-lg btn-primary" type="button">Learn More</button>
                                        <a class="text-center" style="display:block; margin-top:10px; margin-bottom:-20px;" href="<?php echo BASE_URL?>jobs/joblist/<?php echo $site?>">View Amazing Jobs</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <header class="team-header">
                                <div class="col-lg-2">
                                    <div class="team-logo">
                                       
                                       <?php if ($info['logo']!= ""):?>
                                       <img src="<?php echo $info['logo']?>" alt="" class="img-responsive" />
                                            <?php else:?>
                                            <img src="https://coderwall-assets-0.s3.amazonaws.com/uploads/team/avatar/4f6909d08512b4000d00000d/icon_moon_rgb_128.png" alt="" class="img-responsive" />
                                       <?php endif?>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <h1 class="list-group-item-heading"><?php echo ucfirst($site)?></h1>
                                </div>
                                <div class="col-lg-5">
                                    <div class="margTopFllw">
                                        <a href="#" class="follow-team add-to-network noauth">Follow</a>
                                        <ul class="connections list-inline pull-right">
                                            <li>
                                                <a href="" alt="<?php echo BASE_URL?>" data-target-type="company-website" target="new" class="url record-exit"></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $social['twitter']?>" alt="On Twitter" data-target-type="company-twitter" target="new" class="twitter record-exit"></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $social['facebook']?>" alt="On Facebook" data-target-type="company-facebook" target="new" class="facebook record-exit"></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $social['github']?>" alt="On GitHub" data-target-type="company-github" target="new" class="github record-exit"></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </header>
                            <div class="join-us-banner">
                                <p class="list-group-item-text ellipsis">
                                    <i class="fa fa-suitcase hidden-xs"></i>
                                    <span class="hidden-xs">Come build great software with us</span>
                                    <a href="<?php echo BASE_URL?>jobs/joblist/<?php echo $site?>" class="btn btn-info">VIEW JOBS</a>
                                </p>
                            </div>
                            <div class="wrapAllSectionThird">
                                <section class="team-details secsMarg">
                                    <div class="switch-section">
                                        <p style="color:#5eb0de"><?php echo stripcslashes($info['description'])?></p>
                                    </div>
                                </section>
                                <section class="members">
                                    <ul class="list-inline">
                                       <?php   if (count($members) > 0):?>
                                          <?php    foreach($members as $mkey=>$mval):?>
	                                        <li>
	                                            <a href="#tab1">
	                                            <img alt="dsiebel" src="http://www.contrib.com/img/timthumb.php?src=<?php echo $mval['picture']?>&w=120&h=120" class="avatar">
	                                            <span><?php echo $mval['firstname']." ".$mval['lastname']?></span>
	                                            <span><?php echo $mval['role']?></span>
	                                            </a>
	                                        </li>
	                                      <?php endforeach;?>  
                                       <?php endif;?> 
                                    </ul>
                                </section>
                            </div>
                            <div class="wrapSectionFeatureImage">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="member-details" >
                                                <h3><?php echo $members[0]['firstname']." ".$members[0]['lastname']?></h3>
                                                <p class="about-text"><?php echo $members[0]['role']?>. <?php echo $members[0]['summary']?></p>
                                                <a href="/andygrunwald" data-target-type="team-member profile" class="view-profile record-exit">
                                                    <i class="fa fa-bullseye"></i>
                                                    View Profile
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="member-pic text-center" >
                                                <img class="img-responsive" alt="Germany" src="https://d3levm2kxut31z.cloudfront.net/assets/locations/Germany-d410e89a8d592909a36385ae436543bf.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="big-headline">
                                <h3 class="headline">
                                    <?php echo stripcslashes($info['description'])?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php include ('footer.php')?>
