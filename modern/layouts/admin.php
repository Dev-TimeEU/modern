<!DOCTYPE html>
<html>
    <head>
        <title><?= $title; ?> - <?= $name_site; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?= $description; ?>">
        <meta name="author" content="KilioZ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?= $domain_url; ?>application/views/themes/default/assets/admin/css/uikit.min.css" />
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="<?= $domain_url; ?>application/views/themes/default/assets/admin/css/style.css" />
        <link rel="stylesheet" href="<?= $domain_url; ?>application/views/themes/default/assets/admin/css/notyf.min.css" />
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	    <script src="<?= $domain_url; ?>application/views/themes/default/assets/admin/js/uikit.min.js" ></script>
		<script src="<?= $domain_url; ?>application/views/themes/default/assets/admin/js/uikit-icons.min.js" ></script>
    </head>
    <body>
    <body>
        <div uk-sticky class="uk-navbar-container tm-navbar-container uk-active">
            <div class="uk-container uk-container-expand">
                <nav uk-navbar>
                    <div class="uk-navbar-left">
                        <a id="sidebar_toggle" class="uk-navbar-toggle" uk-navbar-toggle-icon ></a>
                        <a href="<?= $domain_url; ?>" class="uk-navbar-item uk-logo">
                            <?= $name_site; ?>
                        </a>
                    </div>
                    <div class="uk-navbar-right uk-light">
                        <ul class="uk-navbar-nav">
                            <li class="uk-active">
                                <a href="#"><?= $user['username']; ?> &nbsp;<span class="ion-ios-arrow-down"></span></a>
                                <div uk-dropdown="pos: bottom-right; mode: click; offset: -17;">
                                   <ul class="uk-nav uk-navbar-dropdown-nav">
                                       <li><a href="<?= $domain_url; ?>logout"><?= $this->lang->line('logout'); ?></a></li>
                                   </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div id="sidebar" class="tm-sidebar-left uk-background-default">
            <center>
                <div class="user">
                    <div class="uk-margin-top"></div>
                    <div id="name" class="uk-text-truncate"><?= $user['username']; ?></div>
                    <div id="email" class="uk-text-truncate"><?= $user['email']; ?></div>
                </div>
                <br />
            </center>
            <ul class="uk-nav uk-nav-default">

                <li class="uk-nav-header">
                    <?= $this->lang->line('admin'); ?>
                </li>
				<li><a href="<?= $domain_url; ?>admin"><?= $this->lang->line('admin'); ?></a></li>
                <li><a href="<?= $domain_url; ?>admin/projects"><?= $this->lang->line('projects'); ?></a></li>
                <li><a href="<?= $domain_url; ?>admin/experiences"><?= $this->lang->line('experiences'); ?></a></li>
                <li><a href="<?= $domain_url; ?>admin/skills"><?= $this->lang->line('skills'); ?></a></li>
                <li><a href="<?= $domain_url; ?>admin/navigations"><?= $this->lang->line('menu'); ?></a></li>
                <li><a href="<?= $domain_url; ?>admin/themes"><?= $this->lang->line('themes'); ?></a></li>
            </ul>
        </div>	
     	<?php $this->load->view($content);?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js" integrity="sha256-UGwvyUFH6Qqn0PSyQVw4q3vIX0wV1miKTracNJzAWPc=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.12/jquery.transit.min.js" integrity="sha256-rqEXy4JTnKZom8mLVQpvni3QHbynfjPmPxQVsPZgmJY=" crossorigin="anonymous"></script>
		<script src="<?= $domain_url; ?>application/views/themes/default/assets/admin/js/notyf.min.js"></script>
		<!-- Required Overall Script -->
        <script src="<?= $domain_url; ?>application/views/themes/default/assets/admin/js/script.js"></script>
		<!-- Status Updater -->
		<script src="<?= $domain_url; ?>application/views/themes/default/assets/admin/js/status.js"></script>
		<!-- Sample Charts -->
		<script src="<?= $domain_url; ?>application/views/themes/default/assets/admin/js/charts.js"></script>
    </body>
</html>