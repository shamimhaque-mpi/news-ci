<?php class Gallery extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function image_add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['img'] = read('image_gallery');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/gallery/image_add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add_image(){
            $data = [
                'img_name'          => ($this->input->post('img_name')),
                'short_description' => ($this->input->post('short_description'))
            ];

            $types = array('jpg','JPG','jpeg','png','PNG','gif','GIF', 'webp');
            $path  = "public/images/gallery/";
            $name  = 'gallery'.(strtotime(date('Y-m-d h:i:s'))*10);
            $size  = '1024';

            if($path = upload_img("img", $types, $size, $path, $name)){
                $data['img_path'] = $path;
            }
            if(save('image_gallery', $data)){
                set_msg('success', 'success', 'Image Gallery Successfully Created !');
            }else{
                set_msg('warning', 'warning', 'Image Gallery Not Created !');
            }
            redirect_back();
        }

        public function img_edit($id=null){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['img'] = read('image_gallery',['id'=>$id]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/gallery/image_edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function img_edit_process($id=null){
            $data = [
                'img_name' => str_secure($this->input->post('img_name')),
                'short_description' => ($this->input->post('short_description'))
            ];

            if(!empty($_FILES['img']['name'])){

                $types = array('jpg','JPG','jpeg','png','PNG','gif','GIF', 'webp');
                $path  = "public/images/gallery/";
                $name  = 'gallery'.(strtotime(date('Y-m-d h:i:s'))*10);
                $size  = '1024';

                if($path = upload_img("img", $types, $size, $path, $name)){
                    $data['img_path'] = $path;
                }

                // delete old image
                if(file_exists($this->input->post('old_img'))){
                    unlink($this->input->post('old_img'));
                }
            }
            if(update('image_gallery', $data, ['id'=>$id])){
                set_msg('success', 'success', 'Image Gallery Successfully Update !');
            }else{
                set_msg('warning', 'warning', 'Image Gallery Not Update !');
            }
            redirect_back();
        }

        public function img_delete($id=null){
            if(delete('image_gallery', ['id'=>$id])){
                set_msg('success', 'success', 'image_gallery Permanently Deleted !');
            }else{
                set_msg('warning', 'warning', 'image_gallery Not Deleted !');
            }
            redirect_back();
        }



        public function video_add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['video'] = read('video_gallery');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/gallery/video_add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add_video(){
            $data = [
                'video_name' => str_secure($this->input->post('video_name')),
                'video_path' => $_POST['video_path']
            ];

            // check existance
            if(exist('video_gallery', str_secure(['name'=>$this->input->post('name')]))==false){
                if(save('video_gallery', $data)){
                    set_msg('success', 'success', 'Video Gallery Successfully Created !');
                }else{
                    set_msg('warning', 'warning', 'Video Gallery Not Created !');
                }
            }else{
                set_msg('warning', 'warning', 'video Gallery Already Exists !');
            }
            redirect_back();
        }

        public function vdo_edit($id=null){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['video'] = read('video_gallery',['id'=>$id]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/gallery/video_edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function vdo_edit_process($id=null){
            $data = [
                'video_name' => str_secure($this->input->post('video_name')),
                'video_path' => $_POST['video_path']
            ];

            if(update('video_gallery', $data, ['id'=>$id])){
                set_msg('success', 'success', 'Image video_gallery Successfully Update !');
            }else{
                set_msg('warning', 'warning', 'Image video_gallery Not Update !');
            }
            redirect_back();
        }

        public function vdo_delete($id=null){
            if(delete('video_gallery', ['id'=>$id])){
                set_msg('success', 'success', 'video_gallery Permanently Deleted !');
            }else{
                set_msg('warning', 'warning', 'video_gallery Not Deleted !');
            }
            redirect_back();
        }
    }
?>
