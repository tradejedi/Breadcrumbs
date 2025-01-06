<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Contracts\BreadcrumbsContract;

class Breadcrumbs extends Component
{
    public $breadcrumbs;

    public function __construct(BreadcrumbsContract $breadcrumbsService)
    {
        $this->breadcrumbs = $breadcrumbsService->getBreadcrumbs();
    }

    public function render()
    {
        return view('components.breadcrumbs');
    }
}
