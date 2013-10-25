<?php namespace Teepluss\Fb;

use Facebook as BaseFacebook;

class Fb extends BaseFacebook {

    /**
     * Construct.
     *
     * @param array $config
     */
    public function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * Checking permissions.
     *
     * @param  mixed    $perms
     * @param  integer  $uid
     * @return boolean
     */
    public function hasPermissions($perms, $uid)
    {
        if ( ! is_array($perms))
        {
            $perms = explode(',', $perms);
        }

        // Get permissions from graph api.
        $permissions = $this->api('/'.$uid.'/permissions');

        $currentPermissions = current(array_get($permissions, 'data'));

        $has = true;

        // Checking process.
        foreach ($perms as $perm)
        {
            if ( ! array_key_exists($perm, $currentPermissions) or $currentPermissions[$perm] == 0)
            {
                $has = false;
                break;
            }
        }

        return $has;
    }

}