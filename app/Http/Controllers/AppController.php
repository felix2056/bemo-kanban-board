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
        $path = public_path() . '/dumps';

        \Spatie\DbDumper\Databases\MySql::create()
            ->setDbName($database_name)
            ->setUserName($username)
            ->setPassword($password)
            ->includeTables(['columns', 'cards'])
            ->dumpToFile($path . '/' . $database_name . time() . '.sql');

        return response()->json([
            'success' => true,
            'message' => 'Database exported successfully',
            'path' => config('app.url') . '/dumps/' . $database_name . time() . '.sql'
        ]);
    }
}
