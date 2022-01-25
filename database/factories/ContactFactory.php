<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Contact;
use App\Models\Company;
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
            //'company_id'=>Company::pluck('id')->random() //esta functionalidad fui substituida por save many no DatabaseSeeder
        ];
    }

}
