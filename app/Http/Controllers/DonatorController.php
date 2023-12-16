<?php

namespace App\Http\Controllers;

use App\Models\Donator;
use Illuminate\Http\Request;

class DonatorController extends Controller
{
    public function index()
    {
        $donators = Donator::all();
        return view('pages.Donator2.index', compact('donators'));
    }

    public function delete($id)
    {
        try {
            $result = Donator::findOrFail($id)->delete();
            if ($result) {
                session()->flash('success', 'Donator Delete successful');
                return redirect()->back();
            }
            session()->flash('fail', 'Donator Delete Unsuccessful');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('fail', 'Something Went Wrong' . $e);
            return redirect()->back();
        }
    }
}
