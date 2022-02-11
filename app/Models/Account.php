<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Account extends Authenticatable
{
    use HasFactory;

    protected $table = 'account';
    protected $guarded = ['account_id'];
    protected $primaryKey = 'account_id';
    protected $hidden = ['password', 'remember_token'];

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function gender() {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'order_id');
    }

}
