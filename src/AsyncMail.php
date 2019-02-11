<?php

namespace OgPe\Laravel;

class AsyncMail {
    public static function send($mailable) {
        \Log::debug('hello from' . __NAMESPACE__ . __CLASS__);
    }
}