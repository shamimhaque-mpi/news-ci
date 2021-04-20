<?php class Menu extends Admin_Controller{
	function __construct() {
		parent::__construct();
	}

    public function index() {
		$this->data['meta_keyword'] = 'Menu';
		$this->data['meta_title'] = '';
		$this->data['meta_description'] = '';
        
        if($_POST){
            if(!check_exists('menus', ['name'=>$_POST['name']])){
                save('menus', $_POST);
                set_msg('success', 'Menu Successfully Saved');
                redirect('menu/Menu?system_id=NjRfMTE1');
            }
            else{
                set_msg('warning', 'Menu Name Has Already Been Token');
                redirect('menu/Menu?system_id=NjRfMTE1');
            }
        }
        
		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/includes/aside', $this->data);
		$this->load->view('admin/includes/headermenu', $this->data);
		$this->load->view('admin/includes/nav', $this->data);
		$this->load->view('components/menu/add', $this->data);
		$this->load->view('admin/includes/footer', $this->data);
    }

    public function all() {
		$this->data['meta_keyword'] = 'Menu';
		$this->data['meta_title'] = '';
		$this->data['meta_description'] = '';
        
        $this->data['menus'] = read('menus', ['trash'=>0]);
        
		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/includes/aside', $this->data);
		$this->load->view('admin/includes/headermenu', $this->data);
		$this->load->view('admin/includes/nav', $this->data);
		$this->load->view('components/menu/all', $this->data);
		$this->load->view('admin/includes/footer', $this->data);
    }

    public function edit($id=null) {
		$this->data['meta_keyword'] = 'Menu';
		$this->data['meta_title'] = '';
		$this->data['meta_description'] = '';
        
        $this->data['menu'] = read('menus', ['id'=>$id])[0];
        
        if($_POST){
            update('menus', $_POST, ['id'=>$id]);
            set_msg('success', 'Menu Successfully Updated');
            redirect("menu/Menu/edit/{$id}?system_id=NjRfMTE2");
        }
        
		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/includes/aside', $this->data);
		$this->load->view('admin/includes/headermenu', $this->data);
		$this->load->view('admin/includes/nav', $this->data);
		$this->load->view('components/menu/edit', $this->data);
		$this->load->view('admin/includes/footer', $this->data);
    }

    public function delete($id){
        update('menus', ['trash'=>1], ['id'=>$id]);
        set_msg('success', 'Menu Successfully Deleted');
        redirect("menu/Menu/all?system_id=NjRfMTE2");
    }
}
