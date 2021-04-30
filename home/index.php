<script>
function Signin() {
  var XHR = new XMLHttpRequest();
  var FD  = new FormData();

  // Mettez les données dans l'objet FormData
    var email_l0 = document.getElementById('email_l').value;
    var password_l0 = document.getElementById('password_l').value;

    FD.append('email_l', email_l0);
    FD.append('password_l', password_l0);


  // Définissez ce qui se passe si la soumission s'est opérée avec succès
  XHR.addEventListener('load', function(event) {
	UIkit.notification({message: event.target.responseText,status: 'primary',pos: 'top-right',timeout: 5000});
  });

  // Definissez ce qui se passe en cas d'erreur
  XHR.addEventListener('error', function(event) {
    UIkit.notification({message: '<?= $this->lang->line('error__signup_signin'); ?>',status: 'primary',pos: 'top-right',timeout: 5000});
  });

  // Configurez la requête
  XHR.open('POST', '<?= $domain_url; ?>home/signin');

  // Expédiez l'objet FormData ; les en-têtes HTTP sont automatiquement définies
  XHR.send(FD);
}
</script>
<script>
function Signup() {
  var XHR = new XMLHttpRequest();
  var FD  = new FormData();

  // Mettez les données dans l'objet FormData
    var username0 = document.getElementById('username').value;
    var email0 = document.getElementById('email').value;
	var password10 = document.getElementById('password1').value;
	var password20 = document.getElementById('password2').value;

    FD.append('username', username0);
    FD.append('email', email0);
    FD.append('password1', password10);
    FD.append('password2', password20);


  // Définissez ce qui se passe si la soumission s'est opérée avec succès
  XHR.addEventListener('load', function(event) {
	UIkit.notification({message: event.target.responseText,status: 'primary',pos: 'top-right',timeout: 5000});
  });

  // Definissez ce qui se passe en cas d'erreur
  XHR.addEventListener('error', function(event) {
    UIkit.notification({message: '<?= $this->lang->line('error__signup_signin'); ?>',status: 'primary',pos: 'top-right',timeout: 5000});
  });

  // Configurez la requête
  XHR.open('POST', '<?= $domain_url; ?>home/signup');

  // Expédiez l'objet FormData ; les en-têtes HTTP sont automatiquement définies
  XHR.send(FD);
}
</script>
<div id="modal_signin" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title"><?= $this->lang->line('signin'); ?></h2>

		<form novalidate method="POST" onsubmit="return Signin();">
		  <fieldset class="uk-fieldset">
		    <div class="uk-margin">
                <input class="uk-input" type="email" id="email_l" placeholder="<?= $this->lang->line('your_email'); ?>">
            </div>
		    <div class="uk-margin">
                <input class="uk-input" type="password" id="password_l" placeholder="<?= $this->lang->line('your_password'); ?>">
            </div>
 		    <button class="uk-button uk-button-primary"><?= $this->lang->line('signin'); ?></button>
		  </fieldset>
		</form>


    </div>
</div>
<div id="modal_signup" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title"><?= $this->lang->line('signup'); ?></h2>

		<form novalidate method="POST" onsubmit="return Signup();">
		  <fieldset class="uk-fieldset">
		    <div class="uk-margin">
                <input class="uk-input" type="text" id="username" placeholder="<?= $this->lang->line('your_username'); ?>">
            </div>
			<div class="uk-margin">
                <input class="uk-input" type="email" id="email" placeholder="<?= $this->lang->line('your_email'); ?>">
            </div>
		    <div class="uk-margin">
                <input class="uk-input" type="password" id="password1" placeholder="<?= $this->lang->line('your_password'); ?>">
            </div>
		    <div class="uk-margin">
                <input class="uk-input" type="password" id="password2" placeholder="<?= $this->lang->line('confirm_your_password'); ?>">
            </div>
 		    <button class="uk-button uk-button-primary"><?= $this->lang->line('signup'); ?></button>
		  </fieldset>
		</form>
    </div>
</div>

<div class="uk-position-relative">
  <?php if($banner__welcome != "video"){ ?>
    <img src="<?= $banner; ?>" alt="Bannière" style="width:100vw;max-width:100%;">
  <?php }else{ ?>
  <video src="<?= $video; ?>" loop muted playsinline uk-video="autoplay: inview" style="width:100vw;max-width:100%;"></video>
  <?php } ?>
	<?php if($config__theme->informations->navigation == "slide"){ ?>
	<div id="offcanvas_slide__menu" uk-offcanvas>
    	<div class="uk-offcanvas-bar">
       	 	<ul class="uk-nav uk-nav-default">
         	    <?php
				$query = $this->db->get('navigations');
				foreach ($query->result() as $row){ ?>
				<?php if($row->category == "no" && $row->sub == "0"){ ?>
					<li <?php if(base_url() == $row->url){ ?>class="uk-active"<?php } ?>><a href="<?= $row->url; ?>" <?php if($row->scroll == "yes"){ ?>uk-scroll<?php } ?>><?= $row->name; ?></a></li>
				<?php } ?>
				<?php if($row->category == "yes" && $row->sub == "0"){ ?>
				    <li <?php if(base_url() == $row->url){ ?>class="uk-active"<?php } ?>>
                        <a href="#"><?= $row->name; ?></a>
						<div uk-dropdown>
 						   <ul class="uk-nav uk-dropdown-nav">
 						    <?php
							$this->db->where('category','no');
							$this->db->where('sub',$row->id);
							$query__sub = $this->db->get('navigations');
							foreach ($query__sub->result() as $row__sub){ ?>
                                <li <?php if(base_url() == $row__sub->url){ ?>class="uk-active"<?php } ?>><a href="<?= $row__sub->url; ?>" <?php if($row->scroll == "yes"){ ?>uk-scroll<?php } ?>><?= $row__sub->name; ?></a></li>
							<?php } ?>
 						   </ul>
						</div>
                    </li>
				<?php } ?>
				<?php } ?>
       		</ul>
    	</div>
	</div>
	<?php } ?>

    <div class="uk-position-top">
        <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
				<?php if($config__theme->informations->navigation == "default"){ ?>
				<?php
				$query = $this->db->get('navigations');
				foreach ($query->result() as $row){ ?>
				<?php if($row->category == "no" && $row->sub == "0"){ ?>
					<li <?php if(base_url() == $row->url){ ?>class="uk-active"<?php } ?>><a href="<?= $row->url; ?>" <?php if($row->scroll == "yes"){ ?>uk-scroll<?php } ?>><?= $row->name; ?></a></li>
				<?php } ?>
				<?php if($row->category == "yes" && $row->sub == "0"){ ?>
				    <li <?php if(base_url() == $row->url){ ?>class="uk-active"<?php } ?>>
                        <a href="#"><?= $row->name; ?></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
							<?php
							$this->db->where('category','no');
							$this->db->where('sub',$row->id);
							$query__sub = $this->db->get('navigations');
							foreach ($query__sub->result() as $row__sub){ ?>
                                <li <?php if(base_url() == $row__sub->url){ ?>class="uk-active"<?php } ?>><a href="<?= $row__sub->url; ?>" <?php if($row->scroll == "yes"){ ?>uk-scroll<?php } ?>><?= $row__sub->name; ?></a></li>
							<?php } ?>
                            </ul>
                        </div>
                    </li>
				<?php } ?>
				<?php } ?>
			    <?php } ?>
				<?php if($config__theme->informations->navigation == "slide"){ ?>
				<li><a href="#offcanvas_slide__menu" uk-toggle><?= $this->lang->line('menu'); ?></a></li>
				<?php } ?>
				<li><a href="#offcanvas_slide__profile" uk-toggle><?= $this->lang->line('admincp'); ?></a></li>
                </ul>
            </div>
        </nav>
        <h1 class="uk-text-lead" style="font-size: 3.5rem;text-align:center;color:<?= $header__color; ?>;"><?= $name_site; ?></h1>
        <p style="font-size: 1.5rem;text-align:center;color:<?= $paragraph__color; ?>;"><?= $mini_description; ?></p>
    </div>
</div>
<div class="uk-section" style="background:#f6f7ff;">
    <div class="uk-container">
        <article class="uk-article" id="biographie">

            <h1 class="uk-article-title"><a class="uk-link-reset" href=""><?= $this->lang->line('about_me'); ?></a></h1>

            <div class="uk-text-lead"><?= $bio; ?></div>

            <div class="uk-grid-small uk-child-width-auto" uk-grid>
	        	<?php if($cv != ""){ ?>
                <div>
                    <a class="uk-button uk-button-text" href="<?= $cv; ?>">CV</a>
                </div>
	        	<?php } ?>
            </div>

        </article>
    </div>
</div>
<div class="uk-section">
	<div class="uk-container" id="skills">
	    <h1 class="uk-text-lead"><?= $this->lang->line('skills'); ?></h1>
		<p class="uk-text-meta"><?= sprintf($this->lang->line('skills__description'),$name_site); ?></p>
		<?php $query_category = $this->db->get('skills__category');
		foreach ($query_category->result() as $category){ ?>
		<h1 class="uk-text-lead"><?= $category->name; ?></h1>
		<div class="uk-child-width-1-2@m" uk-grid>
		<?php
		$this->db->where('category', $category->id);
		$query = $this->db->get('skills');
		foreach ($query->result() as $skills){ ?>
		<?php if($skills->skill_percent < 25){
			$skill_name = $this->lang->line('competence__lvl25');
		}elseif($skills->skill_percent < 45){
			$skill_name = $this->lang->line('competence__lvl45');
		}elseif($skills->skill_percent < 65){
			$skill_name = $this->lang->line('competence__lvl65');
		}else{
			$skill_name = $this->lang->line('competence__lvl80');
		} ?>

		<div class="uk-card uk-card-default uk-card-body">
            <div class="uk-card-badge uk-label"><?= $skill_name; ?></div>
 		   <h3 class="uk-card-title"><?= $skills->name; ?></h3>
 		   <p><?= $skills->description; ?></p>
		</div>
		<?php } ?>
		</div>
		<?php } ?>

	</div>
</div>
<div class="uk-section" style="background:#f6f7ff;">
	<div class="uk-container" id="experiences">
	    <h1 class="uk-text-lead"><?= $this->lang->line('experiences'); ?></h1>
		<p class="uk-text-meta"><?= sprintf($this->lang->line('experiences__description'),$name_site); ?></p>


		<div class="timeline">
		<?php
		$query = $this->db->get('experiences');
		foreach ($query->result() as $experiences){ ?>
		<div class="timeline-item">
            <div class="timeline-left">
                <span class="uk-badge"><span uk-icon="bolt"></span></span>
            </div>
            <div class="timeline-content">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header uk-flex-middle uk-grid-small" uk-grid>
                        <h3 class="uk-card-title"><?= $experiences->name; ?></h3>
						<?php if(!empty($experiences->url)){ ?>
						<a class="uk-label uk-margin-auto-left" href="<?= $experiences->url; ?> " style="text-align: right;">Site</a>
					  <?php } ?>
					  <?php if(!empty($experiences->twitter)){ ?>
						<a class="uk-label uk-margin-auto-left" href="<?= $experiences->twitter; ?> " style="text-align: right;">Twitter</a>
					  <?php } ?>
					  <?php if(!empty($experiences->facebook)){ ?>
						<a class="uk-label uk-margin-auto-left" href="<?= $experiences->facebook; ?> " style="text-align: right;">Facebook</a>
					    <?php } ?>
                    </div>
                    <div class="uk-card-body">
                        <p><?= $experiences->description; ?></p>
                    </div>
                </div>
            </div>
        </div>
		<?php } ?>
		</div>
	</div>
</div>
<div class="uk-section">
	<div class="uk-container" id="projects">
	    <h1 class="uk-text-lead"><?= $this->lang->line('projects'); ?></h1>
		<p class="uk-text-meta"><?= sprintf($this->lang->line('projects__description'),$name_site); ?></p>

		<div uk-filter="target: .js-filter">

			<div class="uk-grid-small uk-grid-divider uk-child-width-auto" uk-grid>
            	<ul class="uk-subnav uk-subnav-pill" uk-margin>
            		<li class="uk-active" uk-filter-control><a href="#"><?= $this->lang->line('all__projects'); ?></a></li>
		            <?php
		            $query = $this->db->get('projects__category');
		            foreach ($query->result() as $projects__category){ ?>
                    <li uk-filter-control="[data-color='<?= $projects__category->id ?>']"><a href="#"><?= $projects__category->name ?></a></li>
			        <?php } ?>
                </ul>
			</div>

		    <ul class="js-filter uk-child-width-1-2 uk-child-width-1-3@m uk-text-center" uk-grid="masonry: true">
		    <?php
		    $query = $this->db->get('projects');
		    foreach ($query->result() as $projects){ ?>
			<?php $random_size = rand(1,3);
			if($random_size == 1){
				$size = "small";
			}elseif($random_size == 2){
				$size = "medium";
			}else{
				$size = "large";
			} ?>
			  <li data-color="<?= $projects->category;?>" data-size="<?= $size;?>" uk-lightbox="animation: scale">
      	        <a class="uk-inline" href="<?= $projects->image; ?>" data-caption="<?= $projects->description; ?>">
      	            <img src="<?= $projects->image; ?>" style="width: 100%;" alt="">
      	            <div class="uk-overlay-primary uk-position-cover"></div>
     	            <div class="uk-overlay uk-position-bottom uk-light">
     	               <p><?= $projects->name; ?></p>
     	            </div>
    	        </a>
			  </li>
		    <?php } ?>
		    </ul>
		</div>
	</div>
</div>
