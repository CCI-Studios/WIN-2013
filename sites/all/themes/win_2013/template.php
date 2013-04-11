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

	// redirect after register
	if ($form_id == 'user_register_form') {
		$form_state['redirect'] = 'node/add/member';
	}

	if ($form_id == 'member_node_form') {
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

function win_2013_preprocess_node(&$vars) {

	if (!path_is_admin($_GET['q'])) {
		if (isset($vars['content']['field_date']) && isset($vars['content']['field_registration_form'])) {
			$date = $vars['content']['field_date']['#items'][0]['value'];
			$now = time();
			$week = strtotime('2 week');

			if ($date < $now || $date > $week) {
				unset($vars['content']['field_registration_form']);
			}
		}

		if (isset($vars['content']['field_presenter'])) {
			unset($vars['content']['field_presenter_form']);
		}
	}
}