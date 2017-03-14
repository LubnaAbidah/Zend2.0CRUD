<?php

return array(
'controllers' => array(
'invokables' => array(
	'Order\Controller\Order' =>
	'Order\Controller\OrderController',

),
),
	'router' => array(
	'routes'=> array(
	'Order' => array(
	'type' => 'segment',
	'options' => array(
	'route' => '/order[/][:action][/:id]',
	'constraints' => array(
	'action' =>'[a-zA-Z][a-zA-Z0-9_-]*',
		'id' => '[a-zA-Z0-9_-]*',
		),
	'defaults' => array(
	'__NAMESPACE__' => 'Order\Controller',
	'controller' => 'Order',
	'action' => 'index',
			),
		),
		),
	),
	),
	'view_manager' => array(
	'template_path_stack' => array(
	'Order'=> __DIR__ . '/../view',
	),
	),
);