<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function newProductView()
    {
        return view('pages.Product.new');
    }

    public function index()
    {
        $products = Product::all();
        return view('pages.Product.index', compact('products'));
    }

    public function updateView($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.Product.update', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $result = Product::create($data);
            $data2 = [
                'product_id' => $result->id,
                'quantity' => 0,
            ];
            $result2 = Inventory::create($data2);
            if ($result && $result2) {
                session()->flash('success', 'Product Create successful');
                return redirect()->back();
            }
            session()->flash('fail', 'Product Create Unsuccessful');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('fail', 'Something Went Wrong' . $e); //$e for check errors
            return redirect()->back();
        }
    }

    public function update($id , ProductRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $result = Product::findOrFail($id)->update($data);
            if ($result) {
                session()->flash('success', 'Product Update successful');
                return redirect()->back();
            }
            session()->flash('fail', 'Product Update Unsuccessful');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('fail', 'Something Went Wrong' . $e); //$e for check errors
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $result = Product::findOrFail($id)->delete();
            $result2 = Inventory::findOrFail($id)->delete();
            if ($result && $result2) {
                session()->flash('success', 'Product delete successful');
                return redirect()->back();
            }
            session()->flash('fail', 'Product delete Unsuccessful');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('fail', 'Something Went Wrong' . $e); //$e for check errors
            return redirect()->back();
        }
    }
}
