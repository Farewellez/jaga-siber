<?php

namespace App\Policies;

use App\Models\Report;
use App\Models\User;

class ReportPolicy
{
    public function view(User $user, Report $report): bool
    {
        return $user->id === $report->hunter_id ||
               $user->id === $report->program->company_id ||
               $user->role === 'admin';
    }

    public function update(User $user, Report $report): bool
    {
        return $user->role === 'admin' || $user->id === $report->program->company_id;
    }
}