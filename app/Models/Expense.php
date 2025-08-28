<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    //
      use SoftDeletes;



    protected $fillable = ['category_id', 'amount', 'date', 'notes'];

    protected $casts = [
    'date' => 'date',
];

     public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
