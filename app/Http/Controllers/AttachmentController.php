<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function download(Report $report)
    {
        Gate::authorize('view', $report);

        if (!$report->attachment_path) {
            abort(404);
        }

        return Storage::download($report->attachment_path);
    }
}
