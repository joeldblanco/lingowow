<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unit_id' => $this->faker->numberBetween(1, 5),
            // 'course_id' => $this->faker->numberBetween(1, 6),
            'type' => $this->faker->numberBetween(1, 4),
            // 'data' => $this->faker->json,
            'data' => json_encode([
                'text' => $this->faker->text,
                'image_url' => $this->faker->imageUrl(),
                'video_url' => $this->faker->url,
                'audio_url' => $this->faker->url,
                'answers' => [
                    0 => $this->faker->sentence,
                    1 => $this->faker->sentence,
                    2 => $this->faker->sentence,
                    3 => $this->faker->sentence,
                ],
                'correct_answer' => $this->faker->numberBetween(0, 3),
            ]),
            'status' => $this->faker->numberBetween(1, 2),

        ];
    }
}
