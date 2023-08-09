<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new PostgresSQL database if it does not exist';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $databaseName = $this->argument('name') ?: env('DB_DATABASE');

        // Connect to the default "postgres" database
        DB::disconnect();
        Config::set('database.connections.pgsql.database', 'postgres');
        DB::reconnect();

        $exists = DB::select("SELECT 1 FROM pg_database WHERE datname = ?", [$databaseName]);

        if (empty($exists)) {
            DB::statement("CREATE DATABASE $databaseName");
            $this->info("Database $databaseName created successfully.");
        } else {
            $this->info("Database $databaseName already exists.");
        }

        // Optionally, reconnect to the original database
        DB::disconnect();
        Config::set('database.connections.pgsql.database', $databaseName);
        DB::reconnect();
    }


}
