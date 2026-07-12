<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PartnerDashboardController extends Controller
{
    public function index()
    {
        $partner = Auth::guard('partner')->user();
        return view('partner.dashboard', compact('partner'));
    }
}
