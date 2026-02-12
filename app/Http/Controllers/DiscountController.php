<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(){
        $discounts = Discount::all();
        return view('admin.discount.view', compact('discounts'));
    }

    public function create(){
        return view('admin.discount.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'percentage' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        if(!$validated){
            //redirect to some page
        }

        $discount = Discount::create($validated);
        
        return redirect()->route('admin.viewDiscounts')
                ->with('success', 'Admin discount created successfully.');
    }

    public function edit(string $id) {
        $discount = Discount::findOrFail($id);
        return view('admin.discount.edit', compact('discount'));
    }

    public function update(Request $request, string $id){
        $validated = $request->validate([
            'percentage' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        if(!$validated){
            //do some code
            
        }

        $discount = Discount::findOrFail($id);
        $discount->update($validated);
        $discount->save();
        return redirect()->route('admin.viewDiscounts')
                ->with('success', 'Admin Discount updated successfully.');
        
    }

    public function destroy($id){
        $discount = Discount::findOrFail($id);
        $discount->delete();
        return redirect()->route('admin.viewDiscounts')
                ->with('success', 'Admin Discount deleted successfully.');
        
    }  
}