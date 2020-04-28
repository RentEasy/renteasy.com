<?php

function set_active($routeName)
{
    return Route::currentRouteName() == $routeName ? 'is-active' : '';
}
