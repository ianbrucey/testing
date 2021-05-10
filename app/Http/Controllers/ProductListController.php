<?php

namespace App\Http\Controllers;

use App\Models\ProductList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("god.product-list-create", [
            'vendors' => DB::table('users')->where('is_admin', 1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


        try {

            $this->validate($request, [
                'product_id' => 'string|required',
                'product_name' => 'string|required',
                'product_url' => 'url|required',
                'product_image_url' => 'url|required',
                'post_id' => 'integer|required',
                'user_id' => 'integer|required',
                'buy_in' => 'integer|required',
                'prize' => 'integer|required',
            ]);

            ProductList::create($request->all());

        } catch (\Exception $e) {
            session()->flash('error', ': Could not complete request: ' .  $e->getMessage());
            return redirect("/product-list/create");
        }

        session()->flash('success', ': Product successfully added.');
        return redirect("/product-list/create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
