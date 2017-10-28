<?php

namespace App\Models\Main;

use App\Models\MainModel;
use Illuminate\Support\Facades\Config;

class Company extends MainModel
{
    /**
     * Establish a connection with the tenant's database.
     */
    public function connect()
    {
        if (! $this->connected()) {
            tenant_connect(
                $this->hostname,
                $this->username,
                $this->password,
                $this->database
            );
        }
    }

    /**
     * Check if the current tenant connection settings matches the company's database settings.
     *
     * @return bool
     */
    private function connected()
    {
        $connection = Config::get('database.connections.tenant');

        return $connection['username'] == $this->username &&
            $connection['password'] == $this->password &&
            $connection['database'] == $this->database;
    }
}
