<?php

\Yii::$container->set('yii\data\Pagination', [
	'pageSizeLimit' => [1, 15],
]);

\Yii::$container->set('yii\grid\GridView', [
	'pager' => [
		'prevPageLabel' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
		'nextPageLabel' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		'firstPageLabel'=> 'First',
		'lastPageLabel' => 'Last',
		'maxButtonCount'=> 5,
		'options' => [
			// 'tag' => 'div',
			'class' => 'pagination',
			// 'id' => 'pager-container',
		],
		'linkContainerOptions' => ['class' => 'page-item',],
		'linkOptions' => ['class' => 'page-link'],
		'disabledListItemSubTagOptions' => ['class' => 'page-link disabled']
	],
]);


