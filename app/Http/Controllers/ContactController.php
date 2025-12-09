<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'email' => 'surya@gmail.com',
            'phone' => '081234567890'
        ];
        return view('contact', compact('data'));
    }
}
