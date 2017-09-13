<?php

add_filter('give_insert_user_args', 'gpfura_custom_give_user_role');

function gpfura_custom_give_user_role( $user_args ) {

	global $post;

	$form_id = $_POST['give-form-id'];

	$user_role = get_post_meta($form_id, 'user-role-fields_user_role', true);

	$user_args['role'] = $user_role;

	return $user_args;
}