<?php class Post extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['menus'] = read('menus', ['trash'=>0]);

            if($_POST){
                $data = $_POST;
                $data['is_latest']  = !empty($_POST['is_latest']) ? 1 : 0;
                $data['is_publish'] = !empty($_POST['is_publish']) ? 1 : 0;
                $data['is_feature'] = !empty($_POST['is_feature']) ? 1 : 0;
                $data['date']       = date('Y-m-d');
                $data['created_at'] = date('Y-m-d H:i:s');
                
                if($_FILES && $_FILES['img']['name']!='') 
                {
                    $extension      = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                    $path           = "public/images/post/".time().'.'.$extension;
                    $data['img']    = $path;
                    copy($_FILES['img']['tmp_name'], $path);
                }
                
                save('news', $data);
                set_msg('success', 'News Successfully Created');
                redirect('post/Post?system_id=NjdfMTIx');
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/post/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function all(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $tableto        = ['menus'];
            $join_condition = ['news.menu_id=menus.id'];
            $select         = 'news.*, menus.name as menu';
            $where          = ['news.trash'=>0];
            
            $this->data['news'] = get_join('news', $tableto, $join_condition, $where, $select, null, 'id', 'DESC');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/post/all', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['news']      = $news =  read('news', ['id'=>$id])[0];
            $this->data['menus']     = read('menus', ['trash'=>0]);
            $this->data['sub_menus'] = read('sub_menus', ['trash'=>0, 'menu_id'=>$news->menu_id]);


            if($_POST){
                $data = $_POST;
                $data['is_latest']  = !empty($_POST['is_latest']) ? 1 : 0;
                $data['is_publish'] = !empty($_POST['is_publish']) ? 1 : 0;
                $data['is_feature'] = !empty($_POST['is_feature']) ? 1 : 0;
                
                if($_FILES && $_FILES['img']['name']!='') 
                {
                    if(file_exists($news->img)){
                        unlink($news->img);
                    }
                    $extension      = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                    $path           = "public/images/post/".time().'.'.$extension;
                    $data['img']    = $path;
                    copy($_FILES['img']['tmp_name'], $path);
                }
                
                update('news', $data, ['id'=>$id]);
                set_msg('success', 'News Successfully Updated');
                redirect("post/Post/edit/{$id}?system_id=NjdfMTIy");
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/post/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
            
        }
        
        public function delete($id) {
            $news =  read('news', ['id'=>$id])[0];
            if(file_exists($news->img)){
                unlink($news->img);
            }
            remove('news', ['id'=>$id]);
            set_msg('success', 'News Successfully Updated');
            redirect('post/Post/all?system_id=NjdfMTIy');
        }
        
        public function ajax(){
            if($_POST){
                $submenu = read('sub_menus', ['trash'=>0, 'menu_id'=>$_POST['menu_id']]);
                echo json_encode($submenu);
            }
        }
    }
?>
