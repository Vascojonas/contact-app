<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    //protected $guarded=[]; //persist without check data
    protected $fillable=['name','address', 'website','email','created_at','updated_at'];

    
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

?>