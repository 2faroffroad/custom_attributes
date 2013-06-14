<fieldset class='box show_only'>
<?php 
foreach ($fields as $field) { 
	if (!$field['b_search']) continue;
	$field_id = $field['pk_i_id'];
	$name = 'field_' . $field_id;
	$label = $field['s_label'];
	$type = $field['s_type'];
	$value = Params::getParam($name);
?>
	<div class='row one_input'>
		<h6><?php echo $label; ?></h6>
<?php if ($type == 'text') { ?>
			<input type='text' name='<?php echo $name; ?>' value='<?php echo $value; ?>' />
<?php } else if ($type == 'checkbox') { ?>
<?php   $checked = ($value == 'checked') ? " checked='checked'" : ''; ?>
				<input class='search_checkbox' type='checkbox' id='<?php echo $name; ?>' name='<?php echo $name; ?>' value='checked'<?php echo $checked; ?> />
				<label class='search_label' for='<?php echo $name; ?>'><?php _e('Check to show listings', PLUGIN_NAME); ?></label>
<?php } elseif ($type == 'date') { ?>	
				<input class='search_date' type='text' name='<?php echo $name; ?>' value='<?php echo $value; ?>' />					
<?php } else if ($type == 'select') { ?>		
				<select class='search_select' name='<?php echo $name; ?>'>
					<?php ca_select_options($field_id, $value); ?>
				</select>
<?php } else if ($type == 'radio') { ?>	
			<?php ca_radio_buttons($field_id, $name, $value); ?>
<?php } elseif ($type == 'textarea') {  ?>
			<textarea class='search_textarea' name='<?php echo $name; ?>'><?php echo $value; ?></textarea>				
<?php } ?>
	</div>
<?php } ?>
</fieldset>
<?php //END