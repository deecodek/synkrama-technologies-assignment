<?php

declare(strict_types=1);

namespace App\Models;

use App\UserType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['first_name', 'last_name', 'email', 'password', 'user_type', 'first_login_completed'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'user_type' => UserType::class,
            'first_login_completed' => 'boolean',
        ];
    }

    public function dealerLocation(): HasOne
    {
        return $this->hasOne(DealerLocation::class, 'user_id');
    }

    public function isEmployee(): bool
    {
        return $this->user_type === UserType::EMPLOYEE;
    }

    public function isDealer(): bool
    {
        return $this->user_type === UserType::DEALER;
    }
}
