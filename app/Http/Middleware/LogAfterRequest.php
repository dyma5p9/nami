<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;

class LogAfterRequest {

    public function handle($request, \Closure  $next)
    {

        return $next($request);

    }

    public function terminate($request, $response)
    {

        $this->log($request, $response);

    }

    /**
     * Add request in log file.
     *
     * @param $response
     * @param $request
     *
     * @return void
     */
    protected function log($request, $response)
    {

        $url = $request->fullUrl();
        $method = $request->getMethod();
        $ip = $request->getClientIp();
        $status = $response->status();
        $log = "{$ip}: {$status}  {$method}@{$url} ";

        $post = '';
        $post .= ($request->get('post')) ? $request->get('post').' ' : '';
        $post .= ($request->get('state')) ? $request->get('state').' ' : '';

        Log::info('app.requests', [$log, "POST: ".$post, "Response: ".$response->getContent()]);

    }

}