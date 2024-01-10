<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'photo', 'price', 'qty', 'hp', 'status', 'superType_id', 'subType_id', 'type_id', 'resistance_id', 'weakness_id'];

    protected $table = 'cards';

    public function shoppingCart(){
        return $this->hasMany(ShoppingCart::class);
    }
    public function superType()
    {
        return $this->belongsTo(SuperType::class, 'superType_id');
    }
    public function subType()
    {
        return $this->belongsTo(SubType::class, 'subType_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function resistance()
    {
        return $this->belongsTo(Resistance::class, 'resistance_id');
    }
    public function weakness()
    {
        return $this->belongsTo(Weakness::class, 'weakness_id');
    }
}
