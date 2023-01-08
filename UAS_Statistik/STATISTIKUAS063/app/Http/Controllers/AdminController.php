<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Models
use App\Models\Score;
use App\Models\User;

use PDF;
use App\Exports\DataExport;
use App\Imports\DataImport;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Score::paginate(5);

        return view('statistika.data', compact('data'), ['tittle' => "data"]);
    }

    public function data(Request $request)
    {
        Score::create($request->except('_token'));
        return redirect(route('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('statistika.create', ['tittle' => "create"]);
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
    public function edit($NIM)
    {
        //
        $data = Score::find($NIM);
        return view('statistika.edit', compact(["data"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($NIM, Request $request)
    {
        //
        $data = Score::find($NIM);
        $data->update($request->except(['_token' => "submit"]));
        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($NIM)
    {
        //
        $data = Score::find($NIM);
        $data->delete();
        return redirect(route('home'));
    }
    public function printDataExcel()
    {
        return Excel::download(new DataExport(), 'data.xlsx');
    }

    public function importDataExcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();  //alert nul di getclient itu
        $file->move('ImportData', $namaFile);

        Excel::import(new DataImport, public_path('/ImportData/'.$namaFile));
        return redirect('/data');
    }

    // public function importDataExcel(Request $request)
    // {
    //     Excel::import(
    //         new DataImport(),
    //         $request->file('file')->store('files')
    //     );
    //     return redirect()->back();
    // }

    public function printDataPDF()
    {
        $data = Score::all();
        $pdf = PDF::loadView('statistika.printData', ['data' => $data]);
        return $pdf->download('data.pdf');
    }

    public function frequency()
    {
        $scores = Score::select('score', Score::raw('COUNT(score) as frequency'))
            ->groupBy('score')
            ->orderBy('score')
            ->paginate(5);
        return view('statistika.frequency', ['score' => $scores]);
    }
}
