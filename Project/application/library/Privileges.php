<?php

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 22. 4. 2017.
 * Time: 04:53 PM
 */
class Privileges
{

    protected $role_name;
    protected $privilege_desc;

    /**
     * Privileges constructor.
     * @param $role_name
     * @param $privilege_desc
     */
    public function __construct($role_name, $privilege_desc)
    {
        $this->privilege_desc = explode(" ", $privilege_desc);
    }

    function checkPrivilege($desc) {
        return in_array($desc, $this->privilege_desc);
    }

    /**
     * @return mixed
     */
    public function getRoleName()
    {
        return $this->role_name;
    }

    /**
     * @return array
     */
    public function getPrivilegeDesc(): array
    {
        return $this->privilege_desc;
    }

}