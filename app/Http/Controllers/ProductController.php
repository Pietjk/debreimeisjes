<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Feature the specified product on the frontpage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function feature(Request $request)
    {
        // Validate incomming data
        $validated = $request->validate([
            'product' => ['required', 'integer'],
        ]);
        // Get every product with the same id as the given data
        $product = Product::where('ravelry_id', '=', $validated['product']);
        // If id exists delte it
        if (count($product->get()) > 0)
        {
            $product->delete();
            session()->flash('success', 'Het product wordt nu niet meer aanbevolen');
        }
        // If id doesn't exist create it
        else
        {
            Product::create([
                'ravelry_id' => $validated['product'],
            ]);
            session()->flash('success', 'Het product wordt nu aanbevolen');
        }
        return back();
    }
}
