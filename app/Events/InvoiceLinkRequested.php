<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InvoiceLinkRequested
{
    use Dispatchable, SerializesModels;

    public $tenants;

    public function __construct($tenants = null)
    {
        $this->tenants = $tenants;
    }
}
