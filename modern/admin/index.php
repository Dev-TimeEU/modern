<div class="content-padder content-background">
            <div class="uk-section-small uk-section-default header">
                <div class="uk-container uk-container-large">
                    <h1><span class="ion-speedometer"></span> <?= $this->lang->line('admin'); ?></h1>
                </div>
            </div>
            <div class="uk-section-small">
                <div class="uk-container uk-container-large">
                    <form class="uk-form-stacked" method="POST" uk-grid>
					<?php if(isset($_POST['submit'])){
						$this->sessioncheck_model->update('configuration','value',$this->input->post('name_site'),1);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('logo'),2);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('description_site'),3);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('theme'),5);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('register'),6);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('language'),7);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('banner'),8);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('fond'),9);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('video'),10);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('header_color'),11);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('paragraph_color'),12);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('bio'),13);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('mini_description'),14);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('cv'),15);
						$this->sessioncheck_model->update('configuration','value',$this->input->post('domain'),16);
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('success__update').'</p></div></div>';
					} ?>

					  <div class="uk-width-1-2@s">
						<div class="uk-margin">
					        <label class="uk-form-label" for="name_site"><?= $this->lang->line('name_site'); ?></label>
					        <div class="uk-form-controls">
					            <input class="uk-input" name="name_site" id="name_site" type="text" value="<?= $name_site; ?>">
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-2@s">
						 <div class="uk-margin">
					        <label class="uk-form-label" for="logo"><?= $this->lang->line('logo'); ?></label>
					        <div class="uk-form-controls">
					            <input class="uk-input" name="logo" id="logo" type="text" value="<?= $image; ?>">
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-2@s">
						 <div class="uk-margin">
					        <label class="uk-form-label" for="banner"><?= $this->lang->line('banner'); ?></label>
					        <div class="uk-form-controls">
					            <input class="uk-input" name="banner" id="banner" type="url" value="<?= $banner; ?>">
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-2@s">
						<div class="uk-margin">
					        <label class="uk-form-label" for="video"><?= $this->lang->line('video'); ?></label>
					        <div class="uk-form-controls">
					            <input class="uk-input" name="video" id="video" type="url" value="<?= $video; ?>">
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-2@s">
						<div class="uk-margin">
					        <label class="uk-form-label" for="header_color"><?= $this->lang->line('header_color'); ?></label>
					        <div class="uk-form-controls">
					            <input class="uk-input" name="header_color" id="header_color" type="color" value="<?= $header__color; ?>">
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-2@s">
						<div class="uk-margin">
					        <label class="uk-form-label" for="paragraph_color"><?= $this->lang->line('paragraph_color'); ?></label>
					        <div class="uk-form-controls">
					            <input class="uk-input" name="paragraph_color" id="paragraph_color" type="color" value="<?= $paragraph__color; ?>">
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-1">
						<div class="uk-margin">
					        <label class="uk-form-label" for="mini_description"><?= $this->lang->line('mini_description'); ?></label>
					        <div class="uk-form-controls">
					            <input class="uk-input" name="mini_description" id="mini_description" type="text" value="<?= $mini_description; ?>">
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-2@s">
						<div class="uk-margin">
					        <label class="uk-form-label" for="cv"><?= $this->lang->line('url_cv'); ?></label>
					        <div class="uk-form-controls">
					            <input class="uk-input" name="cv" id="cv" type="url" value="<?= $cv; ?>">
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-2@s">
						<div class="uk-margin">
					        <label class="uk-form-label" for="domain"><?= $this->lang->line('domain'); ?></label>
					        <div class="uk-form-controls">
					            <input class="uk-input" name="domain" id="domain" type="url" value="<?= $domain_url; ?>">
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-2@s">
						<div class="uk-margin">
					        <label class="uk-form-label"><?= $this->lang->line('description_site'); ?></label>
					        <div class="uk-form-controls">
							    <textarea class="uk-textarea" name="description_site"><?= $description; ?></textarea>
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-2@s">
						<div class="uk-margin">
					        <label class="uk-form-label"><?= $this->lang->line('biographie'); ?></label>
					        <div class="uk-form-controls">
							    <textarea class="uk-textarea" name="bio"><?= $bio; ?></textarea>
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-3@s">

					    <div class="uk-margin">
					        <label class="uk-form-label" for="form-stacked-select"><?= $this->lang->line('change_language'); ?></label>
					        <div class="uk-form-controls">
					            <select name="language" class="uk-select" id="form-stacked-select">
					                <?php $files = directory_map('./application/language', 1, TRUE);

					        asort($files);
				        		foreach($files as $file){
				        			if(is_string($file)){
										if (ctype_lower($file)) {
										}elseif($file == "index.html"){
										}else{
											$file = preg_replace('/([A-Za-z0-9\/\.\_\-]*)\//', '$1', $file);
											if($file == $language){
												$selected = "selected";
											}else{
												$selected = "";
											}
										    echo "<option value='".$file."' ".$selected.">".$file."</option>";
										}
					        		}
					        	} ?>
					            </select>
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-3@s">

					    <div class="uk-margin">
					        <label class="uk-form-label" for="form-stacked-select"><?= $this->lang->line('change_theme'); ?></label>
					        <div class="uk-form-controls">
					            <select name="theme" class="uk-select" id="form-stacked-select">
					                <?php $files = directory_map('./application/views/themes/', 1, TRUE);

					        asort($files);
				        		foreach($files as $file){
				        			if(is_string($file)){
										if (ctype_lower($file)) {
										}elseif($file == "index.html"){
										}else{
											$file = preg_replace('/([A-Za-z0-9\/\.\_\-]*)\//', '$1', $file);
											if($file == $theme){
												$selected = "selected";
											}else{
												$selected = "";
											}
										    echo "<option value='".$file."' ".$selected.">".$file."</option>";
										}
					        		}
					        	} ?>
					            </select>
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-3@s">

					    <div class="uk-margin">
					        <label class="uk-form-label" for="form-stacked-select"><?= $this->lang->line('banner_or_video'); ?></label>
					        <div class="uk-form-controls">
					            <select name="fond" class="uk-select" id="form-stacked-select">
					                <option value="video" <?php if($banner__welcome == "video"){ ?>selected<?php } ?>><?= $this->lang->line('fond_welcome_video'); ?></option>
					                <option value="banner" <?php if($banner__welcome == "banner"){ ?>selected<?php } ?>><?= $this->lang->line('fond_welcome_banner'); ?></option>
					            </select>
					        </div>
					    </div>
					  </div>
            <div class="uk-width-1-3@s">

					    <div class="uk-margin">
					        <label class="uk-form-label" for="form-stacked-select"><?= $this->lang->line('register'); ?></label>
					        <div class="uk-form-controls">
					            <select name="register" class="uk-select" id="form-stacked-select">
					                <option value="enable" <?php if($register == "enable"){ ?>enable<?php } ?>><?= $this->lang->line('register_enable'); ?></option>
					                <option value="disable" <?php if($register == "disable"){ ?>selected<?php } ?>><?= $this->lang->line('register_disable'); ?></option>
					            </select>
					        </div>
					    </div>
					  </div>
					  <div class="uk-width-1-1">
					    <button class="uk-button uk-button-primary" type="submit" name="submit"><?= $this->lang->line('edit'); ?></button>
					  </div>
					</form>
                </div>
            </div>
        </div>
