<?php

namespace TradeJedi\Breadcrumbs\Services;

use Illuminate\Support\Facades\Route;
use TradeJedi\Breadcrumbs\Contracts\BreadcrumbsContract;

class BreadcrumbsService implements BreadcrumbsContract
{
    public function getBreadcrumbs(): array
    {
        $routeName = optional(Route::current())->getName();
        $breadcrumbsConfig = config('breadcrumbs', []);

        $breadcrumbs = $breadcrumbsConfig[$routeName] ?? $breadcrumbsConfig['default'];
        $breadcrumbs = $this->replaceRoutePlaceholders($breadcrumbs);

        return $this->replacePlaceholders($breadcrumbs, Route::current()->parameters());
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

    protected function replaceRoutePlaceholders(array $breadcrumbs): array
    {
        return array_map(function ($crumb) {
            if (isset($crumb['url'])) {
                $crumb['url'] = preg_replace_callback('/\{route\.(.+?)\}/', function ($matches) {
                    return Route::has($matches[1]) ? route($matches[1]) : '/';
                }, $crumb['url']);
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
        # TODO: добавить удаление не работающих плейсхолдеров
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
