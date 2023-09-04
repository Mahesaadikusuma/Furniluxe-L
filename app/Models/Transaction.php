<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'product_id',
        'transaction_total',
        'tax',
        'transaction_status',
        'code',
        'qty',
    ];

    /**
     * Get all of the product for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }


    /**
     * Get the user that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

   /**
    * Get the detail associated with the Transaction
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function detail(): HasOne
   {
       return $this->hasOne(TransactionDetail::class, 'transaction_id', 'id');
   }
}
