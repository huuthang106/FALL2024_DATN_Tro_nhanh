<?php

namespace Database\Factories;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'contact_user_id' => User::factory(),
        ];
    }
}
