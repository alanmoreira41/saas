<?php

namespace App\Listeners\Tenant;
use App\Models\Company;
use App\Events\Tenant\CompanyCreated;
use App\Events\Tenant\DatabaseCreated;
use App\Tenant\Database\DatabaseManager;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCompanyDatabase
{
    private $database;
    /**
     * Create the event listener.
     */
    public function __construct(DatabaseManager $database)
    {
        $this->database = $database;
    }

    /**
     * Handle the event.
     */
    public function handle(CompanyCreated $event)
    {
        $company = $event->company();
       if (!$this->database->createDatabase($company)){
        throw new Exception('Error create database');
             // abort(401);
       }

       //run migrations
       event(new DatabaseCreated($company));
       
    }
}
