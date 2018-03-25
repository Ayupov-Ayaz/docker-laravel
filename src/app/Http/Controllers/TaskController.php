<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    protected $tasks;

    /**
     * TaskController constructor.
     * @param $tasks - Экземпляр репозитория с задачами
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;

    }

    /**
     * Получить задачи текущего пользователя
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('tasks.index',[
            'tasks' => $this->tasks->forUser($request->user()),
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191'
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    public function destroy(int $taskId)
    {

    }
}
