<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Buku;

class SearchBooks extends Component
{
    public $search = '';

    public function render()
    {
        $buku = Buku::where('judul', 'like', '%' . $this->search . '%')
            ->orWhere('penulis', 'like', '%' . $this->search . '%')
            ->orWhere('penerbit', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.search-books', ['buku' => $buku]);
    }
}
