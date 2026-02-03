<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SortTable extends Component
{
    public string $col;
    public string $label;
    public string $sort;
    public string $dir;

    public function __construct(string $col, string $label, string $sort, string $dir)
    {
        $this->col   = $col;
        $this->label = $label;
        $this->sort  = $sort;
        $this->dir   = $dir;
    }

    public function url(): string
    {
        $nextDir = ($this->sort === $this->col && $this->dir === 'asc')
            ? 'desc'
            : 'asc';

        return request()->fullUrlWithQuery([
            'sort' => $this->col,
            'dir'  => $nextDir,
            'page' => null,
        ]);
    }

    public function icon(): string
    {
        if ($this->sort !== $this->col) return '↕';
        return $this->dir === 'asc' ? '↑' : '↓';
    }

    public function render()
    {
        return view('components.sort-table');
    }
}