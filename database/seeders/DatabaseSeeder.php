<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create();
       Company::factory()->hasContacts(5)->count(50)->create();
       
        /*
        Company::factory(15)->create()->each(function($company){
            $company->contacts()->saveMany(Contact::factory(rand(5,10))->make());
        });
        */
        
        //Contact::factory()->count(50)->create();
        
       //$this->call(CompaniesTableSeeder::class);
        //$this->call(ContactTableSeeder::class);

    }
}
