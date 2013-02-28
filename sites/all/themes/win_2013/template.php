<?php

// add menu classes to all menus
function win_2013_preprocess_menu_link(&$vars) {
 	$classes = $vars['element']['#attributes']['class'];
 	$name = $vars['element']['#title'];
 	$name = 'menu-'. str_replace(' ', '', strtolower($name));

 	$classes[] = $name;
 	$vars['element']['#attributes']['class'] = $classes;
}

function win_2013_preprocess_views_view(&$vars) {

}

function win_2013_theme(&$existing, $type, $theme, $path) {
	$hooks['user_login_block'] = array(
		'template' => 'templates/user-login-block',
		'render element' => 'form',
	);

	return $hooks;
}

function win_2013_form_alter(&$form, &$form_state, $form_id) {
	$containers = array('container', 'fieldset');
	$fields = array('textfield', 'password');

	// add placeholders everywhere
	// foreach($form as $field => $values) {
	// 	if (is_array($values) && isset($values['#type']) &&
	// 	 in_array($values['#type'], $fields) && isset($values['#title'])) {
	// 		$form[$field]['#attributes']['placeholder'] = $values['#title'];
	// 		$form[$field]['#title'] = null;
	// 	}
	// }

	// redirect after register
	if ($form_id == 'user_register_form') {
		$form_state['redirect'] = 'node/add/member';
	}

	if ($form_id == 'member_node_form') {
		// var_dump("<pre>");
		// var_dump($form['field_google_maps_link']['und'][0]['title']);
		// var_dump("</pre>");

		$form['field_google_maps_link']['und'][0]['title']['#type'] = 'hidden';
		$form['field_google_maps_link']['und'][0]['title']['#default_value'] = 'Google Maps';
	}
}


function win_2013_preprocess_user_login_block(&$vars) {
	$vars['form']['links'] = null; // kill links

	$vars['name'] = render($vars['form']['name']);
	$vars['pass'] = render($vars['form']['pass']);
	$vars['submit'] = render($vars['form']['actions']['submit']);
	$vars['rendered'] = drupal_render_children($vars['form']);
}