<?php

/**
 * Actors model config
 */

return array(

    'title' => 'Games',

    'single' => 'game',

    'model' => 'Game',

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name' => array(
            'title'=>'Tên Game',
            'select'=>'name'
        ),
    ),

    /**
     * The filter set
     */
    'filters' => array(
        'id',
        'name'=>array(
            'title'=>'Username'
        )
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name'=>array(
            'title'=>'Tên game',
            'type'=>'text'
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