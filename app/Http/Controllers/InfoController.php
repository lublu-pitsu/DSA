<?php

namespace App\Http\Controllers;

use App\DTO\ClientInfoDTO;
use App\DTO\DatabaseInfoDTO;
use App\DTO\ServerInfoDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    public function serverInfo(): ServerInfoDTO
    {
        return new ServerInfoDTO(
            php_version: phpversion(),
            sapi_name: php_sapi_name(),
            os_name: php_uname('s')
        );
    }

    public function clientInfo(Request $request): ClientInfoDTO
    {
        return new ClientInfoDTO(
            ip_address: $request->ip(),
            user_agent: $request->userAgent() ?? 'unknown'
        );
    }

    public function databaseInfo(): DatabaseInfoDTO
    {
        $connection = DB::connection();
        
        return new DatabaseInfoDTO(
            driver: $connection->getDriverName(),
            version: $connection->getPdo()->getAttribute(\PDO::ATTR_SERVER_VERSION),
            database_name: $connection->getDatabaseName()
        );
    }
}