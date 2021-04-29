<div class="content-padder content-background">
            <div class="uk-section-small uk-section-default header">
                <div class="uk-container uk-container-large">
                    <h1><span class="ion-speedometer"></span> <?= $this->lang->line('projects'); ?></h1>
					<h3><a href="#" uk-toggle="target: #modal_create"><?= $this->lang->line('add__project'); ?></a> <a href="#" uk-toggle="target: #modal_create_category"><?= $this->lang->line('add__category'); ?></a></h3>
                </div>
            </div>
            <div class="uk-section-small">
                <div class="uk-container uk-container-large">
					<?php if(isset($_POST['create_project'])){
						$data = array(
  						    'name' => $this->input->post('add_project__name'),
 						    'category' => $this->input->post('add_project__category'),
 						    'image' => $this->input->post('add_project__image'),
 						    'description' => $this->input->post('add_project__description'),
 						    'url' => $this->input->post('add_project__url')
						);

						$this->db->insert('projects', $data);
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('project__created').'</p></div></div>';
					}
					if(isset($_POST['create_category'])){
						$data = array(
  						    'name' => $this->input->post('add_category__name')
						);

						$this->db->insert('projects__category', $data);
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('category__created').'</p></div></div>';
					}
					?>
					<?php $query = $this->db->get('projects');
					foreach ($query->result() as $row){ ?>
					<?php if(isset($_POST['edit_project_'.$row->id.''])){ 
				    	$this->db->set('name', $this->input->post('edit_project__name'));
				    	$this->db->set('category', $this->input->post('edit_project__category'));
				    	$this->db->set('image', $this->input->post('edit_project__image'));
				    	$this->db->set('description', $this->input->post('edit_project__description'));
				    	$this->db->set('url', $this->input->post('edit_project__url'));
				    	$this->db->where('id', $row->id);
				    	$this->db->update('projects');
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('success__update').'</p></div></div>';
					}
					if(isset($_POST['delete_project_'.$row->id.''])){
						$tables = array('projects');
						$this->db->where('id', $row->id);
						$this->db->delete($tables);
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('success__delete').'</p></div></div>';
					}
					} ?>
					<?php $query = $this->db->get('projects__category');
					foreach ($query->result() as $row){ ?>
					<?php if(isset($_POST['edit_category_'.$row->id.''])){ 
				    	$this->db->set('name', $this->input->post('edit_category__name'));
				    	$this->db->where('id', $row->id);
				    	$this->db->update('projects__category');
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('success__update').'</p></div></div>';
					}
					if(isset($_POST['delete_category_'.$row->id.''])){
						$tables = array('projects__category');
						$this->db->where('id', $row->id);
						$this->db->delete($tables);
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('success__delete').'</p></div></div>';
					}
					} ?>
					
					<div id="modal_create" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					        <h2 class="uk-modal-title"><?= $this->lang->line('add__project'); ?></h2>
        
							<form novalidate method="POST">
							  <fieldset class="uk-fieldset">
							    <div class="uk-margin">
 					               <input class="uk-input" type="text" name="add_project__name" placeholder="<?= $this->lang->line('name'); ?>">
 					            </div>
							    <div class="uk-margin">
 					               <input class="uk-input" type="url" name="add_project__image" placeholder="<?= $this->lang->line('image'); ?>">
 					            </div>
							    <div class="uk-margin">
 					               <div class="uk-form-controls">
					                   <select name="add_project__category" class="uk-select" id="form-stacked-select">
									    <?php $query = $this->db->get('projects__category');
										foreach ($query->result() as $row){ ?>
					                       <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
										<?php } ?>
					                   </select>
					               </div>
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="url" name="add_project__url" placeholder="<?= $this->lang->line('url'); ?>">
 					            </div>
								<div class="uk-margin">
 					               <textarea class="uk-textarea" name="add_project__description" placeholder="<?= $this->lang->line('description'); ?>"></textarea>
 					            </div>
 							    <button class="uk-button uk-button-primary" type="submit" name="create_project"><?= $this->lang->line('add__project'); ?></button>
							  </fieldset>
							</form>
 					   </div>
					</div>
					<div id="modal_create_category" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					        <h2 class="uk-modal-title"><?= $this->lang->line('add__category'); ?></h2>
        
							<form novalidate method="POST">
							  <fieldset class="uk-fieldset">
							    <div class="uk-margin">
 					               <input class="uk-input" type="text" name="add_category__name" placeholder="<?= $this->lang->line('name'); ?>">
 					            </div>
 							    <button class="uk-button uk-button-primary" type="submit" name="create_category"><?= $this->lang->line('add__category'); ?></button>
							  </fieldset>
							</form>
 					   </div>
					</div>
					<div class="uk-card uk-card-default uk-card-body">
					    <h1><?= $this->lang->line('projects'); ?></h1>
					    <table class="uk-table uk-table-divider">
  					      <thead>
  					          <tr>
  					              <th>#</th>
 					               <th><?= $this->lang->line('name'); ?></th>
 					               <th><?= $this->lang->line('actions'); ?></th>
 					           </tr>
 					       </thead>
 					       <tbody>
					    	  <?php $query = $this->db->get('projects');
					    	  foreach ($query->result() as $row){ ?>
					<div id="modal_edit_<?= $row->id; ?>" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					        <h2 class="uk-modal-title"><?= $row->name; ?></h2>
        
							<form novalidate method="POST">
							  <fieldset class="uk-fieldset">
							    <div class="uk-margin">
 					               <input class="uk-input" type="text" name="edit_project__name" value="<?= $row->name; ?>">
 					            </div>
							    <div class="uk-margin">
 					               <input class="uk-input" type="url" name="edit_project__image" value="<?= $row->image; ?>">
 					            </div>
							    <div class="uk-margin">
 					               <div class="uk-form-controls">
					                   <select name="edit_project__category" class="uk-select" id="form-stacked-select">
									    <?php $query_c = $this->db->get('projects__category');
										foreach ($query_c->result() as $row_c){ ?>
					                       <option value="<?= $row_c->id; ?>" <?php if($row_c->id == $row->id){ ?>selected<?php } ?>><?= $row_c->name; ?></option>
										<?php } ?>
					                   </select>
					               </div>
 					            </div>
								<div class="uk-margin">
 					               <input class="uk-input" type="url" name="edit_project__url" value="<?= $row->url; ?>">
 					            </div>
								<div class="uk-margin">
 					               <textarea class="uk-textarea" name="edit_project__description" placeholder="<?= $this->lang->line('description'); ?>"><?= $row->description; ?></textarea>
 					            </div>
 							    <button class="uk-button uk-button-primary" type="submit" name="edit_project_<?= $row->id; ?>"><?= $this->lang->line('edit'); ?></button>
							  </fieldset>
							</form>
 					   </div>
					</div>
					
					<div id="modal_delete_<?= $row->id; ?>" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					        <h2 class="uk-modal-title"><?= $this->lang->line('delete'); ?></h2>
							<?= sprintf($this->lang->line('delete__message'),$row->name); ?>
							<form novalidate method="POST">    
 							    <button class="uk-button uk-button-primary" type="submit" name="delete_project_<?= $row->id; ?>"><?= $this->lang->line('delete__yes'); ?></button>
							</form>
 					   </div>
					</div>
							  
 					           <tr>
  					              <td><?= $row->id; ?></td>
  					              <td><?= $row->name; ?></td>
  					              <td><button class="uk-button uk-button-primary" uk-toggle="target: #modal_edit_<?= $row->id; ?>"><?= $this->lang->line('edit'); ?></button>
								      <button class="uk-button uk-button-danger" uk-toggle="target: #modal_delete_<?= $row->id; ?>"><?= $this->lang->line('delete'); ?></button>
								  </td>
  					          </tr>
					    	  <?php } ?>
 					       </tbody>
					    </table>
					</div>
					
					<div class="uk-card uk-card-default uk-card-body">
					    <h1><?= $this->lang->line('projects__category'); ?></h1>
					    <table class="uk-table uk-table-divider">
  					      <thead>
  					          <tr>
  					              <th>#</th>
 					               <th><?= $this->lang->line('name'); ?></th>
 					               <th><?= $this->lang->line('actions'); ?></th>
 					           </tr>
 					       </thead>
 					       <tbody>
					    	  <?php $query = $this->db->get('projects__category');
					    	  foreach ($query->result() as $row){ ?>
					<div id="modal_edit_c_<?= $row->id; ?>" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					        <h2 class="uk-modal-title"><?= $row->name; ?></h2>
        
							<form novalidate method="POST">
							  <fieldset class="uk-fieldset">
							    <div class="uk-margin">
 					               <input class="uk-input" type="text" name="edit_category__name" value="<?= $row->name; ?>">
 					            </div>
 							    <button class="uk-button uk-button-primary" type="submit" name="edit_category_<?= $row->id; ?>"><?= $this->lang->line('edit'); ?></button>
							  </fieldset>
							</form>
 					   </div>
					</div>
					
					<div id="modal_delete_c_<?= $row->id; ?>" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					        <h2 class="uk-modal-title"><?= $this->lang->line('delete'); ?></h2>
							<?= sprintf($this->lang->line('delete__message'),$row->name); ?>
							<form novalidate method="POST">    
 							    <button class="uk-button uk-button-primary" type="submit" name="delete_category_<?= $row->id; ?>"><?= $this->lang->line('delete__yes'); ?></button>
							</form>
 					   </div>
					</div>
							  
 					           <tr>
  					              <td><?= $row->id; ?></td>
  					              <td><?= $row->name; ?></td>
  					              <td><button class="uk-button uk-button-primary" uk-toggle="target: #modal_edit_c_<?= $row->id; ?>"><?= $this->lang->line('edit'); ?></button>
								      <button class="uk-button uk-button-danger" uk-toggle="target: #modal_delete_c_<?= $row->id; ?>"><?= $this->lang->line('delete'); ?></button>
								  </td>
  					          </tr>
					    	  <?php } ?>
 					       </tbody>
					    </table>
					</div>
					  
                </div>
            </div>
        </div>