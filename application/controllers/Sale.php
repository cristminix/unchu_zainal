<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['sale_model', 'customer_model', 'item_model']);
        is_logged_in();
    }

    public function index()
    {
            $data['title'] = 'Sale e-POS';
            $data['content'] = 'sale/index';
            $data['menu'] = 'sale';
    
            $data['customer'] = $this->customer_model->getAll();

            // $initials_invoice = setting_shop()['initials_invoice'];
           
            $data['invoice'] = $this->sale_model->invoice_no();
  
            $data['item'] = $this->item_model->getAll();
            $data['cart'] = $this->sale_model->get_cart();
            
            $this->load->view('template', $data);
    }

    public function cart_data()
    {
            $data['cart'] = $this->sale_model->get_cart();
            $this->load->view('sale/cart_data', $data);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if(isset($_POST['add_cart'])){
            $id_item = $this->input->post('id_item');
            $check_cart = $this->sale_model->get_cart(['tb_cart.id_item' => $id_item]);
            if($check_cart->num_rows() > 0){
                $this->sale_model->update_cart_qty($data);
            }else{
                $this->sale_model->add_cart($data);
            }
    
            if($this->db->affected_rows() > 0){
                $params = [
                    "success" => true
                ];
            }else{
                $params = [
                    "success" => false
                ];
            }
            
            echo json_encode($params);
        }

        if(isset($_POST['edit_cart'])){

            $this->sale_model->edit_cart($data);
            
            if($this->db->affected_rows() > 0){
                $params = [
                    "success" => true
                ];
            }else{
                $params = [
                    "success" => false
                ];
            }
            
            echo json_encode($params);
        }

        if(isset($_POST['process-payment'])){
            
            $id_sale = $this->sale_model->add_sale($data);
            $cart = $this->sale_model->get_cart()->result();
            $row = [];
            foreach ($cart as $c => $value ) {
                array_push($row, array(
                    'id_sale' => $id_sale,
                    'id_item' => $value->id_item,
                    'price' => $value->price,
                    'qty' => $value->qty,
                    'discount_item' => $value->discount_item,
                    'total' => $value->total,
                )
                );
            }

            $this->sale_model->add_sale_detail($row);
            $this->sale_model->del_cart(['id_user' => $this->session->userdata('id_user')]);

            if($this->db->affected_rows() > 0){
                $params = [
                    "success" => true,
                    "id_sale" => $id_sale
                ];
            }else{
                $params = [
                    "success" => false
                ];
            }
            
            echo json_encode($params);

        }

    } 


    
    public function cart_del()
    {
        if(isset($_POST['cancel_payment'])){
            $this->sale_model->del_cart(['id_user' => $this->session->userdata('id_user')]);
        } else {
            $id_cart = $this->input->post('id_cart');
            $this->sale_model->del_cart(['id_cart' => $id_cart]);
        }   

 
        
        if($this->db->affected_rows() > 0){
            $params = [
                "success" => true 
            ];
        }else{
            $params = [
                "success" => false
            ];
        }
        
        echo json_encode($params);
    }

    public function cetak($id)
    {

        $data = [
            'sale' => $this->sale_model->getSale($id)->row(),
            'sale_detail' => $this->sale_model->getSaleDetail($id)->result(),
            'sale_detail_jml' => $this->sale_model->getSaleDetail($id)->num_rows(),
            'sale_detail_discount' => $this->sale_model->getSaleDetail($id, "0")->num_rows(),
            'setting_shop' => setting_shop()
        ];

        
        if($data['sale_detail_jml'] == $data['sale_detail_discount'] ){
            $data['disc_jml'] = "tidak ada";
        }else{
            $data['disc_jml'] = "ada"; 
        }

        $this->load->view('sale/receipt_print', $data);
    }
} 