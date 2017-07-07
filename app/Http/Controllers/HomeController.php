<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');      
    }

    public function index(EntityManagerInterface $em)
    {
        return view('dashboard');         
    }
}