<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Endpoint;

use Jaddek\Sumsub\Http\Query\Applicants\ApplicantImportQuery;
use Symfony\Contracts\HttpClient\ResponseInterface;

interface ApplicantsInterface
{
    public function getApplicantByApplicantId(string $applicantId): ResponseInterface;

    public function getApplicantByExternalId(string $externalUserId): ResponseInterface;

    public function applicantImport(ApplicantImportQuery $query): ResponseInterface;
}