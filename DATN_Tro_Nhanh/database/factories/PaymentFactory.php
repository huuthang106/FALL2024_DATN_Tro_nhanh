<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Resident;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Payment::class;
    public function definition(): array
    {  // Chọn ngẫu nhiên một resident nếu có
  
       
        // Chọn ngẫu nhiên một user cho creator_id và payer_id
        $creatorId = User::inRandomOrder()->first()->id ?? null;
        $payerId = User::inRandomOrder()->first()->id ?? null;

        // Định dạng số tiền để phù hợp với tiền tệ VN, loại bỏ ký hiệu tiền tệ
        $amount = $this->faker->randomFloat(2, 10, 1000);
        $formattedAmount = number_format($amount, 0, '', '');

        return [
            'title' => $this->faker->sentence, // Tạo tiêu đề thanh toán
            'creator_id' => $creatorId,
            'payer_id' => $payerId,
            'payment_date' => $this->faker->dateTimeBetween('-1 year', 'now'), // Ngày thanh toán trong 1 năm qua
            'amount' => (float) $formattedAmount, // Định dạng số tiền không có ký hiệu
            'description' => $this->faker->text, // Mô tả thanh toán
            'status' => $this->faker->boolean(80), // Trạng thái thanh toán, 80% là 1
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
