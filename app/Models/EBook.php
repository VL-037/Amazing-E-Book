<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBook extends Model
{
    use HasFactory;

    protected $table = 'ebook';
    protected $guarded = ['ebook_id'];

    public function orders() {
        return $this->hasMany(Order::class, 'order_id');
    }
}
