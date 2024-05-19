<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            [
                'account_no' => '1001',
                'name' => 'Cash',
                'type' => 'asset',
                'balance' => 1000.00,
                'opening_balance' => 1000.00,
            ],
            [
                'account_no' => '2001',
                'name' => 'Accounts Payable',
                'type' => 'liability',
                'balance' => 500.00,
                'opening_balance' => 500.00,
            ],
            [
                'account_no' => '3001',
                'name' => 'Owners Equity',
                'type' => 'equity',
                'balance' => 1500.00,
                'opening_balance' => 1500.00,
            ],
            [
                'account_no' => '4001',
                'name' => 'Sales Revenue',
                'type' => 'revenue',
                'balance' => 0.00,
                'opening_balance' => 0.00,
            ],
            [
                'account_no' => '5001',
                'name' => 'Office Supplies Expense',
                'type' => 'expense',
                'balance' => 0.00,
                'opening_balance' => 0.00,
            ],
        ];

        foreach ($accounts as $account) {
            Account::create($account);
        }
    }
}
