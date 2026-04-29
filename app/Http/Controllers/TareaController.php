<?php
namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TareaController extends Controller
{
    public function index() {
        return Inertia::render('Tareas', ['tareas' => Tarea::all()]);
    }
    public function store(Request $request) {
        $request->validate(['titulo' => 'required|string|max:255']);
        Tarea::create($request->only('titulo'));
        return redirect()->back();
    }
    public function toggle(Tarea $tarea) {
        $tarea->update(['completada' => !$tarea->completada]);
        return redirect()->back();
    }
    public function destroy(Tarea $tarea) {
        $tarea->delete();
        return redirect()->back();
    }
}