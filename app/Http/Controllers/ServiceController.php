<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display all services (grid listing page)
     */
    public function index()
    {
        $services = Service::active()
            ->with(['galleries', 'timings', 'highlights', 'footer'])
            ->get();

        return view('services.index', compact('services'));
    }

    /**
     * Display a single service detail page
     */
    public function show(Service $service)
    {
        // Eager load all relationships
        $service->load([
            'sections',
            'galleries',
            'timings',
            'highlights',
            'footer',
        ]);

        // Get other services for "You may also like" section
        $otherServices = Service::active()
            ->where('id', '!=', $service->id)
            ->limit(3)
            ->get();

        return view('services.show', compact('service', 'otherServices'));
    }
}
