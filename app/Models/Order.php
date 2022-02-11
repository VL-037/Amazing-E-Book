<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $guarded = ['order_id'];
    protected $primaryKey = 'order_id';

    public function account() {
        return $this->hasOne(Account::class);
    }

    public function ebook() {
        return $this->hasOne(EBook::class);
    }
}
