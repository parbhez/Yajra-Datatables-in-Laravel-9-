<?php
//https://yajrabox.com/docs/laravel-datatables/master/installation
//https://datatables.yajrabox.com/services/two-datatables
//https://github.com/yajra/laravel-datatables/issues/1652

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ProductController extends Controller
{
    
    public function index(Request $request)
    {

        if ($request->ajax()) {

            //$data = Product::select('id','name','slug')->get();
             //get use korle data loading time besi lage.so collection use kora jave na.only query use korte hobe. query is much faster than collection.
            //Use query instead of collection by removing get() on your data source.

            //hi can you explain why query is much faster than collection?
            //Ans: Because it performs the rest of the functions on the query instead of getting every result and its sub data and trying to perform the functions on that which is less efficient.

            //$data = Product::select('id','name','slug'); 1. eta use kora jay 2. product er  sate multiple table join korle eta use korbo.

            // $users = Post::query()
            // ->select([
            //     'posts.id as id',
            //     'posts.title as title',
            //     'posts.created_at as created_at',
            //     'posts.updated_at as updated_at',
            //     'users.name as created_by'
            // ])
            // ->leftJoin('users', 'posts.user_id', '=', 'users.id');

            $data = Product::query()->select('id','name','slug','image','created_at'); // othoba etao use kora jave

            return Datatables::of($data)->addIndexColumn()
                ->editColumn('created_at', '{{date("F j, Y, g:i a",strtotime($created_at))}}')

                ->addColumn('image', function ($row) {             
                    $img_url= url('images/'.$row->image);            
                    return '<img src="'.$img_url.'" border="0" width="40" class="img-rounded" align="center" />';       
                     })

                ->addColumn('action', function($row){
                    $url= "delete/$row->id";
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">View</a>&nbsp;';
                    $btn = $btn . '<a href="edit/'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>&nbsp;';
                    $btn = $btn . '<a href="'.$url.'" class="edit btn btn-danger btn-sm">Delete</a>&nbsp;';

                    return $btn;
                })

               ->rawColumns(['image','action'])
               ->toJson();
               //->make(true);

        }

        return view('view_product');
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Product $product)
    {
        //
    }

    
    public function edit(Product $product)
    {
        //
    }

    
    public function update(Request $request, Product $product)
    {
        //
    }

    
    public function destroy(Product $product)
    {
        //
    }
}
