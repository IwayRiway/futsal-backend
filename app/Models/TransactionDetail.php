<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['transaction_id', 'item_id', 'hour_id', 'quantity'];
    protected $guarded = [];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'item_id', 'id');
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'item_id', 'id');
    }
    
    public function hour()
    {
        return $this->belongsTo(Hour::class, 'hour_id', 'id');
    }
}
