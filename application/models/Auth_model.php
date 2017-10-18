<?php
class Auth_model extends CI_Model {

  private $GLOBAL_VAR_USERNAME = 'USERNAME';
  private $GLOBAL_VAR_FULLNAME = 'FULLNAME';
  private $GLOBAL_VAR_UUID_MS_USER = 'UUIDMSUSER';
  private $GLOBAL_VAR_ROLESVALUE = 'ROLESVALUE';
  private $GLOBAL_VAR_CREATEDDATE = 'CREATEDDATE';

  public function __construct(){
        parent::__construct();
    }

  public function login_validate($table, $where) {
    return $this->db->get_where($table, $where);
  }

  public function logout_validate() {

  }

  public function get_one($select, $table, $param) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where('USERNAME', $param);
    $query = $this->db->get();
    $result = $query->row();
    if ($select == $this->GLOBAL_VAR_USERNAME) {
      return $result->USERNAME;
    } elseif ($select == $this->GLOBAL_VAR_FULLNAME) {
      return $result->FULLNAME;
    } elseif ($select == $this->GLOBAL_VAR_UUID_MS_USER) {
      return $result->UUIDMSUSER;
    } elseif ($select == $this->GLOBAL_VAR_ROLESVALUE) {
      return $result->ROLESVALUE;
    } elseif ($select == $this->GLOBAL_VAR_DTM_CRT) {
      return $result->CREATEDDATE;
    }
  }

  public function get_is_deleted($select, $table, $param) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where('USERNAME', $param);
    $query = $this->db->get();
    $ret = $query->row();
    return $ret->ISDELETED;
  }

  public function get_is_logged_in($select, $table, $param) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where('username', $param);
    $query = $this->db->get();
    $ret = $query->row();
    return $ret->is_logged_in;
  }

  public function is_logged_in_update($username, $value) {
    $this->db->set('ISLOGGEDIN', $value );
    $this->db->where('USERNAME', $username);
    $this->db->update('ms_user');
  }

  public function get_ms_subsystem($system) {
    $this->db->select('uuid_ms_subsystem');
    $this->db->from('ms_subsystem');
    $this->db->where('uuid_ms_subsystem', $system);
    $query = $this->db->get();
    return $query->result();
  }
}
?>
