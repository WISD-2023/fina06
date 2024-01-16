<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [

        'products_id',

    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function products()
    {
        $this->hasMany(Product::class);
    }









}
