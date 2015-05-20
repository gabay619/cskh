<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Log hành vi',

	'single' => 'log hành vi',

	'model' => 'ActivityLog',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'user' => array(
			'title' => 'User',
			'relationship' => "user",
			'select' => "username",
		),
		'content_type',
		'content_id',
		'action',
		'description',
		'details',
		'ip_address',
		'created_at',
		'user_agent',
		'updated_at',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'content_type' => array(
			'title' => 'Loại dữ liệu',
		),
		'content_id' => array(
			'title' => 'ID bản ghi',
		),
		'ip_address',
		'user' => array(
			'title' => 'Username',
			'type' => 'relationship',
			'name_field' => "username",
			'autocomplete' => true,
			'num_options' => 5,
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'id'
	),
);