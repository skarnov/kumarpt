<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Evis_shop extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $shop_id = $this->session->userdata('shop_id');
        if ($shop_id == NULL)
        {
            redirect('shop_login', 'refresh');
        }
    }

   public function index()
    {
        $data = array();
        $data['title'] = 'Evis App Dashboard';
        $data['total_info'] = $this->shop_model->select_total_info();
        $data['paid_info'] = $this->shop_model->select_paid_info();
        $data['balance_info'] = $this->shop_model->select_balance_info();
        $data['sales_info'] = $this->shop_model->select_sales_info();
        $data['dashboard'] = $this->load->view('shop_dashboard', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function logout() 
    {
        $this->session->unset_userdata('shop_id');
        $this->session->unset_userdata('shop_name');
        $sdata['exception'] = 'You are successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('shop_login');
    }
    
    public function add_customer() 
    {
        $data = array();
        $data['title'] = 'Add Customer';
        $data['dashboard'] = $this->load->view('add_customer', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function save_customer() 
    {
        $this->shop_model->save_customer_info();
        $sdata = array();
        $sdata['message'] = 'Save Customer Successfully';
        $this->session->set_userdata($sdata);
        redirect('evis_shop/add_customer');
    }
    
    public function manage_customer()
    {
        $data = array();
        $data['title'] = 'Manage Customer';
        $config['base_url'] = base_url() . 'evis_shop/manage_customer/';
        $config['total_rows'] = $this->db->count_all('tbl_customer');
        $config['per_page'] = '8';
        /**STYLE PAGINATION**/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_customer'] = $this->shop_model->select_all_customer($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_customer', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function edit_customer($customer_id)
    {
        $data = array();
        $data['title'] = 'Edit Customer';
        $data['customer_info'] = $this->shop_model->select_customer_by_id($customer_id);
        $data['dashboard'] = $this->load->view('edit_customer', $data, true);
        $sdata = array();
        $sdata['message'] = 'Update customer information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('shop', $data);
    }
    
    public function update_customer()
    {
        $this->shop_model->update_customer_info();
        redirect('evis_shop/manage_customer');
    }

    public function delete_customer($customer_id) 
    {
        $this->shop_model->delete_customer_by_id($customer_id);
        redirect('evis_shop/manage_customer');
    }

    public function customer_search()
    {
        $text = $this->input->post('text', true);
        $data = array();
        $data['title'] = 'Customer Search';
        $data['search_customer'] = $this->shop_model->customer_search($text);
        $data['dashboard'] = $this->load->view('customer_search', $data, true);
        $this->load->view('shop', $data); 
    }
    
    public function add_repair() 
    {
        $data = array();
        $data['title'] = 'Add Repair';
        $data['last_id'] = $this->shop_model->select_repair_last_id();
        $data['dashboard'] = $this->load->view('add_repair', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function save_repair() 
    {
        $this->shop_model->save_repair_info();
        $sdata = array();
        $sdata['message'] = 'Save Repair Successfully';
        $this->session->set_userdata($sdata);
        redirect('evis_shop/add_repair');
    }
    
    public function manage_repair()
    {
        $data = array();
        $data['title'] = 'Manage Repair';
        $config['base_url'] = base_url() . 'evis_shop/manage_repair/';
        $config['total_rows'] = $this->db->count_all('tbl_repair');
        $config['per_page'] = '8';
        /**STYLE PAGINATION**/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_repair'] = $this->shop_model->select_all_repair($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_repair', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function print_repair($repair_id)
    {
        $data = array();
        $data['title'] = 'Print Repair';
        $data['print_info'] = $this->shop_model->select_repair_by_id($repair_id);
        $data['dashboard'] = $this->load->view('print_repair', $data, true);
        $this->load->view('print_repair', $data);
    }

    public function edit_repair($repair_id)
    {
        $data = array();
        $data['title'] = 'Edit repair';
        $data['repair_info'] = $this->shop_model->select_repair_by_id($repair_id);
        $data['dashboard'] = $this->load->view('edit_repair', $data, true);
        $sdata = array();
        $sdata['message'] = 'Update repair information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('shop', $data);
    }
    
    public function update_repair()
    {
        $this->shop_model->update_repair_info();
        redirect('evis_shop/manage_repair');
    }

    public function delete_repair($repair_id) 
    {
        $this->shop_model->delete_repair_by_id($repair_id);
        redirect('evis_shop/manage_repair');
    }
    
    public function repair_search()
    {
        $text = $this->input->post('text', true);
        $data = array();
        $data['title'] = 'Repair Search';
        $data['search_repair'] = $this->shop_model->repair_search($text);
        $data['dashboard'] = $this->load->view('repair_search', $data, true);
        $this->load->view('shop', $data); 
    }
    
    public function add_sales() 
    {
        $data = array();
        $data['title'] = 'Add Sales';
        $data['last_id'] = $this->shop_model->select_sales_last_id();
        $data['dashboard'] = $this->load->view('add_sales', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function save_sales() 
    {
        $this->shop_model->save_sales_info();
        $sdata = array();
        $sdata['message'] = 'Save Sales Successfully';
        $this->session->set_userdata($sdata);
        redirect('evis_shop/add_sales');
    }
    
    public function manage_sales()
    {
        $data = array();
        $data['title'] = 'Manage Sales';
        $config['base_url'] = base_url() . 'evis_shop/manage_sales/';
        $config['total_rows'] = $this->db->count_all('tbl_sales');
        $config['per_page'] = '5';
        /**STYLE PAGINATION**/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_sales'] = $this->shop_model->select_all_sales($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_sales', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function print_sales($sales_id)
    {
        $data = array();
        $data['title'] = 'Print Sales';
        $data['print_info'] = $this->shop_model->select_sales_by_id($sales_id);
        $data['dashboard'] = $this->load->view('print_sales', $data, true);
        $this->load->view('print_sales', $data);
    }

    public function delete_sales($sales_id) 
    {
        $this->shop_model->delete_sales_by_id($sales_id);
        redirect('evis_shop/manage_sales');
    }
    
    public function sales_search()
    {
        $text = $this->input->post('text', true);
        $data = array();
        $data['title'] = 'Sales Search';
        $data['search_sales'] = $this->shop_model->sales_search($text);
        $data['dashboard'] = $this->load->view('sales_search', $data, true);
        $this->load->view('shop', $data); 
    }
}