<?php

namespace App\Models;

use App\Enums\status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'seller_id',
        'client_id',
        'status',
        'total_amount',
        'sold_at',
    ];

    protected $casts = [
        'sold_at' => 'datetime',
        'total_amount' => 'float',
        'status' => Status::class,
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
