<?php $theme = $this->sessioncheck_model->configuration('theme');
$theme = $theme['value']; ?>
<script>
function _(el) {
  return document.getElementById(el);
}

function uploadFile() {
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "<?= $domain_url.'import'; ?>");
  //use file_upload_parser.php from above url
  ajax.send(formdata);
}

function Delete(theme) {
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("theme", theme);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "<?= $domain_url.'delete'; ?>");
  //use file_upload_parser.php from above url
  ajax.send(formdata);
}
function progressHandler(event) {
  var percent = (event.loaded / event.total) * 100;
  _("loaded_n_total").innerHTML = "<?= $this->lang->line('import_file__info'); ?> " + event.loaded + "/" + event.total+" ("+percent+"%)";
  _("progressBar").value = Math.round(percent);
  _("status_upload").innerHTML = Math.round(percent) + "<?= $this->lang->line('import__status'); ?>";
}

function completeHandler(event) {
  _("status_upload").innerHTML = "<div class='col-md-12'><div class='alert alert-info'>"+event.target.responseText+"</div></div>";
  _("progressBar").value = 0; //wil clear progress bar after successful upload
}

function errorHandler(event) {
  _("status_upload").innerHTML = "<div class='alert alert-danger'><?= $this->lang->line('import_error'); ?></div>";
  //toastr.error("<?= $this->lang->line('import__file__error'); ?>");
}

function abortHandler(event) {
  _("status_upload").innerHTML = "<div class='alert alert-danger'><?= $this->lang->line('import_error'); ?></div>";
  //toastr.error("<?= $this->lang->line('import__file__error__aborted'); ?>");
}
</script>

<div class="content-padder content-background">
            <div class="uk-section-small uk-section-default header">
                <div class="uk-container uk-container-large">
                    <h1><span class="ion-speedometer"></span> <?= $this->lang->line('themes'); ?></h1>
                </div>
            </div>
            <div class="uk-section-small">
                <div class="uk-container uk-container-large">

					<div class="uk-card uk-card-default uk-card-body">
					    <h1><?= $this->lang->line('themes'); ?></h1>
					    <table class="uk-table uk-table-divider">
  					      <thead>
  					          <tr>
  					              <th>#</th>
 					               <th><?= $this->lang->line('name'); ?></th>
                         <th></th>
                         <th><?= $this->lang->line('price_theme'); ?></th>
                         <th><?= $this->lang->line('version_theme'); ?></th>
 					               <th><?= $this->lang->line('actions'); ?></th>
 					           </tr>
 					       </thead>
 					       <tbody>
                   <?php $config__theme_json = file_get_contents('https://raw.githubusercontent.com/Dev-TimeEU/CMS_Portfolio/master/themes.json');
                   $themes = json_decode($config__theme_json, true);
					    	  foreach ($themes['themes'] as $row){
                    $version_text = ""; ?>
 					           <tr>
  					              <td><?= $row['id']; ?></td>
  					              <td><?= $row['theme']; ?></td>
  					              <td><?= $row['author']; ?>
                            <?php foreach ($row['author_contact'] as $author_contact){ ?>
                              <?= $author_contact['name']; ?>: <?= $author_contact['response']; ?><br>
                            <?php } ?>
                          </td>
  					              <td><?php if($row['price'] == "0"){ echo $this->lang->line('free'); }else{ echo $row['price']."€"; } ?></td>
                          <td>
                            <?php $info_theme = file_get_contents('https://raw.githubusercontent.com/Dev-TimeEU/'.$row['theme'].'/main/config.json');
                            $info_theme0 = json_decode($info_theme); ?>
                            <?= $info_theme0->informations->version; ?>
                            <?php if (file_exists("./application/views/themes/".$row['theme']."/config.json")) {
                              $info_theme = file_get_contents($domain_url."/application/views/themes/".$row['theme']."/config.json");
                              $info_theme = json_decode($info_theme);
                              $version_theme_downloaded = $info_theme->informations->version;
                              $version_theme_latest = $info_theme0->informations->version;
                              echo "<br>".sprintf($this->lang->line('theme_version_installed'),$info_theme->informations->version);
                            } ?>
                          </td>

  					              <td><?php if($theme == $row['theme']){ ?>
                            <button class="uk-button uk-button-secondary"><?= $this->lang->line('current'); ?></button>
                          <?php }else{ ?>
                            <?php $files = directory_map('./application/views/themes/', 1, TRUE);
  					        	    asort($files);
                          foreach($files as $file){
      				        			if(is_string($file)){
      										if (ctype_lower($file)) {
      										}elseif($file == "index.html"){
                          }elseif($file == $row['theme']){
                            $selected0 = '<button class="uk-button uk-button-secondary">'.$this->lang->line('current').'</button>';
                            if($version_theme_latest != $version_theme_downloaded){
                              $version_text = '<a href="https://github.com/Dev-TimeEU/'.$row['theme'].'/archive/refs/heads/main.zip" class="uk-button uk-button-default">
                              '.$this->lang->line('download_update').'</a>';
                            }
      										}else{
                            $selected0 = "";
      										}
      					        		}
      					        	} ?>
                          <?php
                          if (is_dir("./application/views/themes/".$row['theme'])) {
                            $selected = '<button class="uk-button uk-button-success">'.$this->lang->line('installed').'</button>
                            <button class="uk-button uk-button-danger" onclick="Delete(\''.$row['theme'].'\')">'.$this->lang->line('delete_theme').'</button>';
                            if($version_theme_latest != $version_theme_downloaded){
                              $version_text = '<a href="https://github.com/Dev-TimeEU/'.$row['theme'].'/archive/refs/heads/main.zip" class="uk-button uk-button-default">
                              '.$this->lang->line('download_update').'</a>';
                            }
                          }else{
                            $selected = "";
                          }
                          echo $selected0;
                          echo $selected;
                          echo $version_text;
                          if($row['price'] == "0" && $version_theme_latest == $version_theme_downloaded){
                            echo '<a href="https://github.com/Dev-TimeEU/'.$row['theme'].'/archive/refs/heads/main.zip" class="uk-button uk-button-primary">'.$this->lang->line('download').'</a>';
                          }elseif($row['price'] != "0"){
                            echo '<a href="'.$row['url'].'" class="uk-button uk-button-primary">'.$this->lang->line('pay').'</a>';
                          }else{
                            
                          } ?>
                          <?php }  ?>
								  </td>
  					          </tr>
					    	  <?php } ?>
 					       </tbody>
					    </table>
					</div>
          <br>
          <div class="uk-card uk-card-default uk-card-body">
					    <h1><?= $this->lang->line('import_theme'); ?></h1>
              <div id="status_upload"></div>
  			    	<span id="loaded_n_total"></span>
  			      <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
					    <form class="uk-form-stacked" novalidate id="upload_form" enctype="multipart/form-data" method="post">
                <div class="form-row">
                  <div class="uk-width-1-1@s">
      						<div class="uk-margin">
      					        <label class="uk-form-label" for="name_site"><?= $this->lang->line('import__file'); ?></label>
      					        <div class="uk-form-controls">
      					            <input class="uk-input" type="file" name="file1" id="file1" onchange="uploadFile()">
      					        </div>
      					    </div>
      					  </div>
                </div>
              </form>
					</div>

                </div>
            </div>
        </div>
