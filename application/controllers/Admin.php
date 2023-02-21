<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'Dashboard';

        $this->template->load('template', 'admin/index', $data);
    }

    public function role()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'Role';

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->template->load('template', 'admin/role', $data);
    }

    public function roleAccess($role_id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'Role Access';


        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $admin = $this->db->get_where('user_menu', ['menu' => 'admin'])->row_array();
        $idAdmin = $admin['id'];
        $query = "SELECT * FROM user_menu WHERE NOT id='$idAdmin'";
        $data['menu'] = $this->db->query($query)->result_array();

        // $data['menu'] = $this->db->get('user_menu', ['id' => $idAdmin])->result_array();

        $this->template->load('template', 'admin/role-access', $data);
    }

    public function changeAccess()
    {
        $menu_Id = $this->input->post('menuId');
        $role_Id = $this->input->post('roleId');

        $data = array(
            'role_id' => $role_Id,
            'menu_id' => $menu_Id
        );
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access Changed..!
      </div>');
    }
}
