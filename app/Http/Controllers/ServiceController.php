<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function show(Service $service)
    {
        abort_unless($service->is_active, 404);

        return view('pages.service-show', compact('service'));
    }
}
