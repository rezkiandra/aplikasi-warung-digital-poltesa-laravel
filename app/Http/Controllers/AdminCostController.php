<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCostController extends Controller
{
  public function editAdminCost()
  {
    $adminCost = Setting::getValue('admin_cost');
    return view('admin.settings.editAdminCost', compact('adminCost'));
  }

  public function updateAdminCost(Request $request)
  {
    $request->validate([
      'admin_cost' => 'required|numeric',
    ]);

    Setting::setValue('admin_cost', $request->input('admin_cost'));
    Alert::toast('Biaya admin diperbarui', 'success');
    
    return redirect()->back()->with('success', 'Admin cost updated successfully.');
  }
}
