<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Contact;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\Message::class;

    public function definition()
    {
        return [
            'contact_id' => Contact::inRandomOrder()->first()->id,
            'sender_id' => User::inRandomOrder()->first()->id, // Thêm giá trị cho sender_id
            'message' => $this->faker->sentence,
        ];
    }
    
}
