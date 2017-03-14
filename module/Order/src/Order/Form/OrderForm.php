<?php
namespace Order\Form;
use Zend\Form\Form;
class OrderForm extends Form{
public function __construct($name = null)
{
	parent::__construct('order');
	$this->add(array(
	'name' => 'id_customer',
	'type' => 'Text',
	'options' => array(
	'label' => 'ID Customer: ',
	),
	));
	$this->add(array(
             'name' => 'nama',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Nama: ',
             ),
         ));

		 $this->add(array(
             'name' => 'jenkel',
             'type' => 'Select',
             'options' => array(
                 'label' => 'Jenis Kelamin: ',
				 'value_options' => array(
					'L' => 'L',
					'P' => 'P',
					
				),
             ),
         ));
         $this->add(array(
             'name' => 'tgl_lahir',
             'type' => 'Date',
             'options' => array(
                 'label' => 'Tgl Lahir: ',
             ),
         ));
		 $this->add(array(
             'name' => 'alamat',
             'type' => 'Textarea',
             'options' => array(
                 'label' => 'Alamat: ',
             ),
         ));
		 $this->add(array(
             'name' => 'kota',
             'type' => 'Text',
             'options' => array(
                 'label' => 'kota: ',
             ),
         ));
		 $this->add(array(
             'name' => 'kode_pos',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Kode Pos: ',
             ),
         ));
          $this->add(array(
             'name' => 'no_telfon',
             'type' => 'Text',
             'options' => array(
                 'label' => 'No Telfon: ',
             ),
         ));
		 $this->add(array(
		 'name' => 'submit',
		 'type' => 'Submit',
		 'attributes' => array(
		 'value' => 'Go',
		 'id' => 'submitbutton',
		 ),
		 ));
}
}