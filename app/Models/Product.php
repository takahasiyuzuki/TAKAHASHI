<?php

namespace App\Models;

use App\Models\Companie;
use Illuminate\Database\Eloquent\Model;
// use Kyslik\ColumnSortable\Sortable; // ソート機能
use Illuminate\Database\Eloquent\SoftDeletes;    // 削除機能


class Product extends Model
{
    // use Sortable;
    // use SoftDeletes;    // 追記

    
  //   public $sortable = 
  // [
  //           'id', 
  //           'products', 
  //           'company_id', 
  //           'product_name', 
  //           'price', 
  //           'stock', 
  //           'img_path', 
  //           'comment'
  //   ]; 

    protected $table = 'products';
    protected $fillable = 
  [
            'id',
            'products',
            'company_id',
            'product_name',
            'price',
            'stock',
           'img_path',
           'comment'

        
  ];
}

