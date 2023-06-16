<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Task;

class TaskTable extends Component
{
    protected $listeners = ['indexTask'];
    public function render()
    {
    $task = Task::orderBy('id', 'desc')->limit(10)->get();
    return view('livewire.task-table', ['task' => $task]);
    }
    public function indexTask($task)
{
  }
    }
    
