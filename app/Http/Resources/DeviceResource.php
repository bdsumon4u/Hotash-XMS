<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class DeviceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);

        return Arr::only($data, ['token', 'model', 'enabled']) + [
            'ID' => $data['id'],
            'androidID' => $data['android_id'],
            'androidVersion' => $data['android_version'],
            'appVersion' => $data['app_version'],
            'userId' => $data['user_id'],
            'sharedToAll' => $data['shared_to_all'],
            'useOwnerSettings' => $data['use_owner_settings'],
            'user' => null,
        ];
    }
}
