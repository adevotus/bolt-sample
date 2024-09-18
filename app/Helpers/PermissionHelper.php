<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Session;
class PermissionHelper{
    public static function hasPermission($permission): bool
    {
        $permissions = Session::get('permissions', []);
        //dd($permissions);
        return in_array($permission, $permissions);
    }

}
