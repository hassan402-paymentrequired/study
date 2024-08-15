<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    use HasFactory;

    public function user() : BelongsTo
     {
        return $this->BelongsTo(User::class);
    }

    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function message(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
