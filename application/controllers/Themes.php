<?php
class Themes extends CI_Controller
{
    public function switch($slug = '')
    {
        if (!empty($slug) && is_dir("assets/front_end/$slug")) {
            // echo "Theme exists";
            // print_r($slug);
            // die;
            $this->session->set_userdata('theme', $slug);
        }
        redirect(base_url());
    }
}
