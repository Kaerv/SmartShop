<?php

use SmartShop\Hook;

/**
 * Executes hook
 */
function hook($hook_name)
{
    Hook::call($hook_name);
}