<?php
namespace Order\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
class Order {
public $id_customer;
public $nama;
public $jenkel;
public $tgl_lahir;
public $alamat;
public $kota;
public $kode_pos;
public $no_telfon;

public $id_pesan;
public $qty;
public $status;
public $total;

public $id_jadwal;
public $tgl_berangkat;
public $jam_berangkat;
public $harga;
public $nm_kota_asal;
public $nm_kota_tujuan;


protected $inputFilter;
public function exchangeArray($data){
$this->id_customer = (isset($data['id_customer'])) ?
	$data['id_customer'] : null;
$this->nama = (isset($data['nama'])) ? 
	$data['nama'] : null;
$this->jenkel = (isset($data['jenkel'])) ? 
	$data['jenkel'] : null;
$this->tgl_lahir = (isset($data['tgl_lahir'])) ? 
	$data['tgl_lahir'] : null;
$this->alamat = (isset($data['alamat'])) ? 
	$data['alamat'] : null;
$this->kota = (isset($data['kota'])) ? 
	$data['kota'] : null;
$this->kode_pos = (isset($data['kode_pos'])) ? 
	$data['kode_pos'] : null;
$this->no_telfon = (isset($data['no_telfon'])) ? 
	$data['no_telfon'] : null;

$this->id_pesan = (isset($data['id_pesan'])) ? 
	$data['id_pesan'] : null;
$this->qty = (isset($data['qty'])) ? 
	$data['qty'] : null;
$this->total = (isset($data['total'])) ? 
	$data['total'] : null;
$this->status = (isset($data['status'])) ? 
	$data['status'] : null;

$this->id_jadwal = (isset($data['id_jadwal'])) ? 
	$data['id_jadwal'] : null;
$this->tgl_berangkat = (isset($data['tgl_berangkat'])) ? 
	$data['tgl_berangkat'] : null;
$this->jam_berangkat = (isset($data['jam_berangkat'])) ? 
	$data['jam_berangkat'] : null;
$this->harga = (isset($data['harga'])) ? 
	$data['harga'] : null;
$this->kursi = (isset($data['kursi'])) ? 
	$data['kursi'] : null;

$this->nm_kota_asal = (isset($data['nm_kota_asal'])) ?
	$data['nm_kota_asal'] : null;
$this->nm_kota_tujuan = (isset($data['nm_kota_tujuan'])) ?
	$data['nm_kota_tujuan'] : null;
}
	public function getArrayCopy(){
        return get_object_vars($this);
    } 
	public function setInputFilter(InputFilterInterface $inputFilter){
        throw new \Exception("Not used");
    }
	public function getInputFilter(){
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
			$inputFilter->add(array(
			'name'	=>'id_customer',
			'required' => true,
			'filters' => array(
				array('name'=>'StripTags'),
			),
			'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'max'      => 1,
                        ),
                    ),
                ),
			));     
            $this->inputFilter = $inputFilter;
        }
 
        return $this->inputFilter;

}	
}