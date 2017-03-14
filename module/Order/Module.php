<?php
namespace Order;
use Order\Model\Order;
use Order\Model\OrderTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
class Module{
	public function getAutoloaderConfig(){
	return array(
	'Zend\Loader\ClassMapAutoloader' => array(
	__DIR__ . '/autoload_classmap.php',
		),
	'Zend\Loader\StandardAutoloader' => array(
	'namespaces' => array(
	__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
	),
	),
	);
}
public function getConfig(){
	return include __DIR__ . '/config/module.config.php';
	}
public function getServiceConfig(){
	return array(
	'factories' => array(
	'Order\Model\OrderTable' => function($sm){
		$tableGateway = $sm->get('OrderTableGateway');
		$table = new OrderTable($tableGateway);
		return $table;
	},
	'OrderTableGateway' => function ($sm) {
		$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
		$resultSetPrototype = new ResultSet();
		$resultSetPrototype->setArrayObjectPrototype(new Order());
		return new TableGateway('tbl_customer', $dbAdapter, null, $resultSetPrototype);
	},
	),
	);
}
	
}