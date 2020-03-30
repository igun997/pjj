<?php
use App\Models\User;
if ( ! function_exists('config_path'))
{
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if ( ! function_exists('me_with_role'))
{
    function me_with_role()
    {
      
    }
}
