<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['state', 'amount'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    //Accessor to get date without time
    public function getCreatedAtAttribute($timeStamp)
    {
        return date('d/M/Y', strtotime($timeStamp));
    }

    //Mutator change string to value
    public function setStateAttribute($state)
    {
        $this->attributes['state'] = $state == 'tomado' ? 1 : 0;
    }
}
