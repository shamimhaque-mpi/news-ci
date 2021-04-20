<?php

class Comments extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'Visitors';
        $this->data['active'] = 'data-target="visitor"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;
        
        $this->data['messages']=read('visitor_comments',array(),'id DESC');

        if ($this->input->post('view_query')) {
            $where=array('messages_date'=>$this->input->post('date'));
            $this->data['messages']=read('messages',$where,'id DESC');
        }

        //---------------------Delete Data Start------------------------------
        
        
         //All Delete start
                if($this->input->post("delete_all")) {

                    $amount=array();

                    foreach ($this->input->post("id") as $id) {
                        $where=array('id'=>$id);
                                               
                        if(delete('visitor_comments',$where)){
                            $amount[]=$id; 
                        }else{
                            set_msg('warning', 'warning', 'Message Not Deleted !');
                            redirect('visitors/comments','refresh');   
                        }
                    }
                    set_msg('success', 'success', 'Message Permanently Deleted !');
                    redirect('visitors/comments','refresh');         
          
             }
            //All Delete end
        
        
        
        
        
        if($this->input->get("id")){//Deleting Message
            delete('visitor_comments',array('id'=>$this->input->get("id")));
            redirect('visitors/comments?d_success=1','refresh');
        }

        if ($this->input->get("d_success")==1){
            set_msg("success", 'success', 'Message Successfully Deleted');
        }
        //---------------------Delete Data End--------------------------------

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('components/visitor_comments/index', $this->data);
        $this->load->view('admin/includes/footer');
    }

    public function view_comments($emit = NULL) {
        $this->data['meta_title'] = 'Visitors';
        $this->data['active'] = 'data-target="visitor"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        $where=array('id'=>$this->input->get('id'));
        
        $this->data['messages']=read('visitor_comments',$where);
        
        
        $data=array("status"=>"read");
        update('visitor_comments',$data,$where);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('components/visitor_comments/view_comments', $this->data);
        $this->load->view('admin/includes/footer');
    } 



   private function holder() {
        $holder = config_item("privilege");
        if(!(in_array($this->session->userdata('holder'), $holder)))
        {
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}