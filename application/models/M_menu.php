<?php
class M_menu extends CI_Model
{
    function getMenu($id = null)
    {
        $this->db->from('user_menu');
        if ($id != null) {
            $this->db->where('user_menu', $id);
        }
        return $this->db->get();
    }

    function getSubmenu($id = null)
    {
        $query = "SELECT user_sub_menu.*,user_menu.menu
                    FROM user_sub_menu JOIN user_menu
                      ON user_sub_menu.menu_id = user_menu.id";
        if ($id != null) {
            $query = "SELECT user_sub_menu.*,user_menu.menu
            FROM user_sub_menu JOIN user_menu
              ON user_sub_menu.menu_id = user_menu.id AND user_sub_menu.id = '$id'";
            return $this->db->query($query);
        }
        return $this->db->query($query);
    }

    function insertMenu($data)
    {
        return $this->db->insert('user_menu', $data);
    }

    function insertSubmenu($data = null)
    {
        return $this->db->insert('user_sub_menu', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    function get($id = null)
    {
        $this->db->from('user_menu');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        return $this->db->get();
    }

    function editData($post)
    {
        $id = $post['id'];
        $menu = $post['menu'];

        $this->db->set('menu', $menu);
        $this->db->where('id', $id);
        $this->db->update('user_menu');
    }

    function updateSubmenu($post)
    {
        $id = $post['id'];

        $params = array(
            'title' => $post['title'],
            'menu_id' => $post['menu'],
            'url' => $post['url'],
            'icon' => $post['icon'],
            'is_active' => $post['is_active']
        );
        $this->db->set($params);
        $this->db->where('id', $id);
        return $this->db->update('user_sub_menu');
    }
}
