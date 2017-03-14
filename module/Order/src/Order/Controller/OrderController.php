<?php
namespace Order\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Order\Form\OrderForm;
use Order\Model\Order;
class OrderController extends AbstractActionController{
	protected $OrderTable;
	public function indexAction(){
		return new ViewModel(array(
		'datacustomer' => $this->getOrderTable()->fetchAll(),
		));
	
	}
	public function getOrderTable(){
		if(!$this->OrderTable){
			$sm = $this->getServiceLocator();
			$this->OrderTable = $sm->get('Order\Model\OrderTable');
			return $this->OrderTable;
		}
	}
	public function customerAction(){
		return new ViewModel(array(
		'pesan' => $this->getOrderTable()->customer(),
		));

	}
	public function addAction(){
			$adakesalahan = FALSE;
		$form = new OrderForm();
		$form->get('submit')->setValue('Add');
		$request = $this->getRequest();
		if($request->isPost()){
		$order = new Order();
		$form->setInputFilter($order->getInputFilter());
		$form->setData($request->getPost());
		if($form->isValid()){
				$dataform =$form->getData();
				$order->exchangeArray($dataform);
				$this->getOrderTable()->saveOrder($order);					
					return $this->redirect()->toRoute(NULL , array(
				'controller' => 'Order',
				'action' => 'index'
		));									
			}else{
				$adakesalahan=TRUE;
			}
			
		}
		return new ViewModel(array(
		'form'=>$form,
		'adakesalahan'=>$adakesalahan,
		));
	
	}
	public function editAction(){
		$id_customer = $this->params()->fromRoute('id', 0);
		try{
			$order= $this->getOrderTable()->id_customer_ada($id_customer);
		}
	catch (\Exception $ex) {
			return $this->redirect()->toRoute('Order', array(
			'action' => 'index'
		));
		}
		$form = new OrderForm();
		$form->bind($order);
		$form->get('submit')->setValue('Edit');
		$request = $this->getRequest();
		if ($request->isPost()){
			$form->setInputFilter($order->getInputFilter());
			$form->setData($request->getPost());
			if($form->isValid()){
				$this->getServiceLocator()->get('Order\Model\OrderTable')->saveOrder($order);
				return $this->redirect()->toRoute(NULL, array(
				'controller' => 'Order',
				'action' => 'index'
				));
			}
		}
		return new ViewModel(array(
		'id_customer' => $id_customer,
		'form' => $form,
		));
	
	}
	
	
	public function hapusAction(){
	$adakesalahan = FALSE;
		$id_customer = $this->params()->fromRoute('id', 0);
		if (!$id_customer) {
		return $this->redirect()->toRoute('Order');
		}
		$datacustomer=$this->getOrderTable()->id_customer_ada($id_customer);
		if(!$datacustomer){
			$adakesalahan=TRUE;
		}
		$request = $this->getRequest();
		if($request->isPost()){
			$pilihan = $request->getPost('hapus', 'Tidak');
			if ($pilihan == 'Ya') {
				$id_customer = $request->getPost('id_customer');
				
				$this->getServiceLocator()->get('Order\Model\OrderTable')
					->hapusCustomer($id_customer);
				}
				
				return $this->redirect()->toRoute('Order');
		}
		return new ViewModel(array(
		'id_customer' => $id_customer,
		'datacustomer'=> $datacustomer,
		'adakesalahan'=>$adakesalahan,
		));
	}
	public function jadwalAction(){
	return new ViewModel(array(
	'datajadwal' => $this->getOrderTable()->jadwal(),
	));
	}
	
}