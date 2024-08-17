<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = [
            [
                'payment_name' => 'Bank Transfer',
                'phone_no' => '1234567890',
                'owner_name' => 'John Doe',
            ],
            [
                'payment_name' => 'Credit Card',
                'phone_no' => '2345678901',
                'owner_name' => 'Jane Doe',
            ],
            [
                'payment_name' => 'PayPal',
                'phone_no' => '3456789012',
                'owner_name' => 'Alice Smith',
            ],
            [
                'payment_name' => 'Google Pay',
                'phone_no' => '4567890123',
                'owner_name' => 'Bob Johnson',
            ],
            [
                'payment_name' => 'Apple Pay',
                'phone_no' => '5678901234',
                'owner_name' => 'Charlie Brown',
            ],
            [
                'payment_name' => 'Amazon Pay',
                'phone_no' => '6789012345',
                'owner_name' => 'David Lee',
            ],
            [
                'payment_name' => 'Stripe',
                'phone_no' => '7890123456',
                'owner_name' => 'Eve Adams',
            ],
            [
                'payment_name' => 'Square',
                'phone_no' => '8901234567',
                'owner_name' => 'Frank Clark',
            ],
            [
                'payment_name' => 'Cash on Delivery',
                'phone_no' => '9012345678',
                'owner_name' => 'Grace Hall',
            ],
            [
                'payment_name' => 'Bitcoin',
                'phone_no' => '0123456789',
                'owner_name' => 'Henry Ford',
            ],
        ];

        foreach ($payments as $payment) {
            DB::table('payments')->insert([
                'payment_name' => $payment['payment_name'],
                'phone_no' => $payment['phone_no'],
                'owner_name' => $payment['owner_name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}