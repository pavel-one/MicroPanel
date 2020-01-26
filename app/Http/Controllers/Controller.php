<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Логирование контроллера
     * @param string $action
     * @param string $channel
     * @param array $data
     * @return bool
     */
    public function log(string $action, string $channel, array $data = []): bool
    {
        $logger = Log::stack([$channel]);
        $msg = "[$action]: \n" . print_r($data, true);
        $logger->info($msg);
        return true;
    }
}
