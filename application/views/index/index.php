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
                                        <a class="ftrHeader-link" href="javascript:void();">
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
                                        <a href="javascript:void();">
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
                                                +26
                                            </span>
                                            <ul class="members list-inline">
                                                <li><a href="javascript:void();" class="record-exit">
                                                        <img alt="timd" src="https://secure.gravatar.com/avatar/26e169fdf6206a9ca0c300956c7dcdc2?d=https://d3levm2kxut31z.cloudfront.net/assets/blank-mugshot-112e2e92d74b7344b8be3630bbccc5da.png" class="img-responsive">
                                                    </a>
                                                </li>
                                                <li><a href="javascript:void();" class="record-exit">
                                                        <img alt="slawosz" src="https://secure.gravatar.com/avatar/c544188078900e5d5976689949177f11?d=https://d3levm2kxut31z.cloudfront.net/assets/blank-mugshot-112e2e92d74b7344b8be3630bbccc5da.png" class="img-responsive">
                                                    </a>
                                                </li>
                                                <li><a href="javascript:void();" class="record-exit">
                                                        <img alt="jjperezaguinaga" src="https://secure.gravatar.com/avatar/83d1df6d5c943263fa0861c8aaf7d7cb?d=https://d3levm2kxut31z.cloudfront.net/assets/blank-mugshot-112e2e92d74b7344b8be3630bbccc5da.png" class="img-responsive">
                                                    </a>
                                                </li>
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
        <div class="panel-footer">
            <ul class="nav navbar-nav">
                <li><a href="#">Discover</a></li>
                <li><a href="#about">Teams</a></li>
                <li class="active"><a href="#contact">Jobs</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#sigin">Privacy Policy</a></li>
                <li><a href="#signup">Terms of Service</a></li>
            </ul>
            <div style="clear:both"></div>
            <p class="credits">Copyright @ 2014 Coder Wall. All rights reserved.</p>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>