<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Endpoint;

use Jaddek\Sumsub\Http\Query\Applicants\ApplicantImportQuery;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Applicants extends Endpoint implements ApplicantsInterface
{
    public function getApplicantByApplicantId(string $applicantId): ResponseInterface
    {
        $url = strtr(
            '/resources/applicants/{applicantId}/one',
            [
                '{applicantId}' => $applicantId,
            ]
        );

        return $this->request('GET', $url);
    }

    public function getApplicantByExternalId(string $externalUserId): ResponseInterface
    {
        $url = strtr(
            '/resources/applicants/-;externalUserId={externalUserId}/one',
            [
                '{externalUserId}' => $externalUserId,
            ]
        );

        return $this->request('GET', $url);
    }

    public function applicantImport(ApplicantImportQuery $query): ResponseInterface
    {
        $url = strtr(
            '/resources/applicants/-/import?{query}',
            [
                '{query}' => http_build_query($query->toArray())
            ]
        );

        return $this->request('POST', $url);
    }
}