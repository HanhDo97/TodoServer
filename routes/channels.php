<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('invite-user-channel', function () {
    return true;
});
