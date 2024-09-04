<?php

namespace App\Helpers;

use Carbon\Carbon;

class TimeHelper
{
    /**
     * Tính thời gian đã trôi qua từ một thời điểm cụ thể.
     *
     * @param  \Carbon\Carbon  $date
     * @return string
     */
    public static function timeAgo($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
