<?php

namespace framework\web\components;

use framework\Application;
use framework\web\interfaces\Component;

/**
 * URL Manager
 *
 * Responsible for:
 *  - Parsing the current request URL
 *  - Normalizing paths
 *  - Generating application URLs
 *  - Working with named routes
 *  - Assisting redirects and navigation helpers
 */
class UrlManager extends Component
{
    /**
     * Base URL (scheme + host + optional subfolder)
     */
    protected ?string $baseUrl = null;

    /**
     * Current request path
     */
    protected ?string $currentPath = null;

    /**
     * Constructor
     */
    public function init(): void
    {
        $app = Application::get();
        $config = $app->config;
        
        $this->baseUrl = config('app.base_url');
        $this->currentPath = $this->removeBase($app->route);
    }

    /* -----------------------------------------------------------------
     |  Current URL inspection
     | -----------------------------------------------------------------
     */

    /**
     * Get full current URL (absolute)
     */
    public function full(): string
    {
        // TODO: Implement
    }

    /**
     * Get normalized request path
     */
    public function path(): string
    {
        return $this->currentPath;
    }

    public function join(...$segments): string {
        $result = '';

        foreach ($segments as $segment) {
            $result .= rtrim($segment, '/') . '/';
        }

        return substr($result, 0, strlen($result)-1);
    }

    /* -----------------------------------------------------------------
     |  Base URL handling
     | -----------------------------------------------------------------
     */

    /**
     * Get base URL (scheme + host + base path)
     */
    public function base(): string
    {
        $scheme = $this->isSecure() ? 'https' : 'http';

        $host = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'];

        return $this->join("$scheme://$host", $this->baseUrl);
    }

    public function public(): string {
        $base = $this->base();

        return $base . '/public';
    }

    /**
     * Get base path only (subfolder install support)
     */
    public function basePath(): string
    {
        return $this->baseUrl;
    }

    /**
     * Detect if current request is HTTPS
     */
    public function isSecure(): bool
    {
        return !empty($_SERVER['HTTPS']);
    }

    /* -----------------------------------------------------------------
     |  Path normalization
     | -----------------------------------------------------------------
     */

    /**
     * Normalize a path (remove duplicate slashes, resolve dots, etc.)
     */
    public function normalize(string $path): string
    {
        // TODO: Implement
    }

    /**
     * Ensure leading slash exists
     */
    protected function ensureLeadingSlash(string $path): string
    {
        // TODO: Implement
    }

    /**
     * Remove trailing slash (except root)
     */
    protected function trimTrailingSlash(string $path): string
    {
        // TODO: Implement
    }

    /**
     * Removes the base URL from the start of
     * given path
     */
    protected function removeBase(string $path): string {
        if (str_starts_with($path, $this->baseUrl)) {
            return substr($path, strlen($this->baseUrl));
        }

        return $path;
    }

    /* -----------------------------------------------------------------
     |  URL generation
     | -----------------------------------------------------------------
     */

    /**
     * Generate URL to a path
     *
     * @param string $path
     * @param array  $query
     * @param bool   $absolute
     */
    public function to(string $path = '/', array $query = [], bool $absolute = false): string
    {
        // TODO: Implement
    }

    /**
     * Append query parameters to URL
     */
    protected function buildQuery(array $query): string
    {
        // TODO: Implement
    }

    /* -----------------------------------------------------------------
     |  Navigation helpers
     | -----------------------------------------------------------------
     */

    /**
     * Check if current path matches pattern
     */
    public function is(string $pattern): bool
    {
        // TODO: Implement
    }

    /**
     * Check if path starts with prefix
     */
    public function startsWith(string $prefix): bool
    {
        // TODO: Implement
    }

    /**
     * Generate URL with modified query parameters
     */
    public function withQuery(array $query): string
    {
        // TODO: Implement
    }

    /**
     * Remove query parameter(s) from URL
     */
    public function withoutQuery(string|array $keys): string
    {
        // TODO: Implement
    }

    /* -----------------------------------------------------------------
     |  Redirect helpers
     | -----------------------------------------------------------------
     */

    /**
     * Redirect back to referrer
     */
    public function back(int $status = 302): void
    {
        // TODO: Implement
    }
}