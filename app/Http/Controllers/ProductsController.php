<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cat;
use App\Type;
use App\Range;
use App\Product;
use View;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        DB::table('users')
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {

         $details = Product::with('range','type')
        ->find($id);
        return View::make('details', compact('details'));
        return $details;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cat, $type, $range)
    {

        $catId = Cat::where('slug', '=', $cat)->first();
        $typeId = Type::where('slug', '=', $type)->first();
        $rangeId = Range::where('slug', '=', $range)->first();

        $cat_id = "%";
        if ($cat !== '0'){
            $cat_id = $catId->id;
            }

        $type_id = "%";
        $typeSlug = '0';
        if ($type !== '0'){
            $type_id = $typeId->id;
            $typeSlug = $typeId->slug;
            }   

        $range_id = "%";
        $rangeSlug = '0';
        if ($range !== '0'){
            $range_id = $rangeId->id;
            $rangeSlug = $rangeId->slug;
            }       

        //
        $results = Product::with('range','type')
        ->where('cat_id','LIKE', $cat_id)
        ->where('type_id', 'LIKE', $type_id,  'AND')
        ->where('range_id', 'LIKE', $range_id)  
        ->paginate(3);

        $types = Type::where('cat_id', 'LIKE', $cat_id)  
        ->get();

        $ranges = Range::where('cat_id', 'LIKE', $cat_id)  
        ->get();

        //return $results;
        return View::make('results', compact('results','types','typeSlug','ranges','rangeSlug','cat'));
        //return View::make('results');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type)
    {

        $products = DB::table($type)
        ->get();

        return $products;
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
