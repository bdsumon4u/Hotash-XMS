<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RegisterDeviceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'androidId' => 'required',
            'model' => 'required',
        ]);

        if (! $user = User::fromRequest($request)) {
            return response()->json(['success' => false, 'data' => null, 'error' => ['code' => 404, 'message' => 'Not Found']]);
        }

        // if ($user->isActiveDevicesLimitReached()) {
        //     $errorCode = 401;
        //     $error = __('error_devices_limit_reached');
        // }

        DB::beginTransaction();
        $device = $user->devices()->firstOrNew([
            'android_id' => $request->androidId,
        ], [
            'model' => $request->model,
            'enabled' => false,
        ]);

        $device->setModel($request->model);
        if ($$v = $request->get('androidVersion')) {
            $device->fill(['android_version' => $v]);
        }
        if ($$v = $request->get('appVersion')) {
            $device->fill(['app_version' => $v]);
        }
        $device->save();

        // $deviceUser = new DeviceUser();
        // $deviceUser->setDeviceID($device->getID());
        // $deviceUser->setUserID($user->getID());
        // $deviceUser->save(true, ['active' => 1]);

        if ($sims = $request->get('sims')) {
            $device->sims()->upsert(collect(json_decode($sims, true))
                ->map(function ($sim) {
                    return array_merge([
                        'icc_id' => $sim['iccID'],
                        'enabled' => true,
                    ], Arr::except($sim, ['iccID']));
                })->toArray(), ['enabled'], ['device_id', 'slot']);
        }
        DB::commit();

        return response()->json([
            'success' => true,
            'data' => [
                'senderId' => 'SENDER_ID',
                'purchaseCode' => 'PURCHASE_CODE',
                'device' => $device,
            ],
            'error' => null,
        ]);
    }
}
