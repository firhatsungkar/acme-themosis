<?php

namespace Com\Themosis\Documentation\Controllers;

use Themosis\Route\BaseController;

class Sample extends BaseController
{
    public function index()
    {
        return view('sample');
    }

    public function docs()
    {
        return view('com.themosis.documentation.docs.index');
    }
}