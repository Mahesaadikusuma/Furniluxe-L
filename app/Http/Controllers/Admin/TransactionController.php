<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $transactions = Transaction::with(['product', 'user','detail'])->latest()->get();
        
        // $item = Transaction::get(['created_at']);
        
        // foreach ($item as $transaction) {
        //     $createdAt = $transaction->created_at; // Ambil nilai created_at dari objek transaksi

        //     $formattedCreatedAt = Carbon::parse($createdAt)->format('Y-m-d H:i:s');
        //     dd($formattedCreatedAt);
        // }
        
        return view('pages.Admin.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = Transaction::with(['product', 'user.Setting','detail'])->findOrFail($id);

        // dd($items);
        return view('pages.Admin.transactions.detail', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = Transaction::with(['product', 'user.Setting','detail'])->findOrFail($id);

        return view('pages.Admin.transactions.update', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, string $id)
    {
        $items = Transaction::with(['product', 'user.Setting','detail'])->findOrFail($id);

        // update transaction
        $items->update([
            'transaction_status' => $request->transaction_status,
        ]);
        

        // update transaction detail
        $items->detail->update([
            'resi' => $request->resi,
            'estimated_delevery' => $request->estimated_delevery,
        ]);

        return redirect()->route('transaction.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
