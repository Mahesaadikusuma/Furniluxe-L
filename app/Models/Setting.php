<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';

    // protected $filable = [
    //     'user_id',
    //     'avatar',
    //     'full_name',
    //     'kota',
    //     'province',
    //     'no_Hp',
    //     'alamat',
    // ];

    protected $fillable = [
        'avatar',
        'full_name',
        'kota',
        'province',
        'no_hp',
        'alamat',
        'user_id', // Tambahkan kolom user_id ke dalam fillable
    ];




    /**
     * Get the user that owns the Setting
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
