<?php

namespace I9w3b\NovoPacote\Http\Controllers;

use Illuminate\Routing\Controller;

class NovoPacoteController extends Controller
{
    /**
     * View editing and NovoPacote creation features
     * @return Response
     */
    public function index()
    {
        return view('novopacote::index');
    }

    /**
     * View editing and menu creation features
     * @return Response
     */
    public function alert()
    {
        return back()->with('status', 'Ok');
    }
}
