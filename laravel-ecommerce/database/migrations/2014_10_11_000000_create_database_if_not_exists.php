<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $databaseName = config('database.connections.mysql.database');
        $charset = config('database.connevtions.mysqk.charset', 'utf8mb4');
        $collation = config('database.connevtions.mysqk.collation', 'utf8mb4_unicode_ci');

        $query = "CREATE DATABASE IF NOT EXISTS $databaseName CHARACTER SET $charset COLLATE $collation;";
        if(! DB::statement($query)) {
            $errorMessage = DB::connection()->getPdo()->errorInfo()[2];
            throw new \Exception("Failed to create database $databaseName: $errorMessage");
        }
    }

    public function down(): void
    {
        $databaseName = config('database.connections.mysql.database');
        $query = "DROP DATABASE IF EXISTS $databaseName;";
        DB::statement($query);
    }
    
};