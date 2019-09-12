<?php

namespace App\Http\ViewModels;

use Spatie\BladeX\ViewModel;

class TableDataViewModel extends ViewModel
{
    public $item;

    public $fields;

    public function __construct(object $item, array $fields)
    {
        $this->item = $item;

        $this->fields = $fields;
    }

    public function data(object $item, string $key): string
    {
        if ($key == 'is_active') {
            return $item->{$key} ? 'Active' : 'Inactive';
        } elseif ($key == 'country_id') {
            return $item->country->name;
        } elseif ($key == 'gender_id') {
            return $item->gender->name;
        } elseif ($key == 'company_id') {
            return $item->company->name;
        } else {
            return $item->{$key} ?? '';
        }
    }
}
