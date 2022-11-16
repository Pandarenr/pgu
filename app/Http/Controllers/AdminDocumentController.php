<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Http\Requests\UploadDocumentRequest;


class AdminDocumentController extends Controller
{
    private $documentModel;

    public function __construct(){
        $this->documentModel = new Document;
    }

    public function index(){
        $documents = $this->documentModel->paginate(10);
        return view('admin.documents.list',['documents' => $documents]);
    }

    public function showUploadForm(){
        return view('admin.documents.uploadForm');
    }

    public function store(UploadDocumentRequest $request){
        if($validatedRequest=$request->validated()){
            $create = $this->documentModel->create([
                'path' => $request->file('uploaded_document')->store('public/documents'),
                'title' => $request->title,
                'description' => $request->description,
                'number_of_lists' => $request->number_of_lists
            ]);
        }
        if($create){
            return redirect()->route('admin-list-documents')->with('success','Документ загружен');
        }
        return abort(404);
    }

    public function delete($id){

    }
}
