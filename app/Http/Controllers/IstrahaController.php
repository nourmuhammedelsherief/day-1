<?php

namespace App\Http\Controllers;

use App\Istraha;
use App\WebmasterSection;
use Illuminate\Http\Request;
use App\AttachFile;
use App\Comment;
use App\Http\Requests;
use App\Map;
use App\Photo;
use App\RelatedTopic;
use App\Section;
use App\Topic;
use App\TopicCategory;
use App\TopicField;
use Auth;
use File;
use Helper;
use Redirect;

class IstrahaController extends Controller
{
    private $uploadPath = "uploads/topics/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.NewIstraha.add_istraha',compact('GeneralWebmasterSections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Form Data
        $this->validate($request , [
            'cover_image'         => 'mimes:png,jpeg,jpg,gif|max:3000',
            'istraha_name'        => 'required',
            'istraha_description' => 'required',
            'istraha_address'     => 'required',
            'istraha_location'    => 'required'
        ]);

         // Start of Upload Files
        $formFileName = "cover_image";
        $fileFinalName_ar = "";
        if ($request->$formFileName != "") {
            $fileFinalName_ar = time() . rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = base_path() . "/public/" . $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName_ar);
        }
        // End of Upload Files


        // create new Istraha
        $istraha = new Istraha();
        $istraha->cover_image = $fileFinalName_ar;
        $istraha->istraha_name = $request->input('istraha_name');
        $istraha->istraha_description = $request->input('istraha_description');
        $istraha->istraha_address = $request->input('istraha_address');
        $istraha->istraha_location = $request->input('istraha_location');
        $istraha->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Istraha  $istraha
     * @return \Illuminate\Http\Response
     */
    public function show(Istraha $istraha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Istraha  $istraha
     * @return \Illuminate\Http\Response
     */
    public function edit(Istraha $istraha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Istraha  $istraha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Istraha $istraha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Istraha  $istraha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Istraha $istraha)
    {
        //
    }
}
