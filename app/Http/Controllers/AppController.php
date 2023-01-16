<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function exportDB()
    {
        $database_name = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');

        \Spatie\DbDumper\Databases\MySql::create()
            ->setDbName($database_name)
            ->setUserName($username)
            ->setPassword($password)
            ->includeTables(['columns', 'cards'])
            // dump inside public folder
            ->dumpToFile('public/' . $database_name . '.sql');

        return response()->download($database_name . '.sql');
    }
}
