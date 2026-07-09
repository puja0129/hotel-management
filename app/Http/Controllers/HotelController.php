<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\HotelService;
use App\Models\TeamMember;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $rooms    = Room::where('is_available', true)->get();
        $services = HotelService::take(6)->get();
        $team     = TeamMember::orderBy('sort_order')->take(4)->get();
        return view('hotel.index', compact('rooms', 'services', 'team'));
    }

    public function about()
    {
        $stats = [
            'rooms'    => Room::count(),
            'staff'    => TeamMember::count(),
            'clients'  => 1200,
            'years'    => 15,
        ];
        return view('hotel.about', compact('stats'));
    }

    public function gallery()
    {
        $galleryItems = [
            // Rooms
            ['url' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&q=80&w=800', 'category' => 'rooms', 'title' => 'Presidential Suite'],
            ['url' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&q=80&w=800', 'category' => 'rooms', 'title' => 'Luxury Ocean View'],
            ['url' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&q=80&w=800', 'category' => 'rooms', 'title' => 'Executive Bedroom'],
            ['url' => 'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?auto=format&fit=crop&q=80&w=800', 'category' => 'rooms', 'title' => 'Superior Double Room'],
            ['url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&q=80&w=800', 'category' => 'rooms', 'title' => 'Penthouse Experience'],
            ['url' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&q=80&w=800', 'category' => 'rooms', 'title' => 'Royal Suite Apartment'],
            
            // Food & Dining
            ['url' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&q=80&w=800', 'category' => 'dining', 'title' => 'Gourmet Restaurant'],
            ['url' => 'https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?auto=format&fit=crop&q=80&w=800', 'category' => 'dining', 'title' => 'Fine Dining Experience'],
            ['url' => 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?auto=format&fit=crop&q=80&w=800', 'category' => 'dining', 'title' => 'Exquisite Cuisine'],
            ['url' => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&q=80&w=800', 'category' => 'dining', 'title' => 'Grand Hotel Bar'],
            ['url' => 'https://images.unsplash.com/photo-1525648199074-bee30ba3d027?auto=format&fit=crop&q=80&w=800', 'category' => 'dining', 'title' => 'Morning Breakfast Buffet'],
            
            // Gym & Spa
            ['url' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&q=80&w=800', 'category' => 'wellness', 'title' => 'Modern Gym Facilities'],
            ['url' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?auto=format&fit=crop&q=80&w=800', 'category' => 'wellness', 'title' => 'Relaxing Spa & Massage'],
            ['url' => 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?auto=format&fit=crop&q=80&w=800', 'category' => 'wellness', 'title' => 'Indoor Thermal Pool'],
            ['url' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&q=80&w=800', 'category' => 'wellness', 'title' => 'Aromatherapy Session'],
            
            // Others (Hotel Exterior/Interior)
            ['url' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=800', 'category' => 'others', 'title' => 'Luxury Resort Exterior'],
            ['url' => 'https://images.unsplash.com/photo-1581057403206-455476a6d655?auto=format&fit=crop&q=80&w=800', 'category' => 'others', 'title' => 'Stunning Swimming Pool'],
            ['url' => 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?auto=format&fit=crop&q=80&w=800', 'category' => 'others', 'title' => 'Resort Evening Ambience'],
            ['url' => 'https://images.unsplash.com/photo-1542314831-c6a4d14b8ba0?auto=format&fit=crop&q=80&w=800', 'category' => 'others', 'title' => 'Grand Lobby Entrance'],
            ['url' => 'https://images.unsplash.com/photo-1551882547-ff40c0d13c11?auto=format&fit=crop&q=80&w=800', 'category' => 'others', 'title' => 'Executive Conference Room']
        ];
        return view('hotel.gallery', compact('galleryItems'));
    }

    public function rooms()
    {
        $rooms = Room::where('is_available', true)->get();
        return view('hotel.room', compact('rooms'));
    }

    public function roomDetail($id)
    {
        $room = Room::findOrFail($id);
        return view('hotel.room-detail', compact('room'));
    }

    public function services()
    {
        $services = HotelService::all();
        return view('hotel.service', compact('services'));
    }

    public function serviceDetail($id)
    {
        $service = HotelService::findOrFail($id);
        return view('hotel.service-detail', compact('service'));
    }

    public function team()
    {
        $team = TeamMember::orderBy('sort_order')->get();
        return view('hotel.team', compact('team'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::where('is_active', true)->latest()->get();
        return view('hotel.testimonial', compact('testimonials'));
    }

    public function contact()
    {
        return view('hotel.contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|min:2|max:100',
            'email'   => 'required|email:rfc,dns',
            'subject' => 'required|string|min:5|max:200',
            'message' => 'required|string|min:10|max:5000',
        ]);

        Contact::create($request->only(['name', 'email', 'subject', 'message']));

        return back()->with('success', 'Your message has been sent! We will get back to you shortly.');
    }
}
