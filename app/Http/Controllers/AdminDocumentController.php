<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Http\Requests\UploadDocumentRequest;
use Illuminate\Support\Facades\Storage;


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
        $validated = $request->validated();
        $validated['path'] = $request->file('uploaded_document')->store('public/documents');
        $upload = $this->documentModel->create($validated);
        return dd($upload);
        // if($create){
        //     return redirect()->route('admin-list-documents')->with('success','Документ загружен');
        // }
        // return abort(404);
    }

    public function delete($id){
        $document = $this->documentModel->find($id);
        if($document){
            $document->delete();
            Storage::delete($document->path);
        }
        return redirect()->back();
    }
}
