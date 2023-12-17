<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function newIssueView()
    {
        $issuers = User::all();
        $products = Product::all();
        return view('pages.Issues.new', compact('issuers', 'products'));
    }

    public function store()
    {

    }
}
