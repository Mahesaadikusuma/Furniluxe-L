<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, $slug)
    {
        // $product = Product::with(['Category'])->where('slug', $slug)->firstOrFail();
        // $tax = 10000;
        // $qty = 1;
        // // dd($product);
        // $totalPrice = $product->price + $tax;
        // return view('pages.Checkout',compact('product','tax', 'totalPrice', 'qty'));
        try {
            $product = Product::with(['category'])->where('slug', $slug)->firstOrFail();
            $tax = 10000;
            $qty = 1;
            $totalPrice = 0;
            return view('pages.Checkout', compact('product', 'tax', 'totalPrice', 'qty'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


   public function prosess(Request $request, $slug)
    {
         

        // $transaction = Transaction::create([
        //     'user_id' => $user->id,
        //     'product_id' => $product->id,
        //     'transaction_total' => $request->transaction_total,
        //     'tax'=> $request->tax,
        //     'transaction_status' => "PENDING",
        //     'code' => $code,
        //     'qty' => $request->qty,
        // ]);

        // TransactionDetail::create([
        //     'transaction_id' => $transaction->id,
        //     'resi' => "",
        //     'shipping' => "PENDING",
        //     'estimated_delevery' => ""
        // ]);
            $validatedData = $request->validate([
            
            'tax' => 'required|numeric',
            
        ]);

        try {
            $product = Product::with(['category'])->where('slug', $slug)->firstOrFail();
            $user = Auth::user();
            $code = "FLX-" . rand(0000, 9999);

            DB::beginTransaction();
            
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'transaction_total' => $request->transaction_total,
                'tax' => $request->tax,
                'transaction_status' => "PENDING",
                'code' => $code,
                'qty' => $request->qty,
            ]);

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'resi' => "",
                'shipping' => "PENDING",
                'estimated_delivery' => ""
            ]);

            DB::commit();

            return redirect()->route('success-checkout');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
        
    
        
        return redirect()->route('success-checkout');
    }


    public function success(Request $request)
    {
        return view('pages.Success');
    }
}
