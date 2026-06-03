<?php

namespace App\Http\Controllers;

use App\Events\SingleInvoiceLinkRequested;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class InvoiceController extends Controller
{
    public function show(Tenant $tenant)
    {
        $orgId = auth()->user()->organization_id;
        if ($tenant->organization_id !== $orgId) {
            abort(403);
        }

        $tenant->load('tenantServices.service');
        $services = $tenant->tenantServices;
        $total = $services->sum('value');

        return view('invoices.show', compact('tenant', 'services', 'total'));
    }

    public function downloadPdf(Tenant $tenant)
    {
        $orgId = auth()->user()->organization_id;
        if ($tenant->organization_id !== $orgId) {
            abort(403);
        }

        $services = $tenant->tenantServices()->with('service')->get();
        $total = $services->sum('value');

        $html = view('invoices.pdf', compact('tenant', 'services', 'total'))->render();

        $mpdf = new Mpdf(['format' => 'A4']);

        $mpdf->WriteHTML($html);

        return response($mpdf->Output("Invoice_{$tenant->name}.pdf", \Mpdf\Output\Destination::STRING_RETURN))
            ->header('Content-Type', 'application/pdf');
    }

    public function invoiceChange($id)
    {
        $orgId = auth()->user()->organization_id;
        $tenant = Tenant::where('organization_id', $orgId)->findOrFail($id);
        $tenant->invoicing = !$tenant->invoicing;
        $tenant->save();

        return redirect()->back()->with('success', 'Invoicing status updated successfully.');
    }

    public function sendInvoice($id)
    {
        $orgId = auth()->user()->organization_id;
        $tenant = Tenant::where('organization_id', $orgId)->findOrFail($id);
        event(new SingleInvoiceLinkRequested($tenant));

        return redirect()->back()->with('success', 'Invoice link sent successfully via SMS.');
    }
}
