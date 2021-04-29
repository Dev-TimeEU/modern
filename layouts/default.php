<!DOCTYPE html>
<html>
    <head>
        <title><?= $title; ?> - <?= $name_site; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?= $domain_url; ?>application/views/themes/default/assets/css/uikit.min.css" />
        <script src="<?= $domain_url; ?>application/views/themes/default/assets/js/uikit.min.js"></script>
        <script src="<?= $domain_url; ?>application/views/themes/default/assets/js/uikit-icons.min.js"></script>
		<style>
    .timeline .timeline-item {
        display: flex;
        display: -ms-flexbox;
        margin-bottom: 1.2rem;
        position: relative;
    }
    .timeline .timeline-item::before {
        background: #dadee4;
        content: "";
        height: 100%;
        left: 14px;
        position: absolute;
        top: 30px;
        width: 2px;
    }
    .timeline .timeline-item .timeline-left {
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
    }
    .timeline .timeline-item .timeline-left .uk-badge {
        padding: 0;
        margin: 0;
        width: 30px;
        height: 30px;
    }
    .timeline .timeline-item .timeline-left .uk-badge.uk-badge-danger {
      background: #f0506e;
    }
    .timeline .timeline-item .timeline-left .uk-badge.uk-badge-success {
      background: #32d296;
    }
    .timeline .timeline-item .timeline-left .uk-badge.uk-badge-warning {
      background: #faa05a;
    }
    .timeline .timeline-item .timeline-left .uk-icon {
        color: #fff;
    }
    .timeline .timeline-item .timeline-content {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 0 0 0 1rem;
    }
    </style>
    </head>
    <body>
	<div id="offcanvas_slide__profile" uk-offcanvas>
    	<div class="uk-offcanvas-bar">
		  <?php if ($this->session->userdata('logged_in')) { ?>
       	 	<ul class="uk-nav uk-nav-default">
				<?php if($permission['is_admin'] == 1){ ?>
        	    <li><a href="<?= base_url('admin'); ?>"><?= $this->lang->line('admin'); ?></a></li>
				<?php } ?>
         	    <li><a href="<?= base_url('logout'); ?>"><?= $this->lang->line('logout'); ?></a></li>
       		</ul>
          <?php }else{ ?>
		    <ul class="uk-nav uk-nav-default">
         	    <li><a href="#" uk-toggle="target: #modal_signin"><?= $this->lang->line('signin'); ?></a></li>
        	    <li><a href="#" uk-toggle="target: #modal_signup"><?= $this->lang->line('signup'); ?></a></li>
       		</ul>
		  <?php } ?>
    	</div>
	</div>
	<?php $this->load->view($content);?>
    </body>
</html>