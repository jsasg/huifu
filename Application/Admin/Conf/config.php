<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' => array (
			'__COMMON__' => __ROOT__ . '/Public/Common',
			'__STATIC__' => __ROOT__ . '/Public/' . MODULE_NAME,
			'__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js', // 增加新的JS类库路径替换规则
			'__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css', // 增加新的CSS类库路径替换规则
			'__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/image', // 增加新的IMG类库路径替换规则
			'__UPLOAD__' => __ROOT__ . '/Public/Uploads' ,
			'__UPIMG__'=>__ROOT__.'/Public/Uploads/images/',
	),
	'__UPIMG__'=>'./Public/Uploads/images/',
	'TMPL_ACTION_ERROR' => 'Public:jump',
	'TMPL_ACTION_SUCCESS' => 'Public:jump',
);