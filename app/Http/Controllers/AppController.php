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
        $path = storage_path();

        \Spatie\DbDumper\Databases\MySql::create()
            ->setDbName($database_name)
            ->setUserName($username)
            ->setPassword($password)
            ->includeTables(['columns', 'cards'])
            ->dumpToFile($path . '/' . $database_name . '.sql');

        return response()->download($database_name . '.sql');
    }
}
