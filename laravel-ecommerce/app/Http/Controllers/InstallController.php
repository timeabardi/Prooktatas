<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class InstallController extends Controller
{
    public function index() {
       
        $migrationStatus = $this->runMigrations();

        $seederStatus = false;

        $dbConnectionStatus = $this->checkDatabaseConnection();


        if (!$dbConnectionStatus) {
           
        }
        if (!$migrationStatus) {
            $seederStatus = $this->runSeeders();
        }
       
        return response()->json([
            'database_connection_status' => $dbConnectionStatus,
            'migration_status' =>  $migrationStatus,
            'seeder_status' => $seederStatus
        ]);
    }

    private function checkDatabaseConnection() {
    try {
        DB::connection()->getPdo();
        return true;
    }catch(\Exception $e) {
        echo $e->getMessage();
        return false;
    }
    }
    private function runMigrations() {
        try {
            Artisan::call('migrate');
            return true;
        }catch(\Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }
    private function runSeeders() {
        try {
            Artisan::call('db:seed', [
                '--class' => 'DatabaseSeeder',
                '--force' => true
            ]);
            return true;
        }catch(\Exception $e) {
            return false;
        }
    }
}