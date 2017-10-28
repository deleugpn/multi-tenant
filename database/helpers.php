<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

if (! function_exists('tenant_connect')) {
    /**
     * Establish a tenant database connection.
     *
     * @param $hostname
     * @param $username
     * @param $password
     * @param $database
     */
    function tenant_connect($hostname, $username, $password, $database)
    {
        // Erase the tenant connection, thus making Laravel get the default values all over again.
        DB::purge('tenant');

        // Make sure to use the database name we want to establish a connection.
        Config::set('database.connections.tenant.host', $hostname);
        Config::set('database.connections.tenant.database', $database);
        Config::set('database.connections.tenant.username', $username);
        Config::set('database.connections.tenant.password', $password);

        // Rearrange the connection data
        DB::reconnect('tenant');

        // Ping the database. This will thrown an exception in case the database does not exists.
        Schema::connection('tenant')->getConnection()->reconnect();
    }
}

if (! function_exists('tenant_migrate')) {
    /**
     * Run Tenant Migrations in the connected tenant database.
     */
    function tenant_migrate()
    {
        Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path' => 'database/migrations_tenant'
        ]);
    }
}