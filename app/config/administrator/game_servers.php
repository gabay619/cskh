<?php

/**
 * Actors model config
 */

return array(

    'title' => 'Server',

    'single' => 'server',

    'model' => 'GameServer',

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name' => array(
            'title'=>'Tên',
            'select'=>'name'
        ),
        'order_number' => array(
            'title'=>'Thứ tự',
            'select'=>'order_number'
        ),
        'game' => array(
            'title' => 'Game',
            'relationship' => 'game',
            'select' => "name",
        ),
    ),

    /**
     * The filter set
     */
    'filters' => array(
        'id',
        'name'=>array(
            'title'=>'Tên'
        ),
        'order_number'=>array(
            'title'=>'Thứ tự'
        ),
        'game' => array(
            'title' => 'Game',
            'type' => 'relationship',
            'relationship' => 'game',
            'name_field' => 'name' // The column name which holds the name of the role
        ),
        'created_at' => array(
            'title' => 'Thời gian đăng ký',
            'type' => 'date',
        ),
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name'=>array(
            'title'=>'Tên',
            'type'=>'text'
        ),
        'order_number'=>array(
            'title'=>'Thứ tự',
            'type'=>'text'
        ),
        'game' => array(
            'title' => 'Game',
            'type' => 'relationship',
            'relationship' => 'game',
            'name_field' => 'name' // The column name which holds the name of the role
        ),
    ),

    /**
     * This is where you can define the model's custom actions
     */
    'actions' => array(
//		//Ordering an item up
//		'hash_password' => array(
//			'title' => 'Mã hóa password',
//			'messages' => array(
//				'active' => 'Hashing password...',
//				'success' => 'Mã hóa mật khẩu thành công',
//				'error' => 'Mã hóa mật khẩu lỗi',
//			),
//			//the model is passed to the closure
//			'action' => function(&$model)
//			{
//				$model->password=Hash::make($model->password);
//				return $model->save();
//			}
//		),
    ),
);