<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $Inventories = Inventory::all();
        return view('pages.Inventory.index', compact('Inventories'));
    }
}
