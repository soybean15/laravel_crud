<?php

namespace Database\Factories;

use App\Enum\RoleEnum;
use App\Helpers\IdGenerator;
use App\Models\Department;
use App\Models\User;
use App\Providers\EmployeeServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }


    public function configure(): static
    {


        return $this->afterCreating(function (User $user) {

            $user->assignRole('user');

            $employee = $user->employee()->create(
                [
                    'employee_code'=>IdGenerator::generateId(EmployeeServiceProvider::EMPLOYEE_CODE_PREFIX,EmployeeServiceProvider::EMPLOYEE_CODE_LEN),
                    'first_name'=>fake()->firstName(),
                    'last_name'=>fake()->lastName(),
                    'middle_name'=>fake()->lastName(),
                    'birth_date'=>fake()->dateTimeBetween('-40 years', '-18 years'),
                    'address'=>fake()->address(),
                    'gender' => fake()->randomElement(['male', 'female', 'other']),
                    'status'=>fake()->randomElement(RoleEnum::cases())->value,

                ]
            );
            $randomDepartment = Department::inRandomOrder()->first();

            $employee->department()->associate($randomDepartment);

            $employee->save();

        });
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
