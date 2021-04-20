<?php class Trash extends Admin_Controller{
	function __construct() {
		parent::__construct();
	}

    public function menu() {
		$this->data['meta_keyword'] = 'Menu';
		$this->data['meta_title'] = '';
		$this->data['meta_description'] = '';
        
        if(!empty($_GET['menu_id'])){
            update('menus', ['trash'=>0], ['id'=>$_GET['menu_id']]);
            set_msg('success', 'Menu Successfully Restored');
            redirect('trash/trash/menu?system_id=NjZfMTE5');
        }
        
        $this->data['menus'] = read('menus', ['trash'=>1]);
        
		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/includes/aside', $this->data);
		$this->load->view('admin/includes/headermenu', $this->data);
		$this->load->view('admin/includes/nav', $this->data);
		$this->load->view('components/trash/menu', $this->data);
		$this->load->view('admin/includes/footer', $this->data);
    }

    public function sub_menu() {
		$this->data['meta_keyword'] = 'Menu';
		$this->data['meta_title'] = '';
		$this->data['meta_description'] = '';
        
        if(!empty($_GET['sub_menu_id'])){
            update('sub_menus', ['trash'=>0], ['id'=>$_GET['sub_menu_id']]);
            set_msg('success', 'Sub-Menu Successfully Restored');
            redirect('trash/trash/menu?system_id=NjZfMTE5');
        }
        $this->data['sub_menus'] = get_join('sub_menus', 'menus', 'sub_menus.menu_id=menus.id', ['sub_menus.trash'=>1], 'sub_menus.*, menus.name as menu');
        
		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/includes/aside', $this->data);
		$this->load->view('admin/includes/headermenu', $this->data);
		$this->load->view('admin/includes/nav', $this->data);
		$this->load->view('components/trash/sub_menu', $this->data);
		$this->load->view('admin/includes/footer', $this->data);
    }
}
