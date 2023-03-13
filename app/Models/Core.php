<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Core extends Model
{
    use HasFactory;

    public static function where(string $string, int $int)
    {
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
