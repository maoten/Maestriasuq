<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class ImagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*  $images=Image::all();
          $images->each(function($images){
              $images->article;
          });
          return view('admin.images.index')->with('images',$images);*/
    }
}
