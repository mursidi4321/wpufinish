<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_user');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'My Profile';

        $this->template->load('template', 'user/index', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'user/edit', $data);
        } else {
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $config['upload_path']          = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($_FILES['image']['name']) {

                if ($this->upload->do_upload('image')) {
                    $id = $this->input->post('id');
                    $user = $this->m_user->get($id)->row_array();
                    if ($user != null) {
                        $target_file = './assets/img/profile/' . $user['image'];
                        unlink($target_file);
                    }
                    $post['image'] = $this->upload->data('file_name');
                    $this->m_user->updateData($post);

                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Your account has been updated....!
                      </div>');
                        redirect('user');
                    }
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert" . $error . "</div");
                    redirect('user');
                }
            } else {
                $post['image'] = null;
                $this->m_user->updateData($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Your account has been updated....!
                  </div>');
                    redirect('user');
                }
            }
            redirect('user/edit');
        }
    }

    public function changepassword()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[3]', ['required' => '{field} must be fill in', 'min_length' => 'minimal 3 character', 'matches' => '{field} do not matches']);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|matches[new_password1]', ['matches' => '{field} do not matches']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'user/changepassword', $data);
        } else {
            $current_password = $this->input->post('current_password');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong current password....!
              </div>');
                redirect('user/changepassword');
            } else {
                $where = array('id' => $data['user']['id']);
                $post = $this->input->post(null, true);
                $this->m_user->updatePassword($post, $where);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Your password has been changed....!
              </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
