<?php

namespace App\Library;

class Functions
{
    # routeによってclassを付与
    public static function activeClass($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}
