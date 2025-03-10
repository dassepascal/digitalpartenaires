<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

beforeEach(function () {
    DB::table('users')->truncate();
});

test('a user can be created', function () {
    $user = User::factory()->create([
        'name' => 'John',
        'firstname' => 'Doe',
        'email' => 'john.doe@example.com',
        'password' => 'password',
        'role' => 'user',
    ]);

    expect($user)->toBeInstanceOf(User::class)
        ->and($user->name)->toBe('John')
        ->and($user->email)->toBe('john.doe@example.com');
});

test('a user can be an admin', function () {
    $admin = User::factory()->create([
        'name' => 'Admin',
        'firstname' => 'User',
        'email' => 'admin@example.com',
        'password' => 'password',
        'role' => 'admin',
    ]);

    expect($admin->isAdmin())->toBeTrue();
});

test('a user is not an admin by default', function () {
    $user = User::factory()->create([
        'name' => 'John',
        'firstname' => 'Doe',
        'email' => 'john.doe@example.com',
        'password' => 'password',
        'role' => 'user',
    ]);

    expect($user->isAdmin())->toBeFalse();
});

test('a user has many addresses', function () {
    $user = User::factory()
        ->hasAddresses(3)
        ->create();

    expect($user->addresses)->toHaveCount(3);
});