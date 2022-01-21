<?php

namespace App\Http\Controllers;

use App\Video;
use App\Event;
use App\Opinion;
use App\Release;
use App\Coverage;
use App\Document;
use App\Procedure;
use App\Announcement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q');

        $results = collect()
            ->concat($this->searchOpinions($query))
            ->concat($this->searchProcedures($query))
            ->concat($this->searchEvents($query))
            ->concat($this->searchReleases($query))
            ->concat($this->searchVideos($query))
            ->concat($this->searchDocuments($query))
            ->concat($this->searchAnnouncements($query))
            ->concat($this->searchCoverages($query))->filter(function ($model) {
                return $model !== null;
            })->sortByDesc(function ($model) {
                return $model->created_at;
            });

        return view('search', [
            'q' => $query,
            'results' => $results,
        ]);
    }

    protected function searchOpinions(string $search)
    {
        return Opinion::search($search)->get()->map(function ($model) {
            $model->view_url = route('opinion.show', [$model]);
            $model->excerpt = Str::limit($model->content, 100);
            $model->type = 'SASMFOS OPINION';
            return $model;
        });
    }

    protected function searchProcedures(string $search)
    {
        return Procedure::search($search)->get()->map(function ($model) {
            $model->view_url = route('ask');
            $model->excerpt = '';
            $model->type = 'PROCEDURE';
            return $model;
        });
    }

    protected function searchReleases(string $search)
    {
        return Release::search($search)->get()->map(function ($model) {
            $model->view_url = route('release.show', [$model]);
            $model->excerpt = '';
            $model->type = 'MEDIA RELEASE';
            return $model;
        });
    }

    protected function searchVideos(string $search)
    {
        return Video::search($search)->get()->map(function ($model) {
            $model->view_url = route('media') . '#resources';
            $model->excerpt = '';
            $model->type = 'VIDEO RESOURCE';
            return $model;
        });
    }

    protected function searchDocuments(string $search)
    {
        return Document::search($search)->get()->map(function ($model) {
            $model->view_url = $model->pdf_file_url;
            $model->excerpt = '';
            $model->type = 'DOCUMENT RESOURCE';
            return $model;
        });
    }

    protected function searchEvents(string $search)
    {
        return Event::search($search)->get()->map(function ($model) {
            $model->view_url = $model->link;
            $model->excerpt = Str::limit($model->description, 100);
            $model->type = 'EVENT';
            return $model;
        });
    }

    protected function searchAnnouncements(string $search)
    {
        return Announcement::search($search)->get()->map(function ($model) {
            $model->view_url = $model->link;
            $model->excerpt = '';
            $model->type = 'ANNOUNCEMENT';
            return $model;
        });
    }

    protected function searchCoverages(string $search)
    {
        return Coverage::search($search)->get()->map(function ($model) {
            $model->view_url = $model->link;
            $model->excerpt = Str::limit($model->description, 100);
            $model->type = 'MEDIA COVERAGE';
        });
    }
}
