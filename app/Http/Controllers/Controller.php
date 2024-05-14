<?php

namespace App\Http\Controllers;

abstract class Controller
{
    function preety_print()
    {
        exit("<pre>" . print_r(func_get_args(), true) . "</pre>");
    }
}
