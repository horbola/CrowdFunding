<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CountrySeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(RoleSeeder::class);
        //$this->call(PermissionSeeder::class);
        //$this->call(UserRoleSeeder::class);
        //$this->call(RolePermissionSeeder::class);
        //$this->call(UserPermissionSeeder::class);
        
        $this->call(CategorySeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(ViewSeeder::class);
        $this->call(LikeSeeder::class);
        $this->call(ShareSeeder::class);
        $this->call(InvestigationSeeder::class);
        
        $this->call(DonationSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(CreditCardSeeder::class);
        $this->call(MobileBankSeeder::class);
    }
}
