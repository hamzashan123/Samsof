<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Document;
use App\Http\Requests\Documents\CreateDocumentRequest;
use App\Http\Requests\Documents\UpdateDocumentRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::orderBy('id')->paginate(10);

        return view('admin.documents.index', [
            'documents' => $documents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.documents.edit', [
            'document' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDocumentRequest $request)
    {
        $data = $request->validated();

        $document = Document::create($data);

        $this->updatePdf($document, $request->get('pdf'));

        return redirect()->route('admin.documents.index')
            ->with('success', 'Document Created');
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
    public function edit(Document $document)
    {
        return view('admin.documents.edit', [
            'document' => $document,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $data = $request->validated();

        $document->update($data);

        $this->updatePdf($document, $request->get('pdf'));

        return redirect()->route('admin.documents.index')
            ->with('success', 'Document Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        Storage::disk('local')->delete('images/documents/' . $document->slug . '.pdf');

        $document->delete();

        return redirect()->route('admin.documents.index')
            ->with('success', 'Document Deleted');
    }

    protected function updatePdf(Document $document, $tempFilename = null)
    {
        $path = $this->getPdfDirectory($document);
        if ($tempFilename) {
            rename(
                storage_path('app/images/temp/' . $tempFilename),
                $path . $document->slug . '.pdf'
            );
        }
    }

    protected function getPdfDirectory(Document $document)
    {
        if (!file_exists($path = storage_path('app/images/documents/'))) {
            mkdir($path);
        }
        return $path;
    }
}
