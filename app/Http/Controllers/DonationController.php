<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonateRequest;
use App\Models\Donation;
use App\Models\Donator;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::all();
        return view('pages.Donator.index', compact('donations'));
    }

    public function updateView($id)
    {
        $donation = Donation::findOrFail($id);
        $users = User::all();
        $products = Product::all();
        return view('pages.Donator.update', compact('donation','users','products'));
    }

    public function newDonation()
    {
        $users = User::all();
        $products = Product::all();
        return view('pages.Donator.New&Update',compact('users', 'products'));
    }

    public function store(Request $request)
    {
        try {
            $data2 = [
                'user_id' => $request->user_id,
                'first_name' => User::where('id', $request->user_id)->first()->first_name,
                'last_name' => User::where('id', $request->user_id)->first()->last_name,
                'email' => User::where('id', $request->user_id)->first()->email,
            ];
            $data3 = [
                'product_id' => $request->product_id,
                'quantity' => $request->amount
            ];
            $result2 = Donator::create($data2);
            $result3 = Inventory::create($data3);
            $data = [
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'amount' => $request->amount,
                'donation_time' => $request->date,
                'inventory_id' => $result3->id,
                'donator_id' => $result2->id,
            ];
            $result = Donation::create($data);
            if ($result && $result2 && $result3) {
                session()->flash('success', 'Donation successful');
                return redirect()->back();
            }
            session()->flash('fail', 'Donation Create Unsuccessful');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('success', 'Something Went Wrong' . $e);
            return redirect()->back();
        }
    }

    public function update(Request $request , $id)
    {
        try {
            $data2 = [
                'user_id' => $request->user_id,
                'first_name' => User::where('id', $request->user_id)->first()->first_name,
                'last_name' => User::where('id', $request->user_id)->first()->last_name,
                'email' => User::where('id', $request->user_id)->first()->email,
            ];
            $data3 = [
                'product_id' => $request->product_id,
                'quantity' => $request->amount
            ];
            $donator_id = Donation::findOrFail($id)->donator_id;
            $inventory_id = Donation::findOrFail($id)->inventory_id;
            $result2 = Donator::findOrFail($donator_id)->update($data2);
            $result3 = Inventory::findOrFail($inventory_id)->update($data3);
            $data = [
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'amount' => $request->amount,
                'donation_time' => $request->date,
            ];
            $result = Donation::findOrFail($id)->update($data);
            if ($result && $result2 && $result3) {
                session()->flash('success', 'Donation Update successful');
                return redirect()->back();
            }
            session()->flash('fail', 'Donation Update Unsuccessful');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('success', 'Something Went Wrong' . $e);
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $donator_id = Donation::findOrFail($id)->donator_id;
            $inventory_id = Donation::findOrFail($id)->inventory_id;
            $result2 = Donator::findOrFail($donator_id)->delete();
            $result3 = Inventory::findOrFail($inventory_id)->delete();
            $result = Donation::findOrFail($id)->delete();
            if ($result && $result2 && $result3) {
                session()->flash('success', 'Donation Delete successful');
                return redirect()->back();
            }
            session()->flash('fail', 'Donation Delete Unsuccessful');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('success', 'Something Went Wrong' . $e);
            return redirect()->back();
        }
    }
}
