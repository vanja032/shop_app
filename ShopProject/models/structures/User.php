<?php
require_once "Role.php";

class User
{
    public $id;
    public $f_name;
    public $l_name;
    public $email;
    public $username;
    public $profile;
    public $role;
    public $created;

    public function __construct($id, $f_name, $l_name, $email, $username, $profile, $created, $role_id, $role_name, $role_desc, $role_created)
    {
        $this->id = $id;
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->email = $email;
        $this->username = $username;
        $this->profile = $profile;
        $this->role = new Role($role_id, $role_name, $role_desc, $role_created);
        $this->created = $created;
    }
}

?>