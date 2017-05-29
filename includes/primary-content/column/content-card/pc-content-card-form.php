<?php 
	$tour_content_content_classes .= ' pc--form';
	$tour_content_content_classes .= ' ' . get_sub_field( 'tour_pc-coltype--form_la' );
	$tour_content_content_classes .= ' ' . get_sub_field( 'tour_pc-coltype--form_ti' );
	$tour_content_content_classes .= ' ' . get_sub_field( 'tour_pc-coltype--form_le' );

	$titles = get_sub_field( 'tour_pc-coltype--form_ti' ) != 'pc--form__head-hide';
	$titles = (string)$title;

	$form_id = get_sub_field( 'tour_pc-coltype--form_ob' );
?>

<div id="pca_form_id-<?php echo $form_id; ?>" class="<?php echo $tour_content_content_classes; ?>"  style="color:#000;">

		<?php
		/**
		 * Important form variables
		 */
		$form            = GFAPI::get_form( $form_id );
		$form['counter'] = 1;
		?>

		<form method="post" id="gform_<?=$form_id;?>">
			<div class="gform_heading">
				<?php if ( $form['title'] ) : ?><div class="gform_title"><?php echo $form['title']; ?></div><?php endif; ?>
				<?php if ( $form['description'] ) : ?><div class="gform_description"><?php echo $form['description']; ?></div><?php endif; ?>
			</div>

			<div class="gform_body">
				<ul 
					id="gform_fields_<?=$form_id;?>" 
					class="gform_fields <?=$form["labelPlacement"];?> description_<?=$form["descriptionPlacement"];?>">
					
					<?php
					/**
					 * Print fields
					 */
					foreach ( $form["fields"] as $field ) :
						?>

						<li id="field_<?=$form_id;?>_<?=$form['counter'];?>" class="gfield">

							<label class="gfield_label" for="field_<?=$form_id;?>_<?=$form['counter'];?>"><?=$field['label'];?></label>
							
							<div class="ginput_container ginput_container_<?=$field['type'];?>">

								<?php
								/**
								 * TODO: 
								 * V. Multiselect 
								 * 2. Radiobox
								 * 3. Checkbox
								 */
								
								/**
								 * Set field attributes
								 */
								$attr  = '';
								$attr .= 'name="input_' . $form['counter'] . '" ';
								$attr .= 'id="input_' . $form_id . '_' . $form['counter'] . '" ';
								$attr .= 'class="' . $field['type'] . ' gfield_' . $field['type'] . '" ';
								$attr .= 'placeholder="' . $field['placeholder'] . '" ';
								$attr .= 'data-field-label="' . $field['label'] . '" ';
								$attr .= 'data-field-required="' . $field['isRequired'] . '" ';
								$attr .= 'disabled ';

								/**
								 * Echo field template
								 */
								switch ( $field['type'] ) :

									/**
									 * Textarea field
									 */
									case 'textarea':
										$attr .= $field['maxLength'] ? 'data-field-length="' . $field['maxLength'] . '"' : '';
										echo "<textarea " . $attr . ">" . $field['defaltValue'] . "</textarea>";
										break;


									/**
									 * Select & Multiselect
									 */
									case 'select':
									case 'multiselect':
										$attr .= $field['type'] == 'multiselect' ? 'multiple' : '';
										echo "<select " . $attr . ">"; 

										foreach ( $field['choices'] as $option ) :
											$is_selected = $option['isSelected'] ? 'selected' : '';
											echo '<option class="' . $option['value'] . '" ' . $is_selected . '>' . $option['text'] . '</option>';
										endforeach;

										echo "</select>";
										break;


									/**
									 * Google reCaptcha
									 */
									case 'gf_no_captcha_recaptcha':
										$recaptcha = insert_recaptcha_html();
										echo $recaptcha;
										break;


									/**
									 * Radiobox and checkbox fields
									 */
									case 'radio':
									case 'checkbox':
										/**
										 * Check extra options
										 */
										$is_another_choice = (bool)$field['enableOtherChoice'];

										/**
										 * div wrapper attributes
										 */
										$div_attr  = '';
										$div_attr .= 'class="gchoices_container ginput_container ginput_container_' . $field['type'] . '" ';

										/**
										 * ul attributes
										 */
										$ul_attr  = '';
										$ul_attr .= 'id="input_' . $form_id . '_' . $form['counter'] . '" ';
										$ul_attr .= 'class="' . $field['type'] . ' gfield_' . $field['type'] . ' gchoices_list" ';
										$ul_attr .= 'data-field-required="' . $field['isRequired'] . '" ';
										$ul_attr .= 'data-form-other-choice="' . $is_another_choice . '"';

										$li_items = '';

										$choices_count = count($field['choices']);

										/**
										 * Loop each choice
										 */
										for ( $choice_id = 0; $choice_id < $choices_count; $choice_id++ ) :
											$choice = $field['choices'][$choice_id];

											/**
											 * li attributes
											 */
											$li_attr  = '';
											$li_attr .= 'class="gchoice_item gchoice_' . $form_id . '_' . $form['counter'] . '_' . $choice_id . '" ';

											/**
											 * Rewrite atributes completely
											 */
											$attr  = '';
											$attr .= 'type="' . $field['type'] . '" ';
											$attr .= 'name="input_' . $form['counter'] . '" ';
											$attr .= 'id="gchoice_' . $form_id . '_' . $form['counter'] . '_' . $choice_id . '" ';
											$attr .= 'class="' . $field['type'] . ' gfield_choice gfield_' . $field['type'] . '" ';
											$attr .= 'data-field-label="' . $field['label'] . '" ';
											$attr .= $choice['isSelected'] ? 'checked ' : '';
											$attr .= 'value="' . $choice['value'] . '" ';

											/**
											 * label attributes
											 */
											$label_attr  = '';
											$label_attr .= 'class="choice_label choice_' . $form_id . '_' . $form['counter'] . '_' . $choice_id . '" ';
											$label_attr .= 'for="gchoice_' . $form_id . '_' . $form['counter'] . '_' . $choice_id . '" ';

											$li_items .= "<li {$li_attr}><input {$attr} /><label {$label_attr}>{$choice['text']}</label></li>";
										endfor;

										/**
										 * Add another choice field
										 */
										if ( $is_another_choice ) :
											$choice_id++;

											/**
											 * li attributes
											 */
											$li_attr  = '';
											$li_attr .= 'class="gchoice_item gchoice_item_more gchoice_' . $form_id . '_' . $form['counter'] . '_' . $choice_id . '" ';

											/**
											 * Rewrite atributes completely
											 */
											$attr  = '';
											$attr .= 'type="' . $field['type'] . '" ';
											$attr .= 'name="input_' . $form['counter'] . '" ';
											$attr .= 'id="gchoice_' . $form_id . '_' . $form['counter'] . '_' . $choice_id . '" ';
											$attr .= 'class="' . $field['type'] . ' gfield_choice gfield_' . $field['type'] . '" ';
											$attr .= $choice['isSelected'] ? 'checked ' : '';
											$attr .= 'data-form-more="1" ';

											/**
											 * Text input attrs
											 */
											$more_attr  = '';
											$more_attr .= 'data-form-more-field ';
											$more_attr .= 'class="gfield_more" ';
											$more_attr .= 'data-field-label="' . $field['label'] . '" ';
											$more_attr .= 'type="text" ';
											
											$li_items .= "<li {$li_attr}><input {$attr} /><input {$more_attr} /></li>";
										endif;

										echo "<div {$div_attr}><ul {$ul_attr}>{$li_items}</ul></div>";

										break;


									/**
									 * Text, number, email, url
									 */
									default:
										$attr .= $field['defaltValue'] ? 'value="' . $field['defaltValue'] . '" ' : '';
										$attr .= 'type="' . $field['type'] . '" ';
										$attr .= $field['inputMask'] ? 'data-field-mask="' . $field['inputMaskValue'] . '" disabled ' : '';
										$attr .= $field['maxLength'] ? 'data-field-length="' . $field['maxLength'] . '"' : '';
										$attr .= 'data-field-input ';

										echo "<input " . $attr . " />";
										break;
								endswitch;
								?>

							</div>
						</li>

						<?php
						$form['counter'] += 1;
					endforeach;
					?>

				</ul>
			</div>

			<div class="gform_footer <?=$form["labelPlacement"];?>">

				<?php
				/**
				 * Print footer fields
				 */
				if ( $form["button"]["type"] == 'text' ) :
					echo '<button 
						id="gform_submit_button_'.$form_id.'" 
						class="gform_button button"
						disabled
						type="submit">'.$form["button"]["text"].'</button>';
				endif;
				?>

				<!-- Common values -->
				<input type="hidden" name="is_submit_<?=$form_id;?>" value="1">
				<input type="hidden" name="gform_submit" value="<?=$form_id;?>">
				<input type="hidden" name="gform_field_values">

				<!-- Notifivations -->
				<?php
				foreach ( $form["notifications"] as $notification ) :
					?>
					<input type="hidden" name="gform_notify_name" value="<?=$notification["name"];?>">
					<input type="hidden" name="gform_notify_event" value="<?=$notification["event"];?>">
					<input type="hidden" name="gform_notify_to" value="<?php echo $notification["to"] == '{admin_email}' ? get_bloginfo('admin_email') : $notification["to"];?>">
					<input type="hidden" name="gform_notify_to_type" value="<?=$notification["toType"];?>">
					<input type="hidden" name="gform_notify_subject" value="<?=$notification["subject"];?>">
					<input type="hidden" name="gform_notify_from" value="<?=$notification["from"];?>">
					<input type="hidden" name="gform_notify_from_name" value="<?=$notification["fromName"];?>">
					<?php
				endforeach;
				?>

				<!-- Confirmations -->
				<?php
				foreach ( $form["confirmations"] as $confirmation ) :
					?>
					<input type="hidden" name="gform_conf_name" value="<?=$confirmation["name"];?>">
					<input type="hidden" name="gform_conf_is_default" value="<?=$confirmation["isDefault"];?>">
					<input type="hidden" name="gform_conf_type" value="<?=$confirmation["type"];?>">
					<input type="hidden" name="gform_conf_message" value="<?php echo htmlentities($confirmation["message"]);?>">
					<input type="hidden" name="gform_conf_url" value="<?=$confirmation["url"];?>">
					<input type="hidden" name="gform_conf_page_id" value="<?=$confirmation["pageId"];?>">
					<input type="hidden" name="gform_conf_home_url" value="<?php bloginfo('url'); ?>">
					<?php
				endforeach;
				?>

			</div>
		</form>	

		<?php

		/**
		 * Just for testing
		 */
		// if ( current_user_can('create_users') ) :
		// 	echo '<pre>';
		// 	var_dump($form);
		// 	echo '</pre>';
		// endif;

	// 	if ( defined('PCA_AJAX_LOADING_CONTENT') ) :

	// 		echo do_shortcode( '[gravityform action="ajax" id="' . $form_id . '" title="'.$titles.'" description="'.$titles.'"]' );

	// 	elseif ( ! defined('PCA_AJAX_LOADING_CONTENT') ) :

	// 		echo do_shortcode( '[gravityform id="' . $form_id . '" title="'.$titles.'" description="'.$titles.'"]' );

	// 	endif;

		?>

</div>