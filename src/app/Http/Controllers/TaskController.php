<?php

namespace App\Http\Controllers;

use App\Entities\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * @var TaskRepository
     */
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
     * Получение всех задач
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAll()
    {
        return view('tasks.index', [
            'tasks' => Task::all()
        ]);
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

    public function destroy(Request $request, int $taskId)
    {
        $task = Task::find($taskId);
        $user = Auth::user();
        if($user->can('delete', $task)) {
            $task->delete();
        }
        return redirect('/tasks');
    }
}
