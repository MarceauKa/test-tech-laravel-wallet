<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Date;

class RecurringTransfer extends Model
{
    /** @use HasFactory<\Database\Factories\RecurringTransferFactory> */
    use HasFactory;

    protected function casts()
    {
        return [
            'amount' => 'integer',
            'frequency_in_days' => 'integer',
            'started_at' => 'date',
            'ended_at' => 'date',
        ];

    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'source_id');
    }

    /*public function target()
    {
        return $this->belongsTo(Wallet::class, 'recipient_email', 'email');
    }*/

    public function scopeIsActive(Builder $query): void
    {
        $query->where('started_at', '>=', $now = Date::now())
            ->where('ended_at', '<=', $now);
    }
}
