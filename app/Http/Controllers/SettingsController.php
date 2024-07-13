<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
{
  public function edit()
  {
    $data = [
      'maxim_cost' => Setting::getValue('maxim_cost'),
      'admin_cost' => Setting::getValue('admin_cost'),
    ];

    return view('admin.settings.cost', compact('data'));
  }

  public function update(Request $request)
  {
    $request->validate([
      'maxim_cost' => 'required|numeric',
      'admin_cost' => 'required|numeric',
    ]);

    Setting::setValue('maxim_cost', $request->input('maxim_cost'));
    Setting::setValue('admin_cost', $request->input('admin_cost'));

    Alert::toast('Biaya admin diperbarui', 'success');
    return redirect()->back()->with('success', 'Admin cost updated successfully.');
  }
}
