<?php

namespace App\Observers;

use App\Models\Report;
use App\Models\ReportTimeline;

class ReportObserver
{
    public function updated(Report $report)
    {
        if ($report->isDirty('status')) {
            ReportTimeline::create([
                'report_id' => $report->id,
                'status' => $report->status,
                'note' => 'Status updated by ' . auth()->user()->name, // Note with user info since user_id not in schema
            ]);
        }
    }
}