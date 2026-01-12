<?php

namespace Boy132\Subdomains\Services;

use Boy132\Subdomains\Models\Subdomain;
use Exception;

class SubdomainService
{
    /**
     * @param  array<mixed>  $data
     *
     * @throws Exception
     */
    public function handle(array $data, ?Subdomain $subdomain = null): Subdomain
    {
        $subdomain ??= Subdomain::create($data);
        $subdomain->update($data);

        try {
            $subdomain->upsertOnCloudflare();
        } catch (Exception $exception) {
            $subdomain->delete();

            throw $exception;
        }

        return $subdomain;
    }
}
