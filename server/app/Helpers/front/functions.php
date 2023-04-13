    <?
    // routeによってclassを付与
    function active_class($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
