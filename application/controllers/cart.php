<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->no_cache();
		$this->load->library('cart');
	}

	public function index(){
		$this->load->view('client/form');
	}

	public function add(){
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('qty');
		$rate = $this->input->post('rate');
		$product_name = $this->input->post('product_name');
		$size = $this->input->post('size');
		$image = $this->input->post('product_image');

		//counting the number of products added to cart and checking
		if(count($this->cart->contents()) > 0){
			foreach($this->cart->contents() as $item){
				//IF CONDITION TO CHECK WHETHER PRODUCT IS ALREADY INSERTED IN CART
				if($item['name'] == $product_name)
				{
					$new_qty = $item['qty'] + $quantity;
					$row_id = $item['rowid'];
					$data = array(
				               'rowid' => $row_id,
				               'qty'   => $new_qty
				            );

					$this->cart->update($data);
					$notification_flag = 1;
					$flag = 1;
					break;
				}
				else{
					$flag = 2;
				}
			}
			if($flag == 2){
				$data = array(
					'id'      => $product_id,
					'qty'     => $quantity,
					'price'   => $rate,
					'name'    => $product_name,
					'options' => array('Size' => $size , 'type' => 'product')
					);	
				$this->cart->insert($data);
				$notification_flag = 1;
			}
		}else{
			$data = array(
					'id'      => $product_id,
					'qty'     => $quantity,
					'price'   => $rate,
					'name'    => $product_name,
					'options' => array('Size' => $size , 'type' => 'product')
					);	
			$this->cart->insert($data);
			$notification_flag = 1;
		}
		if($notification_flag == 1){
			echo count($this->cart->contents());	
		}else{
			echo "error";
		}		
	}

	public function addPackage(){
		$plan_id = $this->input->post('plan_id');
		$quantity = $this->input->post('qty');
		$rate = $this->input->post('rate');
		$plan_title = $this->input->post('plan_title');

		//counting the number of plan added to cart and checking
		if(count($this->cart->contents()) > 0){
			foreach($this->cart->contents() as $item){
				//IF CONDITION TO CHECK WHETHER PRODUCT IS ALREADY INSERTED IN CART
				if($item['id'] == $plan_id)
				{
					$new_qty = $item['qty'] + $quantity;
					$row_id = $item['rowid'];
					$data = array(
				               'rowid' => $row_id,
				               'qty'   => $new_qty
				            );

					$this->cart->update($data);
					$notification_flag = 1;
					$flag = 1;
					break;
				}
				else{
					$flag = 2;
				}
			}
			if($flag == 2){
				$data = array(
					'id'      => $plan_id,
					'qty'     => $quantity,
					'price'   => $rate,
					'name'    => $plan_title,
					'options' => array('type' => 'plan')
					);	
				$this->cart->insert($data);
				$notification_flag = 1;
			}
		}else{
			$data = array(
					'id'      => $plan_id,
					'qty'     => $quantity,
					'price'   => $rate,
					'name'    => $plan_title,
					'options' => array('type' => 'plan')
					);	
			$this->cart->insert($data);
			$notification_flag = 1;
		}
		if($notification_flag == 1){
			echo count($this->cart->contents());	
		}else{
			echo "error";
		}	
	}

	public function addSession(){
		$session_id = $this->input->post('session_id');
		$quantity = $this->input->post('qty');
		$rate = $this->input->post('rate');
		$session_title = $this->input->post('session_title');

		//counting the number of plan added to cart and checking
		if(count($this->cart->contents()) > 0){
			foreach($this->cart->contents() as $item){
				//IF CONDITION TO CHECK WHETHER PRODUCT IS ALREADY INSERTED IN CART
				if($item['id'] == $session_id)
				{
					$new_qty = $item['qty'] + $quantity;
					$row_id = $item['rowid'];
					$data = array(
				               'rowid' => $row_id,
				               'qty'   => $new_qty
				            );

					$this->cart->update($data);
					$notification_flag = 1;
					$flag = 1;
					break;
				}
				else{
					$flag = 2;
				}
			}
			if($flag == 2){
				$data = array(
					'id'      => $session_id,
					'qty'     => $quantity,
					'price'   => $rate,
					'name'    => $session_title,
					'options' => array('type' => 'session')
					);	
				$this->cart->insert($data);
				$notification_flag = 1;
			}
		}else{
			$data = array(
					'id'      => $session_id,
					'qty'     => $quantity,
					'price'   => $rate,
					'name'    => $session_title,
					'options' => array('type' => 'session')
					);		
			$this->cart->insert($data);
			$notification_flag = 1;
		}
		if($notification_flag == 1){
			echo count($this->cart->contents());	
		}else{
			echo "error";
		}	
	}


	public function viewStore(){
		$this->load->view('client/store');
	}
	
	public function view(){
		$this->load->view('client/cart');
	}
	public function update(){
		$counter = count($this->cart->contents());
		for($i=1;$i<=$counter;$i++)
		{
			$row = $i."id";
			$row_value = $this->input->post($row);

			$quantity = $i."qty";
			$quantity_value = $this->input->post($quantity);
			$vari = array(
               				'rowid' => $row_value,
               				'qty'   => $quantity_value
            		);
			$data[] = $vari;
		}
			/*echo $row_value;
			echo $quantity_value;
			echo "<pre>";
			var_dump($data);
			echo "</pre>";*/
			//die;

 			if($this->cart->update($data)){
 				$redirect = base_url()."cart/view";
 				redirect($redirect);
 			}
 			else{
 				echo "error";
 			}
	}

	/** Clear the old cache (usage optional) **/ 
	protected function no_cache(){
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
	}
}