<?php

declare(strict_types=1);

namespace App\Models;

use App\Notifications\LowBalanceWallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property-read int $balance
 * @property-read User $user
 */
class Wallet extends Model
{
    use HasFactory;

    /**
     * @todo Move this to a user preference or config
     */
    const LOW_BALANCE_THRESHOLD = 1000;

    public static function booted()
    {
        static::updated(function (Wallet $model) {
            if ($model->balance < self::LOW_BALANCE_THRESHOLD) {
                $model->user->notify(new LowBalanceWallet());
            }
        });
    }

    protected function casts(): array
    {
        return [
            // @todo Check decimals
            'balance' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany<WalletTransaction>
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(WalletTransaction::class);
    }
}
