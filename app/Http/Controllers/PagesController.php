<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PagesController extends Controller
{
    function login_deliveryrider()
    {
        return view("HomeDashboard.login_deliveryrider");
    }
    function registration_deliveryrider()
    {
        return view("HomeDashboard.registration_deliveryrider");
    }

    

}