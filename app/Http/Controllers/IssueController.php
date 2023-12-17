<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueRequest;
use App\Models\Inventory;
use App\Models\Issue;
use App\Models\Issuer;
use App\Models\Product;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::all();
        return view('pages.Issues.index', compact('issues'));
    }

    public function newIssueView()
    {
        $issuers = Issuer::all();
        $products = Product::all();
        return view('pages.Issues.new', compact('issuers', 'products'));
    }

    public function updateView($id)
    {
        $issue = Issue::findOrFail($id);
        $issuers = Issuer::all();
        $products = Product::all();
        return view('pages.Issues.update', compact('issue', 'products','issuers'));
    }

    public function store(IssueRequest $request)
    {
        try {
            $data3 = [
                'product_id' => $request->product_id,
                'quantity' => Inventory::where('id',$request->product_id)->first()->quantity - $request->amount
            ];
            $result3 = Inventory::findOrFail($request->product_id)->update($data3);
            $data = [
                'issuer_id' => $request->issuer_id,
                'product_id' => $request->product_id,
                'amount' => $request->amount,
                'issue_date' => $request->date,
            ];
            $result = Issue::create($data);
            if ($result && $result3) {
                session()->flash('success', 'Issue successful');
                return redirect()->back();
            }
            session()->flash('fail', 'Issue Unsuccessful');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('success', 'Something Went Wrong' . $e); //$e for check errors
            return redirect()->back();
        }
    }

    public function update($id , IssueRequest $request)
    {
        try {
            $previousQuantity = Issue::where('id',$id)->first()->amount;
            if($request->amount > $previousQuantity)
            {
                $quantity = Inventory::where('id',$request->product_id)->first()->quantity - ($request->amount-$previousQuantity);
            } elseif($request->amount == $previousQuantity){
                $quantity = $previousQuantity;
            } else {
                $quantity = Inventory::where('id',$request->product_id)->first()->quantity + ($previousQuantity-$request->amount);
            }
            $data3 = [
                'product_id' => $request->product_id,
                'quantity' => $quantity
            ];
            $result3 = Inventory::findOrFail($request->product_id)->update($data3);
            $data = [
                'issuer_id' => $request->issuer_id,
                'product_id' => $request->product_id,
                'amount' => $request->amount,
                'issue_date' => $request->date,
            ];
            $result = Issue::findOrFail($id)->update($data);
            if ($result && $result3) {
                session()->flash('success', 'Issue Update successful');
                return redirect()->back();
            }
            session()->flash('fail', 'Issue Update Unsuccessful');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('success', 'Something Went Wrong' . $e);
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $inventory_id = Issue::findOrFail($id)->product_id;
            $inventoryQuantity = Inventory::where('id',$inventory_id)->first()->quantity + Issue::findOrFail($id)->amount;
            $data = [
                'product_id' => $inventory_id,
                'quantity' => $inventoryQuantity
            ];
            $result2 = Inventory::findOrFail($inventory_id)->update($data);
            $result = Issue::findOrFail($id)->delete();
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
