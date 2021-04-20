<?php class SubMenu extends Admin_Controller{
	function __construct() {
		parent::__construct();
	}

    public function index() {
		$this->data['meta_keyword'] = 'Menu';
		$this->data['meta_title'] = '';
		$this->data['meta_description'] = '';
        
        if($_POST){
            if(!check_exists('sub_menus', ['name'=>$_POST['name']])){
                save('sub_menus', $_POST);
                set_msg('success', 'Sub-Menu Successfully Saved');
                redirect('menu/SubMenu?system_id=NjVfMTE3');
            }
            else{
                set_msg('warning', 'Menu Name Has Already Been Token');
                redirect('menu/Menu?system_id=NjRfMTE1');
            }
            
        }
        $this->data['menus'] = read('menus', ['trash'=>0]);

		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/includes/aside', $this->data);
		$this->load->view('admin/includes/headermenu', $this->data);
		$this->load->view('admin/includes/nav', $this->data);
		$this->load->view('components/submenu/add', $this->data);
		$this->load->view('admin/includes/footer', $this->data);
    }

    public function all() {
		$this->data['meta_keyword'] = 'Menu';
		$this->data['meta_title'] = '';
		$this->data['meta_description'] = '';

        $this->data['sub_menus'] = get_join('sub_menus', 'menus', 'sub_menus.menu_id=menus.id', ['sub_menus.trash'=>0], 'sub_menus.*, menus.name as menu');

		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/includes/aside', $this->data);
		$this->load->view('admin/includes/headermenu', $this->data);
		$this->load->view('admin/includes/nav', $this->data);
		$this->load->view('components/submenu/all', $this->data);
		$this->load->view('admin/includes/footer', $this->data);
    }

    public function edit($id=null) {
		$this->data['meta_keyword'] = 'Menu';
		$this->data['meta_title'] = '';
		$this->data['meta_description'] = '';
        
        if($_POST){
            update('sub_menus', $_POST, ['id'=>$id]);
            set_msg('success', 'Sub-Menu Successfully Updated');
            redirect("menu/SubMenu/edit/{$id}?system_id=NjVfMTE4");
        }
        
        $this->data['sub_menu'] = read('sub_menus', ['id'=>$id])[0];
        $this->data['menus']    = read('menus', ['trash'=>0]);
        
		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/includes/aside', $this->data);
		$this->load->view('admin/includes/headermenu', $this->data);
		$this->load->view('admin/includes/nav', $this->data);
		$this->load->view('components/submenu/edit', $this->data);
		$this->load->view('admin/includes/footer', $this->data);
    }

    public function delete($id){
        update('sub_menus', ['trash'=>1], ['id'=>$id]);
        set_msg('success', 'Sub-Menu Successfully Deleted');
        redirect("menu/SubMenu/all?system_id=NjVfMTE4");
    }
}
