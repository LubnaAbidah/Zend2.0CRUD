<?php
namespace Order\Model;
use Zend\Db\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class OrderTable{
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway){
	$this->tableGateway = $tableGateway;
	$this->select = new Select();
	}
	public function fetchAll(){
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
	function saveOrder(Order $order){
		$data = array(
			'id_customer' => $order->id_customer,
			'nama' => $order->nama,
			'jenkel' => $order->jenkel,
			'tgl_lahir' => $order->tgl_lahir,
			'alamat' => $order->alamat,
			'kota' => $order->kota,
			'kode_pos' => $order->kode_pos,
			'no_telfon' => $order->no_telfon,			
		);
		$id_customer=$order->id_customer;
		
		if($this->id_customer_ada($id_customer)){
			$this->tableGateway->update($data, array('id_customer' => $id_customer));
		}else{
			$this->tableGateway->insert($data);
		}
	}
	public function id_customer_ada($id_customer){
		$rowset = $this->tableGateway->select(array('id_customer' => $id_customer));
		$row = $rowset->current();
		return $row;
	}
	public function customer(){
		$sqlSelect = $this->tableGateway->getSql()->select();
		$sqlSelect->columns(array('id_customer','nama'));
		$sqlSelect->join('tb_pesan', 'tb_pesan.id_customer = tbl_customer.id_customer', array('id_pesan','id_jadwal','id_customer','qty','status','total'), 'inner');
		$sqlSelect->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_pesan.id_jadwal', array('id_jadwal','nm_kota_asal','nm_kota_tujuan','tgl_berangkat','jam_berangkat','harga','kursi'), 'inner');
		
		//$sqlSelect->join('tbl_customer', 'tbl_customer.id_customer = tb_pesan.id_customer', array('id_customer','nama'), 'inner');
	$resultSet = $this->tableGateway->selectWith($sqlSelect);
	return $resultSet;
	}
	public function jadwal(){
		$sqlSelect = $this->tableGateway->getSql()->select();
		$sqlSelect->columns(array('id_customer'));
		$sqlSelect->join('tb_pesan', 'tb_pesan.id_customer = tbl_customer.id_customer', array('id_pesan','id_jadwal','id_customer','qty','status','total'), 'inner');
		$sqlSelect->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_pesan.id_jadwal', array('id_jadwal','nm_kota_asal','nm_kota_tujuan','tgl_berangkat','jam_berangkat','harga','kursi'), 'inner');
		
	$resultSet = $this->tableGateway->selectWith($sqlSelect);
	return $resultSet;
	}
	public function hapusCustomer(){
		$hasil = $this->tableGateway->delete(array('id_customer' => $id_customer));
		return $hasil;
	}

	
}