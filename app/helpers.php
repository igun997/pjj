<?php
use App\Models\User;
if ( ! function_exists('config_path'))
{
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}
