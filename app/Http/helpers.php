<?php

function setActiveRoute($name)
{
    return Request::routeIs($name) ? 'header-active' : '';
}

function setActiveAdminRoute($name)
{
    return Request::routeIs($name) ? 'active' : '';
}

function setOpenAdminMenuRoute($name)
{
    return Request::routeIs($name) ? 'menu-open' : '';
}
