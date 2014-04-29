<div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php echo ucfirst($info['domain']) ?></a>
                </div>
                <div class="navbar-collapse collapse pull-right">
                    <ul class="nav navbar-nav">
                        <li <?php if ($page == "about") echo 'class="active"'?>><a href="/about">About</a></li>
                        <li <?php if ($page == "team") echo 'class="active"'?>><a href="/">Teams</a></li>
                        <li <?php if ($page == "jobs") echo 'class="active"'?>><a href="/jobs">Jobs</a></li>
                        <li <?php if ($page == "contact") echo 'class="active"'?>><a href="/contact">Contact</a></li>
                        <li <?php if ($page == "makemoney") echo 'class="active"'?>><a href="/referral">Make Money</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>