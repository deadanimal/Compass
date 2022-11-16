<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'compass_id',
        'username',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function balances()
    {
        return $this->hasMany(TokenBalance::class);
    }     

    public function kedudukans()
    {
        return $this->hasMany(Kedudukan::class);
    }     

    public function compasses()
    {
        return $this->hasMany(Compass::class);
    }   
    
    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }    
    
    public function purchases()
    {
        return $this->hasMany(TokenPurchase::class);
    }    
}
