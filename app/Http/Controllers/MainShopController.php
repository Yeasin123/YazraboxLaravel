<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainShop;
use Yajra\Datatables\Datatables;
class MainShopController extends Controller
{
    public function index() 
    {
        $MainShop = MainShop::all();
        return Datatables::of($MainShop)->make(true);
    }
}
