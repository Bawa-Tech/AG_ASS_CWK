<?php

/**
 * We use this helper class to manage
 * access to views through out the app.
 */
class AuthHelper
{

    /**
     * check if given role is allowed to view the given module
     * Module can be ['sme', 'resident', 'local_council']
     */
    public static function is_allowed($current_role, $module)
    {
        return $current_role == $module;
    }
}
