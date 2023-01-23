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
        return view('app.documents.index',['documents' => $documents]);
    }

    public function read($id){
        $document = $this->documentModel->where('id',$id)->first();
        return redirect(Storage::url($document->path));
    }

    public function download($id){
        $document = $this->documentModel->where('id',$id)->first();
        return Storage::download($document->path);
    }
}
