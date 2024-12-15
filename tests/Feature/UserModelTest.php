<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Тест создания пользователя.
     *
     * @return void
     */
    public function test_user_can_be_created()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }

    /**
     * Тест проверки атрибутов пользователя.
     *
     * @return void
     */
    public function test_user_attributes()
    {
        $user = User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->assertEquals('Jane Doe', $user->name);
        $this->assertEquals('jane@example.com', $user->email);
        $this->assertTrue(Hash::check('password', $user->password));
    }

    /**
     * Тест проверки отношений пользователя.
     *
     * @return void
     */
    public function test_user_relationships()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create([
            'user_id' => $user->id,
            'description' => 'Test Order',
            'total_price' => 100,
        ]);

        $this->assertInstanceOf(Order::class, $user->orders->first());
        $this->assertEquals('Test Order', $user->orders->first()->description);
    }

    /**
     * Тест обновления пользователя.
     *
     * @return void
     */
    public function test_user_can_be_updated()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $user->update([
            'name' => 'John Smith',
            'email' => 'john.smith@example.com',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Smith',
            'email' => 'john.smith@example.com',
        ]);
    }

    /**
     * Тест удаления пользователя.
     *
     * @return void
     */
    public function test_user_can_be_deleted()
    {
        $user = User::factory()->create([
            'email' => 'john@example.com',
        ]);

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'email' => 'john@example.com',
        ]);
    }

    /**
     * Тест проверки уникальности email.
     *
     * @return void
     */
    public function test_email_uniqueness()
    {
        $user1 = User::factory()->create([
            'email' => 'john@example.com',
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        $user2 = User::factory()->create([
            'email' => 'john@example.com',
        ]);
    }

    /**
     * Тест проверки хеширования пароля.
     *
     * @return void
     */
    public function test_password_hashing()
    {
        $user = User::factory()->create([
            'password' => 'password',
        ]);

        $this->assertTrue(Hash::check('password', $user->password));
    }

    /**
     * Тест проверки заполняемости обязательных полей.
     *
     * @return void
     */
    public function test_required_fields()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        $user = User::factory()->create([
            'email' => null,
            'password' => null,
        ]);
    }

    /**
     * Тест проверки формата email.
     *
     * @return void
     */
    public function test_email_format()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }
}