<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cellphone',
        'checkin',
        'checkout',
        'message',
        'status',
    ];

    /**
     * Find an accepted booking whose dates overlap the given range.
     * Same overlap rule as the chatbot availability check.
     */
    public static function findAcceptedConflict(string $checkin, string $checkout, ?int $ignoreId = null): ?self
    {
        return static::where('status', 'accept')
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->where('checkin', '<', $checkout)
            ->where('checkout', '>', $checkin)
            ->first();
    }
}
