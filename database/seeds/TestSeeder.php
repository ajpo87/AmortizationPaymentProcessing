<?php

use Illuminate\Database\Seeder;

use App\Project;
use App\Amortization;
use App\Profile;
use App\Payment;
use App\Promoter; // Add this line for the Promoter model

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criar um promotor
        $promoter = Promoter::create([
            'name' => 'Test Promoter',
            'email' => 'promoter@example.com'
        ]);

        // Criar um projeto associado ao promotor
        $project = Project::create([
            'name' => 'Test Project',
            'wallet_balance' => 1000,
            'promoter_id' => $promoter->id
        ]);

        // Criar uma amortização associada ao projeto
        $amortization = $project->amortizations()->create([
            'schedule_date' => '2024-01-25',
            'state' => 'pending',
            'amount' => 500
        ]);

        // Criar um perfil
        $profile = Profile::create([
            'name' => 'Test Profile',
            'email' => 'profile@example.com'
        ]);

        // Criar um pagamento associado à amortização e perfil
        $payment = Payment::create([
            'amortization_id' => $amortization->id,
            'amount' => 500,
            'profile_id' => $profile->id,
            'state' => 'completed'
        ]);
    }
}
