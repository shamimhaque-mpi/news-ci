<?php class Home extends Frontend_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['pagename']     = 'News Paper';
        $this->data['meta_title']   = 'Home';
    
        $this->data['video_gallery'] = read('video_gallery', ['trash'=>0]);
        $this->data['image_gallery'] = read('image_gallery', ['trash'=>0], "id DESC", 20);
        
        $this->data['news'] = get_join('news', 'menus', 'news.menu_id=menus.id', [], 'news.*, menus.name as menu', null, 'id', 'DESC', 6);
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('frontend/home', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    public function topic(){
        $this->data['pagename']     = 'News Paper';
        $this->data['meta_title']   = 'Topics';
        
        if(!empty($_GET['slug'])){
            $slug = (Object)json_decode(base64_decode($_GET['slug'], true));
            if($slug){
                /*echo "<pre>";
                print_r($slug);
                die;*/
            }
        }
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('frontend/topic_wise_news', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    public function image_gallery(){
        $this->data['pagename']     = 'News Paper';
        $this->data['meta_title']   = 'Image Gallery';
        
        $this->data['image_gallery'] = read('image_gallery', ['trash'=>0], "id DESC");
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('frontend/image_gallery', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    public function video_gallery(){
        $this->data['pagename']     = 'News Paper';
        $this->data['meta_title']   = 'Image Gallery';
        
        $this->data['video_gallery'] = read('video_gallery', ['trash'=>0], "id DESC");
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('frontend/video_gallery', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
}
