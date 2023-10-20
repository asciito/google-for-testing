<?php

namespace App;

use Illuminate\Support\Str;

class GoogleDownloadable
{
    const BROWSER = 1;

    const DRIVER = 2;

    protected function __construct(
        protected string $version,
        protected string $revision,
        protected array $browserDownloads,
        protected array $driverDownloads
    ) {
        //
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getMilestone(): string
    {
        return Str::of($this->version)->before('.');
    }

    /**
     * @throws \RuntimeException if the required platform doesn't exist
     */
    public function getChromeBrowserURL(string $platform): string
    {
        $item = collect($this->browserDownloads)->first(fn (array $item) => $item['platform'] === $platform);

        if (empty($item)) {
            throw new \RuntimeException("The URL for Google Chrome Browser for platform [$platform], it's not available");
        }

        return $item['url'];
    }

    /**
     * @throws \RuntimeException if the required platform doesn't exist
     */
    public function getChromeDriverURL(string $platform): string
    {
        $item = collect($this->driverDownloads)->first(fn (array $item) => $item['platform'] === $platform);

        if (empty($item)) {
            throw new \RuntimeException("The URL for Google Chrome Driver for platform [$platform], it's not available");
        }

        return $item['url'];
    }

    public function download(int $component, string $platform, string $filename, bool $unzip = false): void
    {
        if ($component & static::BROWSER) {
            download($browser = $this->getChromeBrowserURL($platform), $filename);

            $unzip && unzip($browser);
        }

        if ($component & static::DRIVER) {
            download($driver = $this->getChromeDriverURL($platform), $filename);

            $unzip && unzip($driver);
        }
    }

    public static function make(string $version, string $revision, array $browserDownloads, array $driverDownloads): static
    {
        return new static($version, $revision, $browserDownloads, $driverDownloads);
    }

    public static function makeFromArray(array $data): static
    {
        $downloads = $data['downloads'];

        $version = $data['version'];
        $revision = $data['revision'];
        $browserDownloads = $downloads['chrome'];
        $driverDownloads = $downloads['chromedriver'] ?? [];

        return static::make($version, $revision, $browserDownloads, $driverDownloads);
    }
}