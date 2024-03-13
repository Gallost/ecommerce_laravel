<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClickstreamRaw;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class ClickStreamController extends Controller
{
    public function collect(Request $request) {
        $user = Auth::user();
        if (!isset($user)) return response()->json('User not logged in.');

        $target = $request->target;
        $route = $request->route;
        if (!isset($target) || !isset($route)) return response()->json('One of the parameters is null.');

        $ip = $request->ip();
        try {
            $ipinfo = Http::timeout(5)->get(config('endpoints.ipinfo.url') . '/' . $ip, [
                'token' => config('endpoints.ipinfo.key')
            ])->json();
        } catch (\Exception $e) {
            return response()->json($e);
        }

        ClickstreamRaw::on('protoshell')->create([
            'target' => $target,
            'click_page' => $route,
            'ip' => $request->ip(),
            'loc' => $ipinfo['bogon'] ? null : $ipinfo['city'] . ',' . $ipinfo['region'] . ',' . $ipinfo['country'],
            'geoloc' => $ipinfo['bogon'] ? null : $ipinfo['loc'],
            'device' => $request->header('User-Agent'),
            'user' => $user->id
        ]);
        return response()->json('Logged clickstream.');
    }
}
