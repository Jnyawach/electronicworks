<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

use Psr\Http\Message\UriInterface;

class GenerateSitemap extends Command
{
/**
* The console command name.
*
* @var string
*/
protected $signature = 'sitemap:generate';

/**
* The console command description.
*
* @var string
*/
protected $description = 'Generate the sitemap.';

/**
* Execute the console command.
*
* @return mixed
*/
public function handle()
{
// modify this to your own needs
SitemapGenerator::create(config('app.url'))
    ->shouldCrawl(function (UriInterface $url) {
        return strpos($url->getPath(), '/admin') === false
            && strpos($url->getPath(), '/freelancer') === false
            && strpos($url->getPath(),'/manager') === false
            && strpos($url->getPath(),'/dashboard') === false;
    })
->writeToFile(public_path('sitemap/sitemap.xml'));
}
}
