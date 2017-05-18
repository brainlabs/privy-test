<?php

namespace App\Http\Controllers;

/**
 * Class HomeController
 * @package App\Http\Controllers
 * @author  Daud Valentino Simbolon <daud.simbolon@gmail.com>
 */
class HomeController extends Controller
{
    /**
     * @return string
     */
    public function index()
    {
       return convertNumberAbbreviator('100000000,18');
    }
}