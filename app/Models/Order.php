<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['state', 'amount', 'user_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
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

    public function sendMail(){
      Mail::to($this->user()->email)->send(new OrderCreated($this));
    }
}
