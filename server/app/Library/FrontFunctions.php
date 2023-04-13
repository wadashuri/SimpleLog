<?php

namespace App\Library;

class FrontFunctions
{
    # routeによってclassを付与
    public static function activeClass($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}
