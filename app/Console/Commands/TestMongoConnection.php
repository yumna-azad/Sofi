<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MongoDB\Client;

class TestMongoConnection extends Command
{
    protected $signature = 'mongo:test';
    protected $description = 'Test MongoDB connection';

    public function handle()
    {
        try {
            $client = new Client(config('database.connections.mongodb.dsn'));
            $database = $client->selectDatabase('furniture');
            $collections = $database->listCollections();
            
            $this->info('Successfully connected to MongoDB');
            $this->info('Available collections:');
            
            foreach ($collections as $collection) {
                $this->line('- ' . $collection->getName());
            }
            
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Failed to connect to MongoDB: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
} 