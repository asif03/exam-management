<?php

namespace App\Traits;

use App\Models\User;

trait MenuTrait
{
    public function getMenuAccessByUser()
    {
        $userModel = new User();
        $userModules = $userModel->getModules(auth()->id());

        foreach ($userModules as $usrmodule) {
            $assignModules[] = $usrmodule->module_id;
        }

        return $assignModules;
    }
}
