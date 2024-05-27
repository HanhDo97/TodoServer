<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $readMess = $unReadMess = [];
        foreach ($this as $noti) {
            if ($noti->read_at == null) {
                array_push($unReadMess, $noti);
            } else {
                array_push($readMess, $noti);
            }
        }
        return [
            'readMess' => $readMess, 'unReadMess' => $unReadMess
        ];
    }
}
