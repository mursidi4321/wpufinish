<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['menu'] = $this->m_menu->getMenu()->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'menu/index', $data);
        } else {
            $data = array(
                'menu' => $this->input->post('menu')
            );
            $this->m_menu->insertMenu($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New menu added..!
              </div>');
            redirect('menu');
        }
    }

    public function submenu()
    {

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Submenu', 'required');
        $this->form_validation->set_rules('url', 'Submenu url', 'required');
        $this->form_validation->set_rules('icon', 'Submenu icon', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Submenu Management';
            $email = $this->session->userdata('email');
            $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
            $data['submenu'] = $this->m_menu->getSubmenu()->result_array();
            $data['menu'] = $this->m_menu->getMenu()->result_array();

            $this->template->load('template', 'menu/submenu', $data);
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            );
            $this->m_menu->insertSubmenu($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Submenu added..!
              </div>');
            redirect('menu/submenu');
        }
    }

    function delete($id)
    {
        $this->m_menu->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Delete menu successfuly..!
      </div>');
        redirect('menu');
    }

    function edit($id)
    {
        $data['title'] = 'Edit Menu Management';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

        $data['row'] = $this->m_menu->get($id)->row_array();

        $this->template->load('template', 'menu/edit', $data);
    }

    function editSubMenu($id)
    {
        $data['title'] = 'Edit Submenu Management';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

        $data['menu'] = $this->m_menu->getMenu()->result_array();
        $data['sm'] = $this->m_menu->getSubmenu($id)->row_array();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'menu/edit-submenu', $data);
        } else {
            $post = $this->input->post(null, true);
            $this->m_menu->updateSubmenu($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Edit Submenu successfuly..!
      </div>');
                redirect('menu/submenu');
            }
            echo 'error';
        }
    }

    function process()
    {
        $post = $this->input->post(null, true);
        $this->m_menu->editData($post);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Edit menu successfuly..!
      </div>');
        redirect('menu');
    }
}
