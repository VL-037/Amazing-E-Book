<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'account';
    protected $guarded = ['id'];
    protected $hidden = ['password', 'remember_token'];

    public function role() {
        return $this->hasOne(Role::class);
    }

    public function gender() {
        return $this->hasOne(Gender::class);
    }

}
