<?php

namespace App\Services;

use App\Contracts\BreadcrumbsContract;
use Illuminate\Support\Facades\Route;

class BreadcrumbsService implements BreadcrumbsContract
{
    public function getBreadcrumbs(): array
    {
        $routeName = optional(Route::current())->getName();
        $breadcrumbsConfig = config('breadcrumbs', []);

        $breadcrumbs = $breadcrumbsConfig[$routeName] ?? $breadcrumbsConfig['default'];

        $parameters = Route::current()->parameters();

        return $this->replacePlaceholders($breadcrumbs, $parameters);
    }

    /**
     * Заменяет placeholders на реальные значения
     *
     * @param array $breadcrumbs
     * @param array $parameters
     * @return array
     */
    protected function replacePlaceholders(array $breadcrumbs, array $parameters): array
    {
        return array_map(function ($crumb) use ($parameters) {
            if (isset($crumb['title'])) {
                $crumb['title'] = $this->replaceVariables($crumb['title'], $parameters);
            }

            if (isset($crumb['url'])) {
                $crumb['url'] = $this->replaceVariables($crumb['url'], $parameters);
            }

            return $crumb;
        }, $breadcrumbs);
    }

    /**
     * Заменяет переменные в строке на основе параметров
     *
     * @param string $text
     * @param array $parameters
     * @return string
     */
    protected function replaceVariables(string $text, array $parameters): string
    {
        foreach ($parameters as $key => $value) {
            if (is_object($value) && method_exists($value, '__toString')) {
                $value = (string)$value;
            }

            if (is_object($value)) {
                foreach (get_object_vars($value) as $property => $propertyValue) {
                    $text = str_replace("{{$key}.{$property}}", $propertyValue, $text);
                }
            } else {
                $text = str_replace("{{$key}}", $value, $text);
            }
        }

        return $text;
    }
}
