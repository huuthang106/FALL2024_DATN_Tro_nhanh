<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word;
        return [
            //
            'name' => $name,
            'status' => $this->faker->boolean,
            'parent_id' => null, // Có thể set giá trị parent sau nếu cần cho phân loại danh mục con
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 1000), // Tạo slug kết hợp với ID hoặc số ngẫu nhiên
            'deleted_at' => null, // Null vì sử dụng soft deletes
        ];
    }
}
