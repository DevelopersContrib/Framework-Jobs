<?php  
    include('header.php');
?>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php include('navigation.php');?>
        </div>
        <div class="section-wrap-all">
            <div class="container theme-showcase" role="main">
                <?php include('search.php');?>    
                <div class="row">
                    <div class="wrap-SearchJobRslt">
                        <div class="col-lg-12">
                            <a class="ftre-style1-link ellipsis" href="javascript:void();">Have an amazing team that is hiring? Setup your team's profile.</a>
                        </div>
                        <div class="col-lg-12">
                        <?php for ($i=0;$i<count($sites);$i++):?>
                            <div class="col-lg-6 ftrsMarg">
                                <div class="wrapContFtr">
                                    <a class="ribbonS1" href="javascript:void();">
                                        <span>Join Us</span>
                                    </a>
                                    <header>
                                        <a class="ftrHeader-link" href="/site/<?php echo $sites[$i]['domain']?>">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-2">
                                                        <div class="avatar">
                                                            <?php if ($sites[$i]['logo'] != ""):?>
                                                               <img src="<?php echo $sites[$i]['logo']?>" class="img-responsive" style="width:120;height:120;">
                                                              <?php else:?>
                                                               <img src="https://coderwall-assets-0.s3.amazonaws.com/uploads/team/avatar/506aaf07eeffe10012000001/Centralway-logo-retina-120x120.png" class="img-responsive">
                                                            <?php endif;?>   
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tlteContent">
                                                            <h2><?php echo ucfirst($sites[$i]['domain'])?></h2>
                                                            <h3>
                                                              <?php echo stripcslashes($sites[$i]['description'])?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </header>
                                    <div class="imgFtr">
                                        <a href="/site/<?php echo $sites[$i]['domain']?>">
                                            <img alt="Team-default" src="<?php echo $sites[$i]['image']?>" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="contentDescFtrMain">
                                        <div class="infoChild">
                                            <h3>
                                                <i class="fa fa-suitcase"></i>
                                                Open opportunities
                                            </h3>
                                            <ul class="list-inline">
                                               <?php $j = explode(',',$sites[$i]['jobs']);?>
                                               <?php if (count($j)>0):?>
                                                  <?php for ($k=0;$k<count($j);$k++):?>
                                                    <?php if ($k < 2):?>
	                                                <li>
	                                                    <a href="javascript:void();">
	                                                        <i class="fa fa-angle-double-right"></i>
	                                                        <?php echo $j[$k]?>
	                                                    </a>
	                                                </li>
	                                                <?php endif?>
	                                               <?php endfor;?> 
	                                           <?php endif;?> 
                                               
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <footer>
                                            <h4 class="location">Team Members</h4>
                                            <span class="more-members">
                                               <?php   $members = $sites[$i]['members'];?>
                                                +<?php echo count($members)?>
                                            </span>
                                            <ul class="members list-inline">
                                            <?php 
                                             
                                               if (count($members) > 0):
                                                  $m =0;
                                                   foreach($members as $mkey=>$mval):
                                                   if ($m < 3):
                                            ?>
                                                <li><a href="javascript:void();" class="record-exit">
                                                        <img alt="<?php echo $mval['firstname']." ".$mval['lastname']?>" src="http://www.contrib.com/img/timthumb.php?src=<?php echo $mval['picture']?>&w=100&h=100" class="img-responsive">
                                                    </a>
                                                </li>
                                                   <?php endif;?>
                                                <?php $m++;?>
                                                <?php endforeach;?>
                                              <?php endif;?>  
                                              
                                            </ul>
                                        </footer>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        <?php endfor;?>    
                        </div>
                    </div>
                </div>
            </div> <!-- /container -->
        </div>
       <?php include ('footer.php')?>