<div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo BASE_URL?>"><?php echo ucfirst($info['domain']) ?></a>
                </div>
                <div class="navbar-collapse collapse pull-right">
                    <ul class="nav navbar-nav">
                        <li <?php if ($page == "about") echo 'class="active"'?>><a href="<?php echo BASE_URL?>about">About</a></li>
                        <li <?php if ($page == "team") echo 'class="active"'?>><a href="<?php echo BASE_URL?>">Teams</a></li>
                        <li <?php if ($page == "jobs") echo 'class="active"'?>><a href="<?php echo BASE_URL?>jobs/search">Jobs</a></li>
                        <li <?php if ($page == "contact") echo 'class="active"'?>><a href="<?php echo BASE_URL?>contact">Contact</a></li>
                        <li <?php if ($page == "makemoney") echo 'class="active"'?>><a href="<?php echo BASE_URL?>referral">Make Money</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>