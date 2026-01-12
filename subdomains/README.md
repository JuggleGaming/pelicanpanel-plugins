# Subdomains (by Boy132 & HarlequinSin)

Allows users to create and manage custom subdomains for their game servers using Cloudflare DNS.

## Features

- Create custom subdomains for game servers
- Cloudflare DNS integration for automatic record management
- Admin management of Cloudflare domains
- Per-server subdomain limits

## SRV Records

In order to create SRV records instead of A/AAAA you need to do the following:

1. Set a `SRV target` for the node
2. Add a [SRV service type](https://github.com/pelican-dev/plugins/blob/main/subdomains/src/Enums/SRVServiceType.php#L10-L16) to the features of the egg, e.g. `srv-minecraft`
