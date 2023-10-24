<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PdfModel;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function __construct()
    {
        // $this->middleware();
    }

    public function index(){
        $data =  PdfModel::all();
        return view('pdf.index',compact('data'));
    }

    public function create($id=0){

        $data['title'] = ""; 
        $data['name'] = ""; 
        $data['content'] = ""; 

        if($id>0){
            $dataArr = PdfModel::find($id);
            if(!empty($dataArr)){
                $data['title'] = $dataArr->title; 
                $data['name'] = $dataArr->name; 
                $data['content'] = $dataArr->content;
            }
        }

        return view('pdf.create',compact('data'));
    }

    public function store(Request $rq){
        $PdfModel = new PdfModel();
        
        $rq->validate([
            'pdfName' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $pdfArr['name'] =  $rq->post('pdfName');
        $pdfArr['title'] =  $rq->post('title');
        $pdfArr['content'] =  $rq->post('content');

        $PdfModel->create($pdfArr);
        
        return redirect('/');

    }

    public function generatePDF($id){
        $data = PdfModel::find($id);
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
