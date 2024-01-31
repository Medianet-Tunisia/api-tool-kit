<?php

namespace Medianet\APIToolKit\Tests\database\factories;

use Medianet\APIToolKit\Tests\Mocks\Models\TestModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestModelFactory extends Factory
{
    protected $model = TestModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
