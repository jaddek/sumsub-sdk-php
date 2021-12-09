<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Provider;

use Jaddek\Sumsub\Http\Endpoint\Applicants;
use Jaddek\Sumsub\Http\Query\Applicants\ApplicantImportQuery;

class ApplicantsProvider
{
    public function __construct(private Applicants $endpoint)
    {
    }

    public function getApplicantByApplicantId(string $applicantId): array
    {
        return $this->endpoint->getApplicantByApplicantId($applicantId)->toArray();
    }

    public function getApplicantByExternalId(string $externalUserId): array
    {
        return $this->endpoint->getApplicantByExternalId($externalUserId)->toArray();
    }

    public function applicantImport(ApplicantImportQuery $query): array
    {
        return $this->endpoint->applicantImport($query)->toArray();
    }
}