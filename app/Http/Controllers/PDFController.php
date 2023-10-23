<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\updf;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function __construct()
    {
        // $this->middleware();
    }

    public function index(){
        $data =  updf::all();
        return view('pdf.index',compact('data'));
    }

    public function create(){
        return view('pdf.index');
    }

    public function store(Request $rq){
        $updf = new updf();
        
        $rq->validate([
            'pdfName' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $pdfArr['name'] =  $rq->post('pdfName');
        $pdfArr['title'] =  $rq->post('title');
        $pdfArr['content'] =  $rq->post('content');

        $updf->create($pdfArr);
        
        return redirect('/');

    }

    public function generatePDF($id){
        $data = updf::find($id);
        if(!empty($data))
        {
            $html = '<h1>'.$data->title.'</h1>';
            // $html .= '<div class="page-break"></div>';
            $html .= $data->content;
            // $html = view('pdf.template', compact('data'))->render();
            // $pdf = Pdf::loadView('pdf.template', ['data' => $data]);
            $pdf = Pdf::loadHTML($html)->setPaper('a4', 'portrait');
            return $pdf->download($data->name . '.pdf');
        }
    }
}
