<div class="content-padder content-background">
            <div class="uk-section-small uk-section-default header">
                <div class="uk-container uk-container-large">
                    <h1><span class="ion-speedometer"></span> <?= $this->lang->line('experiences'); ?></h1>
					<h3><a href="#" uk-toggle="target: #modal_create"><?= $this->lang->line('add__experience'); ?></a></h3>
                </div>
            </div>
            <div class="uk-section-small">
                <div class="uk-container uk-container-large">
					<?php if(isset($_POST['create'])){
						$data = array(
  						    'name' => $this->input->post('name'),
 						    'start' => $this->input->post('start'),
 						    'end' => $this->input->post('end'),
 						    'url' => $this->input->post('url'),
 						    'twitter' => $this->input->post('twitter'),
 						    'facebook' => $this->input->post('facebook'),
 						    'description' => $this->input->post('description')
						);

						$this->db->insert('experiences', $data);
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('experience__created').'</p></div></div>';
					}
					?>
					<?php $query = $this->db->get('experiences');
					foreach ($query->result() as $row){ ?>
					<?php if(isset($_POST['edit_'.$row->id.''])){ 
				    	$this->db->set('name', $this->input->post('edit_name'));
				    	$this->db->set('start', $this->input->post('edit_start'));
				    	$this->db->set('end', $this->input->post('edit_end'));
				    	$this->db->set('url', $this->input->post('edit_url'));
				    	$this->db->set('twitter', $this->input->post('edit_twitter'));
				    	$this->db->set('facebook', $this->input->post('edit_facebook'));
				    	$this->db->set('description', $this->input->post('edit_description'));
				    	$this->db->where('id', $row->id);
				    	$this->db->update('experiences');
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('success__update').'</p></div></div>';
					}
					if(isset($_POST['delete_'.$row->id.''])){
						$tables = array('experiences');
						$this->db->where('id', $row->id);
						$this->db->delete($tables);
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('success__delete').'</p></div></div>';
					}
					} ?>
					
					<div id="modal_create" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					        <h2 class="uk-modal-title"><?= $this->lang->line('add__experience'); ?></h2>
        
							<form novalidate method="POST">
							  <fieldset class="uk-fieldset">
							    <div class="uk-margin">
 					               <input class="uk-input" type="text" name="name" placeholder="<?= $this->lang->line('name'); ?>">
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="date" name="start" placeholder="<?= $this->lang->line('start_date'); ?>">
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="date" name="end" placeholder="<?= $this->lang->line('end_date'); ?>">
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="url" name="url" placeholder="<?= $this->lang->line('url'); ?>">
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="url" name="twitter" placeholder="Twitter">
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="url" name="facebook" placeholder="Facebook">
 					            </div>
								<div class="uk-margin">
 					               <textarea class="uk-textarea" name="description" placeholder="<?= $this->lang->line('description'); ?>"></textarea>
 					            </div>
 							    <button class="uk-button uk-button-primary" type="submit" name="create"><?= $this->lang->line('add__experience'); ?></button>
							  </fieldset>
							</form>
 					   </div>
					</div>
					<div class="uk-card uk-card-default uk-card-body">
					    <h1><?= $this->lang->line('experiences'); ?></h1>
					    <table class="uk-table uk-table-divider">
  					      <thead>
  					          <tr>
  					              <th>#</th>
 					               <th><?= $this->lang->line('name'); ?></th>
 					               <th><?= $this->lang->line('actions'); ?></th>
 					           </tr>
 					       </thead>
 					       <tbody>
					    	  <?php $query_list = $this->db->get('experiences');
					    	  foreach ($query_list->result() as $row_list){ ?>
					<div id="modal_edit_<?= $row_list->id; ?>" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					        <h2 class="uk-modal-title"><?= $row_list->name; ?></h2>
        
							<form novalidate method="POST">
							  <fieldset class="uk-fieldset">
							    <div class="uk-margin">
 					               <input class="uk-input" type="text" name="edit_name" value="<?= $row_list->name; ?>" placeholder="<?= $this->lang->line('name'); ?>">
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="date" name="edit_start" value="<?= $row_list->start; ?>" placeholder="<?= $this->lang->line('start_date'); ?>">
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="date" name="edit_end" value="<?= $row_list->end; ?>" placeholder="<?= $this->lang->line('end_date'); ?>">
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="url" name="edit_url" value="<?= $row_list->url; ?>" placeholder="<?= $this->lang->line('url'); ?>">
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="url" name="edit_twitter" value="<?= $row_list->twitter; ?>" placeholder="Twitter">
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="url" name="edit_facebook" value="<?= $row_list->facebook; ?>" placeholder="Facebook">
 					            </div>
								<div class="uk-margin">
 					               <textarea class="uk-textarea" name="edit_description" placeholder="<?= $this->lang->line('description'); ?>"><?= $row_list->description; ?></textarea>
 					            </div>
 							    <button class="uk-button uk-button-primary" type="submit" name="edit_<?= $row_list->id; ?>"><?= $this->lang->line('edit'); ?></button>
							  </fieldset>
							</form>
 					   </div>
					</div>
					
					<div id="modal_delete_<?= $row_list->id; ?>" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					        <h2 class="uk-modal-title"><?= $this->lang->line('delete'); ?></h2>
							<?= sprintf($this->lang->line('delete__message'),$row_list->name); ?>
							<form novalidate method="POST">    
 							    <button class="uk-button uk-button-primary" type="submit" name="delete_<?= $row_list->id; ?>"><?= $this->lang->line('delete__yes'); ?></button>
							</form>
 					   </div>
					</div>
							  
 					           <tr>
  					              <td><?= $row_list->id; ?></td>
  					              <td><?= $row_list->name; ?></td>
  					              <td><button class="uk-button uk-button-primary" uk-toggle="target: #modal_edit_<?= $row_list->id; ?>"><?= $this->lang->line('edit'); ?></button>
								      <button class="uk-button uk-button-danger" uk-toggle="target: #modal_delete_<?= $row_list->id; ?>"><?= $this->lang->line('delete'); ?></button>
								  </td>
  					          </tr>
					    	  <?php } ?>
 					       </tbody>
					    </table>
					</div>
					  
                </div>
            </div>
        </div>