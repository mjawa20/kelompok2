<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Votes;
use App\Models\User;
use Livewire\WithPagination;

class Evoting extends Component
{
    public $event, $status, $date, $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public function render()
    {
        $votes = Votes::orderBy('created_at', 'Desc')->paginate(5);
        if ($this->search !== null) {
            $votes = Votes::where('event', 'like', '%' . $this->search . '%')->paginate(5);
        }
        $sum = User::select(User::raw('count(id) as total'))->get();
        $sumVotes = Votes::select(User::raw('count(id) as total'))->get();
        return view('livewire.admin.evoting', [
            'votes' => $votes,
            'sum' => $sum,
            'sumVotes' => $sumVotes,
        ]);
    }

    public function addVotes()
    {
        $this->validate([
            'event' => 'required',
            'date' => 'required',
        ]);

        Votes::create([
            'event' => $this->event,
            'status' => 'pending',
            'date' => $this->date,
        ]);

        return redirect()->to('/admin/evoting');
    }
    public function setStatus($id, $status)
    {
        Votes::where('id', $id)->update([
            'status' => $status
        ]);
    }
    public function delete($id)
    {
        Votes::find($id)->delete();
    }
}
