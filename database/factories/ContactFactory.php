<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model =Contact::class; //Optional when you follow the convection
    public function definition()
    {
        return [
            'first_name'=> $this->faker->firstName(),
            'last_name'=> $this->faker->lastName(),
            'phone'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->unique()->email(),
            'address'=>$this->faker->address(),
            'company_id'=>Company::pluck('id')->random(), //esta functionalidad fui substituida por save many no DatabaseSeeder
            'user_id'=> User::pluck('id')->random()
            
        ];
    }

}
