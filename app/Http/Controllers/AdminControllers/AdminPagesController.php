<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

class AdminPagesController extends Controller
{
    private $rules = [
        'label' => 'nullable|max:100',
        'slug' => 'required|max:100',
        'title' => 'nullable',
        'description' => 'nullable',
        'content' => 'nullable'
    ];
    
    public function index()
    {   
        $search_word = request()->input('q');
        if($search_word != null) {
            return view('admin_dashboard.pages.index', [
                'pages' => Page::where('label', 'like', "%$search_word%")
                    ->orWhere('title', 'like', "%$search_word%")
                    ->orderBy('id', 'DESC')->get()
            ]);
        }
        return view('admin_dashboard.pages.index', [
            'pages' => Page::orderBy('id', 'DESC')->get()
        ]);
    }
    
    public function create()
    {
        return view('admin_dashboard.pages.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['active'] = $request->input('active') !== null;
        
        Page::create($validated);
        return redirect()->route('admin.pages.create')->with('success', 'Page has been created.');
    }
    
    public function edit(Page $page)
    {
        return view('admin_dashboard.pages.edit', [
            'page' => $page
        ]);
    }
    
    public function update(Request $request, Page $page)
    {
        $validated = $request->validate($this->rules);
        $validated['active'] = $request->input('active') !== null;
        
        $page->update($validated);
        return redirect()->back()->with('success', 'Page has been updated.');
    }
    
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Page has been deleted.');
    }
}