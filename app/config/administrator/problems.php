<?php

/**
 * Actors model config
 */

return array(

    'title' => 'Vấn đề',

    'single' => 'problem',

    'model' => 'Problem',

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'title' => array(
            'title'=>'Nội dung',
            'select'=>'title'
        ),
    ),

    /**
     * The filter set
     */
    'filters' => array(
        'id',
        'title'=>array(
            'title'=>'Nội dung'
        )
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'title'=>array(
            'title'=>'Nội dung',
            'type'=>'text'
        )
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