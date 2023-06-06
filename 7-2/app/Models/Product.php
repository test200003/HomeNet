<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $sortable = ['id', 'speed', 'apart_price', 'cost', 'del_flg'];
    protected $fillable = ['speed', 'apart_price', 'cost', 'del_flg'];
}
