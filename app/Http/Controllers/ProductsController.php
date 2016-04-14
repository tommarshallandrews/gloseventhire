<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cat;
use App\Group;
use App\Range;
use App\Product;
use App\Colour;
use View;
use Session;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "what do we want here?";

        return View::make('results', compact('results','types','typeSlug','ranges','rangeSlug','cat'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id, $colourslug = null)
    {   
        //return $colour;
        $colour = null;

        $keywords = '';

        if($colourslug){
        $colour = Colour::where('slug', '=', $colourslug)->first();
        $keywords = $keywords . $colour->name . ', ';
        }


         $details = Product::with('range','group')
        ->find($id);

        //return $details;

        $similars = 0;
        

        //select similar products form a range
        if($details->cat_id == 10 || $details->cat_id == 20 || $details->cat_id == 70){
            $rangeSelected = $details->range->id;
            $similars = Product::with('range','group')
            ->where ('range_id', '=', $rangeSelected, 'and')
            ->where ('id','!=', $id)
            ->get();
            $keywords = $keywords . $details->range->name .', ';
            }


        //select similar products form a group
        if($details->cat_id == 30 || $details->cat_id == 40 || $details->cat_id == 50){
            $groupSelected = $details->group->id;
            $similars = Product::with('range','group')
            ->where ('group_id', '=', $groupSelected, 'and')
            ->where ('id','!=', $id)
            ->get(); 
            $keywords = $keywords . $details->group->name .', ';
            }

            $keywords = $keywords . $details->name;

            Session::flash('keywords', $keywords);
            Session::flash('title', $details->name);
            
        //select similar products for linen TODO

        
        
        //return($details);
        return View::make('details', compact('details','colour','similars'));
        //return $details->group->id;
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
    // show product results
    public function show($cat, $group, $range)
    {

        $catId = Cat::where('slug', '=', $cat)->first();
        $groupId = Group::where('slug', '=', $group)->first();
        $rangeId = Range::where('slug', '=', $range)->first();

        

        $cat_id = "%";
        $catSlug = '0';
        $catName = '';
        if ($cat !== '0'){
            $cat_id = $catId->id;
            $catSlug = $catId->slug;
            $catName = $catId->name;
            }


        $group_id = "%";
        $groupSlug = '0';
        $groupName = '';
        if ($group !== '0'){
            $group_id = $groupId->id;
            $groupSlug = $groupId->slug;
            $groupName = $groupId->name;
            }   

        $range_id = "%";
        $rangeSlug = '0';
        $rangeName = '';
        if ($range !== '0'){
            $range_id = $rangeId->id;
            $rangeSlug = $rangeId->slug;
            $rangeName = $rangeId->name;
            }       

          //  return $range_id;

        //
        $results = Product::with('range','group')
        ->where('cat_id','LIKE', $cat_id, 'AND')
        ->where('group_id', 'LIKE', $group_id,  'AND')
        ->where('range_id', 'LIKE', $range_id) 
        ->orderby('order')   
        ->paginate(12);

       // return $cat_id . '-' . $group_id . '-' .$range_id ;

        $groups = Group::where('cat_id', 'LIKE', $cat_id)  
        ->get();

        $ranges = Range::where('cat_id', 'LIKE', $cat_id)  
        ->orderby('order')  
        ->get();

        $keywords = $catName . ', ' . $groupName . ', ' . $rangeName;

         Session::flash('keywords', $keywords);
         Session::flash('title', $catName);

        //return $results;
        return View::make('results', compact('results','groups','groupSlug','ranges','rangeSlug','cat_id','cat','catSlug', 'catName','groupName','rangeName'));
        //return View::make('results');

    }



        public function showLinen($group, $colour)
    {

        $catSlug = 'linen';
        $catName = 'Linen';

        $groupId = Group::where('slug', '=', $group)->first();
        $colourId = Colour::where('slug', '=', $colour)->first();


        $group_id = "%";
        $groupSlug = '0';
        if ($group !== '0'){
            $group_id = $groupId->id;
            $groupSlug = $groupId->slug;
            $groupName = $groupId->name;
            }   

        $colour_id = "%";
        $colourSlug = '0';
        $colourHex = '0';
        if ($colour !== '0'){
            $colour_id = $colourId->id;
            $colourSlug = $colourId->slug;
            $colourHex = $colourId->hex;
            }       

        
        //Living nightmare to work out how to get this to order on the collection field. 
        //Seems you have to use the function to joing the products anf then run the eager load
        $results = colour::with(['product' => function ($query) {

        $query->select('products.*')->join('groups', 'group_id', '=', 'groups.id')->orderBy('groups.collection', 'ASC');

        }, 'product.group'])

         ->where('id', '=', $colour_id)
         ->paginate(100);     
        
        //return $results;

        $groups = Group::where('cat_id', 'LIKE', 60)  
        ->get();


        $colours = Colour::orderby('order')  
        ->get();

        $cat = 'linen';
        $cat_id = 60;

        session::put('colour', $colourHex);

         Session::flash('keywords', 'linen, Tablecloths, napkins');
         Session::flash('title', 'Linen');

        //return $results[0];
        return View::make('results', compact('results','groups','groupSlug','colours','colourId','cat','cat_id','catSlug','groupName','catName'));
        //return View::make('results');

    }





       public function search() {

                $q = \Input::get('searchterm');

                $searchTerms = explode(' ', $q);

                $query = Product::with('range','group');

                foreach($searchTerms as $term)
                {
                    $query->where('name', 'LIKE', '%'. $term .'%');
                }

                $results = $query->paginate(100);  

                //return $results;

                return View::make('search', compact('results','q'));

            }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($group)
    {

        $products = DB::table($group)
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
