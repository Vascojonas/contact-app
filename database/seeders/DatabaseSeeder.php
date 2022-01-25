<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Company;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(15)->create()->each(function($company){
            $company->contacts()->saveMany(Contact::factory(rand(5,10))->make());
        });
        
        
        //Contact::factory()->count(50)->create();
        
       //$this->call(CompaniesTableSeeder::class);
        //$this->call(ContactTableSeeder::class);

    }
}
