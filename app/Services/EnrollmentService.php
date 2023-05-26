<?php

namespace App\Services;

use App\Http\Requests\EnrollmentIndexRequest;
use App\Repositories\EnrollmentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EnrollmentService
{
    protected EnrollmentRepository $enrollmentRepository;

    public function __construct(EnrollmentRepository $enrollmentRepository)
    {
        $this->enrollmentRepository = $enrollmentRepository;
    }

    public function getAllEnrollmentsFiltered(array $data): LengthAwarePaginator
    {
        return $this->enrollmentRepository->getAllFiltered($data);
    }
}
