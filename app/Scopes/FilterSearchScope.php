<?php
 namespace App\Scopes;

 Trait FilterSearchScope 
 {
    protected static function booted()
    {
        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new SearchScope);
    }
 }