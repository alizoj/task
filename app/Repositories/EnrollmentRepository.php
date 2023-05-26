<?php

namespace App\Repositories;

use App\Models\Enrollment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EnrollmentRepository
{
    public function getAllFiltered(array $data): LengthAwarePaginator
    {
        $query = Enrollment::query();

        if (isset($data['status'])) {
            $query->where('status', $data['status']);
        }

        $sort = $data['sort'];
        if ($sort === 'status') {
            $query->orderBy('status', $data['order'] ?? 'asc');
        }

        return $query->with(['course', 'user'])->paginate(20);
    }
}
