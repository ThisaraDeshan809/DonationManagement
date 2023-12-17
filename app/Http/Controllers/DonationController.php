<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonateRequest;
use App\Models\Donation;
use App\Models\Donator;
use App\Models\Inventory;
use App\Models\Product;
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
        $donators = Donator::all();
        $products = Product::all();
        return view('pages.Donator.update', compact('donation','products','donators'));
    }

    public function newDonation()
    {
        $donators = Donator::all();
        $products = Product::all();
        return view('pages.Donator.New&Update',compact('products', 'donators'));
    }

    public function store(DonateRequest $request)
    {
        try {
            $data3 = [
                'product_id' => $request->product_id,
                'quantity' => Inventory::where('id',$request->product_id)->first()->quantity+$request->amount
            ];
            $result3 = Inventory::findOrFail($request->product_id)->update($data3);
            $data = [
                'product_id' => $request->product_id,
                'amount' => $request->amount,
                'donation_time' => $request->date,
                'donator_id' => $request->donator_id,
            ];
            $result = Donation::create($data);
            if ($result && $result3) {
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

    public function update(DonateRequest $request , $id)
    {
        try {
            $previousQuantity = Donation::where('id',$id)->first()->amount;
            if($request->amount > $previousQuantity)
            {
                $quantity = Inventory::where('id',$request->product_id)->first()->quantity + ($request->amount-$previousQuantity);
            } elseif($request->amount == $previousQuantity){
                $quantity = $previousQuantity;
            } else {
                $quantity = Inventory::where('id',$request->product_id)->first()->quantity - ($previousQuantity-$request->amount);
            }
            $data3 = [
                'product_id' => $request->product_id,
                'quantity' => $quantity
            ];
            $result3 = Inventory::findOrFail($request->product_id)->update($data3);
            $data = [
                'donator_id' => $request->donator_id,
                'product_id' => $request->product_id,
                'amount' => $request->amount,
                'donation_time' => $request->date,
            ];
            $result = Donation::findOrFail($id)->update($data);
            if ($result && $result3) {
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
            $inventory_id = Donation::findOrFail($id)->product_id;
            $inventoryQuantity = Inventory::where('id',$inventory_id)->first()->quantity - Donation::findOrFail($id)->amount;
            $data = [
                'product_id' => $inventory_id,
                'quantity' => $inventoryQuantity
            ];
            $result2 = Inventory::findOrFail($inventory_id)->update($data);
            $result = Donation::findOrFail($id)->delete();
            if ($result && $result2) {
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
