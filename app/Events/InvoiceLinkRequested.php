<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InvoiceLinkRequested
{
    use Dispatchable, SerializesModels;
<<<<<<< HEAD

    public function __construct()
    {
        // No data needed
=======
    public $tenants;
    public function __construct($tenants)
    {
        // No data needed
        $this->tenants = $tenants;
>>>>>>> c57bb21 (subscription module)
    }
}
