<?php

use SilverStripe\Dev\BuildTask;
use SilverStripe\CMS\Model\SiteTree;

class FlushContentTask extends BuildTask
{
    protected $title = 'Flush Default Homepage Content';
    protected $description = 'Clears the default homepage content';

    public function run($request)
    {
        $homePage = SiteTree::get()->filter(['Title' => 'Home'])->first();
        if ($homePage) {
            $homePage->Content = '';
            $homePage->write();
            echo "Homepage content cleared!";
        } else {
            echo "Homepage not found.";
        }
    }
}
