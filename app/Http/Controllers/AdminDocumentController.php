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
        return view('admin.documents.index',['documents' => $documents]);
    }

    public function uploadForm(){
        return view('admin.documents.uploadForm');
    }

    public function store(UploadDocumentRequest $request){
        $validated = $request->validated();
        $storePatch = $request->file('uploaded_document')->store('public/documents');
        $validated['path'] = $storePatch;
        $upload = $this->documentModel->create($validated);
        if($upload){
            return redirect()->route('admin-index-documents')->with('success','Документ загружен');
        }
        return abort(404);
    }

    public function delete($id){
        $document = $this->documentModel->find($id);
        if($document){
            $deleted=Storage::delete($document->path);
            $document->delete();
        }
        return redirect()->back();
    }
}
