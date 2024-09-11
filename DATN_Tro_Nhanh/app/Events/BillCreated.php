<?php
namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Models\Bill;

class BillCreated
{
    use SerializesModels;

    public $bill;
    public $user_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bill $bill, $user_id)
    {
        $this->bill = $bill;
        $this->user_id = $user_id;
    }

}
