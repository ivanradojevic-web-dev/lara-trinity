<?php

namespace Database\Factories;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    protected $model = Reply::class;

    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(3, true),
            'user_id' => $this->faker->numberBetween($min = 2, $max = 11),
            'comment_id' => $this->faker->numberBetween($min = 1, $max = 50),
        ];
    }
}
