<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\UserProfile;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Profiler\Profile;

class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->name();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'address'=>$this->faker->address(),
            'city'=>$this->faker->city(),
            'state'=>'CA',
            'zipcode'=>$this->faker->randomDigit(10000),
            'cell_no'=>$this->faker->phoneNumber,
            'office_no'=>$this->faker->phoneNumber,
            'fax_no'=>$this->faker->phoneNumber,
            'status'=>'0',
            'profile_id'=>UserProfile::all()->random()->id,
            'category_id'=>Category::all()->random()->id,
            'created_by_user_id'=>User::all()->random()->id,
            'updated_by_user_id'=>User::all()->random()->id,
        ];
    }
}
