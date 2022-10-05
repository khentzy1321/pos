<?php

namespace App\Http\Controllers;

use App\Models\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CustomerStoreRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(4);
        return view('customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
        $avatar_path  = '';

        if($request->hasFile('avatar')){
            $avatar_path = $request->file('avatar')->store('customers');
        }
        $customer = Customer::create([

                    'first_name'                =>         $request->first_name,
                    'last_name'       =>         $request->last_name,
                    'email'            =>         $request->email,
                    'phone'                 =>         $request->phone,
                    'address'                 =>         $request->address,
                    'avatar'               =>         $avatar_path,
                    'user_id'            =>          $request->user()->id,
        ]);
         Alert::success('Added Successfully', 'Thank you');
        return redirect()->route('customers.index');
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function show(Costumer $costumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->first_name                 =          $request->first_name;
        $customer->last_name       =          $request->last_name;
        $customer->email             =          $request->email;
        $customer->phone                  =          $request->phone;
        $customer->address                  =          $request->address;

        if ($request->hasFile('avatar')){
            // Delete Old Image
            if($customer->image) {
                Storage::delete($customer->avatar);
            }

            //Store Image
            $avatar_path = $request->file('avatar')->store('customers');

            $customer->avatar = $avatar_path;
    }
    Alert::success('Updated Successfully', 'Thank you');

    if (! $customer->save()){
        return redirect()->back()->with('error', 'Sorry There is a problem in Updating the product. ');
    }
    return redirect()->route('customers.index')->with('success', 'SuccessFully Updating The Product.  ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costumer $costumer)
    {
        //
    }
}
