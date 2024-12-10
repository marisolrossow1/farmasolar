<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(){
        $allBlogs = Blog::orderBy('release_date', 'desc')->get();

        return view('blogs.index', [
            'blogs' => $allBlogs
        ]);
    }

    public function list(){
        $allBlogs = Blog::all();

        return view('blogs.list', [
            'blogs' => $allBlogs
        ]);
    }

    public function view(int $id) {
        return view('blogs.view', [
            'blog' => Blog::findOrFail($id)
        ]);
    }
    public function createForm(){
        return view('blogs.create-form');
    }

    public function createProcess(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'category' => 'required|min:3',
            'description' => 'required|min:5',
            'content' => 'required|min:10',
            'release_date' => 'required',
            'cover' => 'nullable|max:2048',
            'cover_description' => 'nullable|string|max:255',
        ],[
            'title.required' => 'El título debe tener un valor.',
            'title.min' => 'El título debe tener al menos :min caracteres.',
            
            'category.required' => 'La categoría debe tener un valor.',
            'category.min' => 'La categoría debe tener al menos :min caracteres.',

            'description.required' => 'La descripción debe tener un valor.',
            'description.min' => 'La descripción debe tener al menos :min caracteres.',

            'content.required' => 'El contenido debe tener un valor.',
            'content.min' => 'El contenido debe tener al menos :min caracteres.', 

            'release_date.required' => 'La fecha de estreno debe tener un valor.',
        ]);

        $input = $request->all();

        if($request->hasFile('cover')){
            $input['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Blog::create($input);

        return redirect()
            ->route('blogs.index')
            ->with('feedback.message', 'La entrada <b> '. e($input['title']) .'</b> fue agregada con éxito.');

    }

    public function editForm(int $id)
    {
        return view('blogs.edit-form', [
            'blog' => Blog::findOrFail($id)
        ]);
    }

    public function editProcess(int $id, Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'category' => 'required|min:3',
            'description' => 'required|min:5',
            'content' => 'required|min:10',
            'release_date' => 'required',
            'cover' => 'nullable|max:2048',
            'cover_description' => 'nullable|string|max:255',
        ], [
            'title.required' => 'El título debe tener un valor.',
            'title.min' => 'El título debe tener al menos :min caracteres.',
            'category.required' => 'La categoría debe tener un valor.',
            'category.min' => 'La categoría debe tener al menos :min caracteres.',
            'description.required' => 'La descripción debe tener un valor.',
            'description.min' => 'La descripción debe tener al menos :min caracteres.',
            'content.required' => 'El contenido debe tener un valor.',
            'content.min' => 'El contenido debe tener al menos :min caracteres.',
            'release_date.required' => 'La fecha de estreno debe tener un valor.',
        ]);

        $input = $request->except(['_token', '_method']);
        $blog = Blog::findOrFail($id);

        // dd($request->file('cover'));

        if ($request->hasFile('cover')) {
            // 1. Mostrar la ruta de la imagen actual antes de eliminarla
            // dd('Imagen anterior: ', $blog->cover);

            $coverPath = $blog->cover;
            // $storagePath = storage_path('app/public/' . $coverPath);
            // $storageExists = Storage::exists($coverPath);
            
            // dd([
            //     'Ruta en Storage' => $coverPath,
            //     'Ruta física' => $storagePath,
            //     'Storage::exists()?' => $storageExists,
            //     'file_exists()?' => file_exists($storagePath),
            //     'Enlace simbólico' => is_link(public_path('storage')),
            //     'Contenido del disco public' => Storage::allFiles(),
            // ]);
        
            if ($blog->cover && Storage::exists($coverPath)) {
                Storage::delete($coverPath);
            }

            // 2. Mostrar el archivo que se está recibiendo
            // dd('Archivo recibido: ', $request->file('cover'));

            // Sube la nueva imagen
            $input['cover'] = $request->file('cover')->store('covers', 'public');
            $blog->cover = $input['cover'];
            // 3. Mostrar la nueva ruta de la imagen después de subirla
            // dd('Ruta de la nueva imagen: ', $input['cover']);
        }   elseif (!$blog->cover) {
            // Si no hay portada y no se ha subido una, lo dejamos vacío
            $input['cover'] = null;
        }

        // Aquí haces el dd del blog antes de actualizarlo
        // dd('Blog antes de la actualización: ', $blog);
        // dd('Datos a actualizar: ', $input);

        // Actualiza el blog con la nueva información
        // $blog->update($input);
        $blog->title = $input['title'];
        $blog->category = $input['category'];
        $blog->description = $input['description'];
        $blog->release_date = $input['release_date'];
        $blog->cover_description = $input['cover_description'];
        $blog->content = $input['content'];
        $blog->save();

        // Seguir viendo el proceso antes de redirigir, agrega un dd() aquí
        // dd('Blog actualizado', $blog);

        return redirect()
            ->route('blogs.index')
            ->with('feedback.message', 'La entrada <b>' . e($input['title']) . '</b> fue actualizada con éxito.');
    }



    public function deleteProcess(int $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return redirect()
            ->route('blogs.index')
            ->with('feedback.message', 'La entrada <b> '. e($blog->title) .'</b> fue Eliminada con éxito.');
    }

}
