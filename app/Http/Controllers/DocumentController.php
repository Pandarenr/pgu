<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    private $documentModel;

    public function __construct(){
        $this->documentModel = new Document;
    }

    public function index(){
        $documents = $this->documentModel->paginate(10);
        return view('app.documents.list',['documents' => $documents]);
    }

    public function detail($id){
        $documentData = $this->documentModel->where('id',$id)->first();
        return view('app.documents.detail',['documentData' => $documentData]);
    }
}
