<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\FilterScope;
use App\Scopes\FilterSearchScope;
use App\Scopes\ContactSearchScope;

class Contact extends Model
{
    use HasFactory, FilterSearchScope;

    protected $fillable=['first_name', 'last_name','phone','email','address','company_id'];
    public $filterColumns=['company_id'];
    public $searchColumns = ['first_name', 'last_name', 'email'];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeLatestFirst($query){
        return $query->orderBy('id', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     
    /*
    public function scopeFilter($query)
    {
        if($companyId=request('company_id')){
            $query->where('company_id', $companyId);
        }

        if($search=request('search')){
            $query->where('first_name', 'like', "%{$search}%");
        }

        return $query;
    }*/

    
}
