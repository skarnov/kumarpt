<?php

class Shop_Model extends CI_Model {

    public function check_password($data)
    {
        $sql="select * from tbl_shop where email='$data'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function forget_password($data, $templateName)
    {
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);  
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }  
    
    public function select_total_info()
    {
        $sql = "SELECT SUM(total_price) AS total FROM tbl_repair ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_paid_info()
    {
        $sql = "SELECT SUM(paid_amount) AS paid FROM tbl_repair ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_balance_info()
    {
        $sql = "SELECT SUM(balance_amount) AS balance FROM tbl_repair ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_sales_info()
    {
        $sql = "SELECT SUM(total_price) AS sales FROM tbl_sales ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function shop_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('email', $data['email']);
        $this->db->where('password', ($data['password']));
        $this->db->where('shop_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function save_customer_info()
    {
        $data=array();
        $data['customer_input_id'] = $this->input->post('customer_input_id', true);
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true); 
        $data['customer_registration_date'] = $this->input->post('customer_registration_date', true);   
        $this->db->insert('tbl_customer',$data);
    }
    
    public function select_all_customer($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_customer LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_customer_by_id($customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_customer_info()
    {
        $data=array();
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_input_id'] = $this->input->post('customer_input_id', true);
        $data['customer_registration_date'] = $this->input->post('customer_registration_date', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true); 
        $customer_id=$this->input->post('customer_id',true);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$data);
    }
    
    public function delete_customer_by_id($customer_id)
    {
        $this->db->where('customer_id',$customer_id);
        $this->db->delete('tbl_customer');
    }
    
    public function customer_search($text)
    {	
        $sql = "SELECT * FROM tbl_customer WHERE customer_input_id LIKE '%$text%' OR customer_mobile LIKE '%$text%' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function save_repair_info()
    {
        $data=array();
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['item_name'] = $this->input->post('item_name', true);
        $data['problem'] = $this->input->post('problem', true);
        $data['imei'] = $this->input->post('imei', true);
        $data['total_price'] = $this->input->post('total_price', true);
        $data['paid_amount'] = $this->input->post('paid_amount', true);
        $data['balance_amount'] = $this->input->post('balance_amount', true);
        $data['receive_date'] = $this->input->post('receive_date', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);  
        $data['remark'] = $this->input->post('remark', true);   
        $data['model_no'] = $this->input->post('model_no', true);
        $data['extra_problem'] = $this->input->post('extra_problem', true);
        $data['battery_provide'] = $this->input->post('battery_provide', true);         
        $data['delivery_date'] = $this->input->post('delivery_date', true);        
        $this->db->insert('tbl_repair',$data);
    }
   
    public function select_all_repair($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_repair ORDER BY repair_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_repair_last_id()
    {
        $sql = "SELECT * FROM tbl_repair ORDER BY repair_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_repair_by_id($repair_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_repair');
        $this->db->where('repair_id',$repair_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_repair_info()
    {
        $data=array();
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['item_name'] = $this->input->post('item_name', true);
        $data['problem'] = $this->input->post('problem', true);
        $data['imei'] = $this->input->post('imei', true);
        $data['total_price'] = $this->input->post('total_price', true);
        $data['paid_amount'] = $this->input->post('paid_amount', true);
        $data['balance_amount'] = $this->input->post('balance_amount', true);
        $data['receive_date'] = $this->input->post('receive_date', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);  
        $data['remark'] = $this->input->post('remark', true);   
        $data['model_no'] = $this->input->post('model_no', true);
        $data['extra_problem'] = $this->input->post('extra_problem', true);
        $data['battery_provide'] = $this->input->post('battery_provide', true);         
        $data['delivery_date'] = $this->input->post('delivery_date', true);       
        $data['delivery_status'] = $this->input->post('delivery_status', true);       
        $data['from_where'] = $this->input->post('from_where', true);       
        $data['how_much'] = $this->input->post('how_much', true);       
        $repair_id=$this->input->post('repair_id',true);
        $this->db->where('repair_id',$repair_id);
        $this->db->update('tbl_repair',$data);
    }
    
    public function delete_repair_by_id($repair_id)
    {
        $this->db->where('repair_id',$repair_id);
        $this->db->delete('tbl_repair');
    }
    
    public function repair_search($text)
    {	
        $sql = "SELECT * FROM tbl_repair WHERE repair_id LIKE '%$text%' OR customer_mobile LIKE '%$text%' OR imei LIKE '%$text%' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function save_sales_info()
    {
        $data=array();
        $data['sales_date'] = $this->input->post('sales_date', true);
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['first_item'] = $this->input->post('first_item', true);
        $data['second_item'] = $this->input->post('second_item', true);
        $data['third_item'] = $this->input->post('third_item', true);        
        $data['total_price'] = $this->input->post('total_price', true);        
        $data['paid_amount'] = $this->input->post('paid_amount', true);        
        $data['warranty_end_date'] = $this->input->post('warranty_end_date', true);        
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);        
        $data['first_price'] = $this->input->post('first_price', true);        
        $data['second_price'] = $this->input->post('second_price', true);        
        $data['third_price'] = $this->input->post('third_price', true);        
        $data['balance_amount'] = $this->input->post('balance_amount', true);        
        $data['remark'] = $this->input->post('remark', true);              
        $this->db->insert('tbl_sales',$data);
    }
    
    public function select_all_sales($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_sales LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_sales_last_id()
    {
        $sql = "SELECT * FROM tbl_sales ORDER BY sales_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_sales_by_id($sales_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sales');
        $this->db->where('sales_id',$sales_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

    public function update_sales_info()
    {
        $data=array();
        $data['sales_date'] = $this->input->post('sales_date', true);
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['first_item'] = $this->input->post('first_item', true);
        $data['second_item'] = $this->input->post('second_item', true);
        $data['third_item'] = $this->input->post('third_item', true);        
        $data['total_price'] = $this->input->post('total_price', true);        
        $data['paid_amount'] = $this->input->post('paid_amount', true);        
        $data['warranty_end_date'] = $this->input->post('warranty_end_date', true);        
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);        
        $data['first_price'] = $this->input->post('first_price', true);        
        $data['second_price'] = $this->input->post('second_price', true);        
        $data['third_price'] = $this->input->post('third_price', true);        
        $data['balance_amount'] = $this->input->post('balance_amount', true);        
        $data['remark'] = $this->input->post('remark', true);                           
        $sales_id=$this->input->post('sales_id',true);
        $this->db->where('sales_id',$sales_id);
        $this->db->update('tbl_sales',$data);
    }
    
    public function delete_sales_by_id($sales_id)
    {
        $this->db->where('sales_id',$sales_id);
        $this->db->delete('tbl_sales');
    }
    
    public function sales_search($text)
    {	
        $sql = "SELECT * FROM tbl_sales WHERE sales_id LIKE '%$text%' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
}