<?php

namespace App\Http\Controllers\Documents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\File;
use Illuminate\Support\Facades\DB;
use App\Notifications\DocumentUploaded;

class DocumentsController extends Controller
{
    public function index() {
        // $files = Storage::files('documents');
        // $fileSizes = [];
        // foreach($files as $file) {
        //     $fileSizes[] = Storage::size($file);
        // }

        $files = File::all();

    	return view('documents.index', ['files' => $files]);
    }

    public function uploads() {
        $files = File::all();
    	return view('documents.uploads', ['files' => $files]);
    }

    public function downloads() {
        $files = DB::table('files')->where('downloaded', '=', true)->get();
        // to future me: this one doesn't work, find out why and fix it!!
        // $files = File::where('downloaded', '=', true)->get();
    	return view('documents.downloads', ['files' => $files]);
    }

    public function uploadDocument() {
    	return view('documents.upload-document');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'filename' => 'required|max:255',
            'extension' => 'required',
        ]);

        if ($request->has('document')) {
            // $request->file('document')->store('images');
            // Storage::putFile('images', $request->file('document'));

            $filename = $request->filename;
            $extension = $request->extension;
            $storedFile = Storage::putFileAs('documents', $request->file('document'), $filename . '.' . $extension);
            $fileSize = Storage::size($storedFile); 
            $fileToSave = new File;
            $fileToSave->filename = $filename;
            $fileToSave->uploaded_by = $request->uploaded_by;
            $fileToSave->size = $fileSize;
            $fileToSave->save();

            // to future me: this one does not work because of the internet connection, find out how to use php mail's function with laravel so you can send emails offline
            $user = auth()->user();
            $user->notify(new DocumentUploaded());

            return redirect()->route('documents-index')->withFlashSuccess(__('strings.document-uploaded-successfully'));
        } else {
            return redirect()->back()->withFlashDanger(__('strings.must-select-document'));
        }
    }

    public function deleteDocument(Request $request) {
        $fileID = $request->file;
        $fileToDelete = File::findOrFail($fileID);
        $fileToDelete->delete();
        $filename = $fileToDelete->filename;
        Storage::delete('documents/' . $filename);

        return redirect()->back()->withFlashSuccess(__('strings.document-deleted-successfully')); 
    }

    public function downloadDocument(Request $request) {
        $fileID = $request->file;
        $fileToDownload = File::findOrFail($fileID);
        $filename = $fileToDownload->filename;
        $fileToDownload->downloaded = true;
        $fileToDownload->save();
        return Storage::download('documents/' . $filename, $filename);
    }

    public function searchDocuments(Request $request) {
        $filename = $request->search;
        // to future me: this one doesn't work, fix it!!
        // $files = File::where('filename', $filename)->get();
        $files = DB::table('files')->where('filename','like', '%' . $filename . '%')->get();        
        return view('documents.search-documents', ['files' => $files]);
    }
}
