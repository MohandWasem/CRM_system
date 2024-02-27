<?php

namespace App\Http\Controllers\Setup;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies=Currency::get();
        return view("Currency.show",compact("currencies"));
    }

    public function add()
    {
        return view("Currency.add");

    }

    public function show(Request $request)
    {
        Currency::create([
           "currency_name"=>$request->input("currency_name"),
        ]);

        return redirect()->route('Currency');
    }

    public function edit($id)
    {
        $currencies=Currency::findOrfail($id);
        return view("Currency.edit",compact("currencies"));
    }

    public function update(Request $request , $id)
    {
        $currencies=Currency::findOrfail($id);

        $currencies->update([
            "currency_name"=>$request->input("currency_name"),
        ]);

        return redirect()->route('Currency');
         
    }

    public function delete($id)
    {
        $currencies=Currency::where('id',$id)->delete();

       return redirect()->route('Currency');
         
    }
}
