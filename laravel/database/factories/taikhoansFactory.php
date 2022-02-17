<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class taikhoansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $table = 'nguoidungs';
    public function definition()
    {
        return [
            'TaiKhoan' => $this->faker->name(),
            'MatKhau' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];

        
    }
}
