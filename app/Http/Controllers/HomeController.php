<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
       return view('abbreviator');
    }


    public function test(Request $request)
    {

        $number = convertNumberAbbreviator($request->input('number'));

        return view('abbreviator', compact('number'));
    }
}