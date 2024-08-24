<?php

namespace Database\Factories;
use App\Models\Transaction;
use App\Models\User;
use App\Models\CartDetail;
use App\Models\Payment;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{  protected $model = Transaction::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $cartDetail = $this->faker->boolean(30) ? CartDetail::inRandomOrder()->first() : null;
        $bill = $this->faker->boolean(30) ? Payment::inRandomOrder()->first() : null;

        return [
            'added_funds' => $this->faker->optional()->randomFloat(2, 0, 1000), // Số tiền thêm vào (có thể null)
            'amount_withdrawn' => $this->faker->optional()->randomFloat(2, 0, 1000), // Số tiền rút (có thể null)
            'balance' => $this->faker->randomFloat(2, 0, 10000), // Số dư tài khoản
            'description' => $this->faker->text, // Mô tả giao dịch
            'status' => $this->faker->boolean(80), // Trạng thái giao dịch, 80% là 1
            'user_id' => $user ? $user->id : null, // ID của người dùng
            'cart_detail_id' => $cartDetail ? $cartDetail->id : null, // ID của cart_detail (có thể null)
            'bill_id' => $bill ? $bill->id : null, // ID của bill (có thể null)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
