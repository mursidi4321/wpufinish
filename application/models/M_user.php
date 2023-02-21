<?php
class M_user extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function insertData($data)
    {
        return $this->db->insert('user', $data);
    }

    public function updateData($post)
    {
        $params = array(
            'name' => $this->input->post('name')
        );
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $email = $this->input->post('email');
        $this->db->where('email', $email);
        $this->db->update('user', $params);
    }
    public function updatePassword($post, $where)
    {
        $password = password_hash($post['new_password1'], PASSWORD_DEFAULT);
        $params = array(
            'password' => $password
        );
        $this->db->where($where);
        return $this->db->update('user', $params);
    }

    function deleteToken($where)
    {
        $this->db->where($where);
        $this->db->delete('user_token');
    }
}
