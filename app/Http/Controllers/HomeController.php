<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\home;
use App\Models\joins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('layouts.dashboard');

    // }
    public function comunity()
    {

        return view('layouts.community');

    }
    public function about()
    {
        return view('layouts/about');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
}
