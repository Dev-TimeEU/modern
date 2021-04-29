<div class="content-padder content-background">
            <div class="uk-section-small uk-section-default header">
                <div class="uk-container uk-container-large">
                    <h1><span class="ion-speedometer"></span> <?= $this->lang->line('menu'); ?></h1>
					<h3><a href="#" uk-toggle="target: #modal_create"><?= $this->lang->line('add_link'); ?></a></h3>
                </div>
            </div>
            <div class="uk-section-small">
                <div class="uk-container uk-container-large">
					<?php if(isset($_POST['create'])){
						$data = array(
  						    'name' => $this->input->post('name'),
 						    'url' => $this->input->post('url'),
 						    'category' => $this->input->post('category'),
 						    'sub' => $this->input->post('sub'),
 						    'scroll' => $this->input->post('scroll')
						);

						$this->db->insert('navigations', $data);
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('menu__created').'</p></div></div>';
					}
					?>
					<?php $query = $this->db->get('navigations');
					foreach ($query->result() as $row){ ?>
					<?php if(isset($_POST['edit_'.$row->id.''])){ 
				    	$this->db->set('name', $this->input->post('edit_name'));
				    	$this->db->set('url', $this->input->post('edit_url'));
				    	$this->db->set('category', $this->input->post('edit_category'));
				    	$this->db->set('sub', $this->input->post('edit_sub'));
				    	$this->db->set('scroll', $this->input->post('edit_scroll'));
				    	$this->db->where('id', $row->id);
				    	$this->db->update('navigations');
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('success__update').'</p></div></div>';
					}
					if(isset($_POST['delete_'.$row->id.''])){
						$tables = array('navigations');
						$this->db->where('id', $row->id);
						$this->db->delete($tables);
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('success__delete').'</p></div></div>';
					}
					} ?>
					
					<div id="modal_create" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					        <h2 class="uk-modal-title"><?= $this->lang->line('add__link'); ?></h2>
        
							<form novalidate method="POST">
							  <fieldset class="uk-fieldset">
							    <div class="uk-margin">
 					               <input class="uk-input" type="text" name="name" placeholder="<?= $this->lang->line('name'); ?>">
 					            </div>
								<div class="uk-margin">
								    <select name="category" class="uk-select">
									    <option value="no" selected><?= $this->lang->line('category'); ?></option>
								        <option value="no"><?= $this->lang->line('no'); ?></option>
								        <option value="yes"><?= $this->lang->line('yes'); ?></option>
								    </select>
								</div>
								<div class="uk-margin">
								    <select name="sub" class="uk-select">
									    <option value="0" selected><?= $this->lang->line('link_sub'); ?></option>
										<?php 
										$this->db->where('category', 'yes');
										$query_list_c = $this->db->get('navigations');
										foreach ($query_list_c->result() as $row_list_c){ ?>
								        <option value="<?= $row_list_c->id; ?>"><?= $row_list_c->name; ?></option>
										<?php } ?>
										<option value="0"><?= $this->lang->line('none'); ?></option>
								    </select>
								</div>
								<div class="uk-margin">
 					               <input class="uk-input" type="text" name="url" placeholder="<?= $this->lang->line('url'); ?>">
 					            </div>
								<div class="uk-margin">
								    <select name="scroll" class="uk-select">
									    <option value="no" selected><?= $this->lang->line('scroll'); ?></option>
								        <option value="no"><?= $this->lang->line('no'); ?></option>
								        <option value="yes"><?= $this->lang->line('yes'); ?></option>
								    </select>
								</div>
 							    <button class="uk-button uk-button-primary" type="submit" name="create"><?= $this->lang->line('add_link'); ?></button>
							  </fieldset>
							</form>
 					   </div>
					</div>
					<div class="uk-card uk-card-default uk-card-body">
					    <h1><?= $this->lang->line('menu'); ?></h1>
					    <table class="uk-table uk-table-divider">
  					      <thead>
  					          <tr>
  					              <th>#</th>
 					               <th><?= $this->lang->line('name'); ?></th>
								   <th><?= $this->lang->line('url'); ?></th>
 					               <th><?= $this->lang->line('actions'); ?></th>
 					           </tr>
 					       </thead>
 					       <tbody>
					    	  <?php $query_list = $this->db->get('navigations');
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
								    <select name="edit_category" class="uk-select">
									    <option value="no" selected><?= $this->lang->line('category'); ?></option>
								        <option value="no" <?php if($row_list->category == "no"){ ?>selected<?php } ?>><?= $this->lang->line('no'); ?></option>
								        <option value="yes" <?php if($row_list->category == "yes"){ ?>selected<?php } ?>><?= $this->lang->line('yes'); ?></option>
								    </select>
								</div>
								<div class="uk-margin">
								    <select name="edit_sub" class="uk-select">
									    <option value="0" selected><?= $this->lang->line('link_sub'); ?></option>
										<?php 
										$this->db->where('category', 'yes');
										$query_list_c = $this->db->get('navigations');
										foreach ($query_list_c->result() as $row_list_c){ ?>
								        <option value="<?= $row_list_c->id; ?>" <?php if($row_list->sub == $row_list_c->id){ ?>selected<?php } ?>><?= $row_list_c->name; ?></option>
										<?php } ?>
										<option value="0"><?= $this->lang->line('none'); ?></option>
								    </select>
								</div>
								<div class="uk-margin">
 					               <input class="uk-input" type="text" name="edit_url" value="<?= $row_list->url; ?>" placeholder="<?= $this->lang->line('url'); ?>">
 					            </div>
								<div class="uk-margin">
								    <select name="edit_scroll" class="uk-select">
									    <option value="no" selected><?= $this->lang->line('scroll'); ?></option>
								        <option value="no" <?php if($row_list->scroll == "no"){ ?>selected<?php } ?>><?= $this->lang->line('no'); ?></option>
								        <option value="yes" <?php if($row_list->scroll == "yes"){ ?>selected<?php } ?>><?= $this->lang->line('yes'); ?></option>
								    </select>
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
  					              <td><?= $row_list->url; ?></td>
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