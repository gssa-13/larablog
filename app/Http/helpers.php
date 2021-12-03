<?php

function setActiveRoute($name)
{
    return Request::routeIs($name) ? 'header-active' : '';
}
