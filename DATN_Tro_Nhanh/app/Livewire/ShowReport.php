<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Report;

class ShowReport extends Component
{
    use WithPagination;
    public $currentPage;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public $confirmingDelete = false;
    public $reportToDelete;
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // public function render()
    // {

    //     $reports = Report::with('user', 'room')
    //         ->where(function($query) {
    //             if ($this->search) {
    //                 $query->where('description', 'like', '%'.$this->search.'%')
    //                     ->orWhereHas('user', function($q) {
    //                         $q->where('name', 'like', '%'.$this->search.'%');
    //                     })
    //                     ->orWhereHas('room', function($q) {
    //                         $q->where('title', 'like', '%'.$this->search.'%');
    //                     });
    //             }
    //         })
    //         ->paginate(1); // Mỗi trang có 10 báo cáo
    //         $currentPage = $reports->currentPage();
    //     return view('livewire.show-report', [
    //         'reports' => $reports,
    //         'currentPage' => $currentPage, // Truyền biến currentPage đ
    //    ]);
    // }
    public function render()
    {
        $reports = Report::with(['user', 'zone.rooms'])
            ->where(function ($query) {
                if ($this->search) {
                    $query->where('description', 'like', '%' . $this->search . '%')
                        ->orWhereHas('user', function ($q) {
                            $q->where('name', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('zone', function ($q) {
                            $q->where('name', 'like', '%' . $this->search . '%');
                        });
                }
            })
            ->paginate(10); // Mỗi trang có 10 báo cáo

        $currentPage = $reports->currentPage();

        return view('livewire.show-report', [
            'reports' => $reports,
            'currentPage' => $currentPage,
        ]);
    }
    public function confirmDelete($reportId)
    {
        $this->confirmingDelete = true;
        $this->reportToDelete = $reportId;
    }

    public function deleteReport($reportId)
    {
        $report = Report::find($reportId);
        if ($report) {
            $report->delete();
        }
        // Không cần flash message hay bất kỳ thông báo nào
    }
}
