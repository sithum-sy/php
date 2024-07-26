<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Publication;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class publicationController extends Controller
{
    public function registerPublication()
    {
        $categories = Category::all();
        return view('publication/publication-register', compact('categories')); //Passing Data: Using compact, the data is passed to the view.
    }

    public function store(Request $request)
    {

        $requestData = $request->all();
        // dump($requestData);

        $validator = Validator::make($requestData, [
            'pub_name' => ['required', 'string', 'max:100'],
            'category_id' => 'required|exists:categories,id',
            'isbn' => ['required', 'string', 'max:100'],
            'published_date' => ['required', 'date'],
            'cover_picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasfile('cover_picture')) {
            $file = $request->file('cover_picture');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/covers/', $fileName);
        }

        $publication = Publication::create([
            'pub_name' => $request->pub_name,
            'author_id' => Auth::id(),
            'category_id' => $request->category_id,
            'isbn' => $request->isbn,
            'published_date' => $request->published_date,
            'cover_picture' => $fileName
        ]);

        return redirect()->route('publication.all', ['authorId' => Auth::id()])->with(
            'success',
            'Record created successfully'
        );
    }

    public function index($authorId)
    {
        $publications = Publication::where('author_id', $authorId)->with('author')->get();
        return view('publication.index', ['publications' => $publications]);
    }

    public function edit(int $id)
    {
        $publication = Publication::findOrFail($id);
        $categories = Category::all();
        return view('publication.edit', ['publication' => $publication], compact('categories'));
    }

    public function update(int $id, Request $request)
    {


        $validatedData = $request->validate([
            'pub_name' => ['required', 'string', 'max:100'],
            'category_id' => 'required|exists:categories,id',
            'isbn' => ['required', 'string', 'max:100'],
            'published_date' => ['required', 'date'],
            'cover_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $publication = Publication::findOrFail($id);

        if ($request->hasfile('cover_picture')) {
            $file = $request->file('cover_picture');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('uploads/covers'), $fileName);

            // Delete old image if exists
            if ($publication->cover_picture && file_exists(public_path('uploads/covers/' . $publication->cover_picture))) {
                unlink(public_path('uploads/covers/' . $publication->cover_picture));
            }

            $publication->cover_picture = $fileName;
        }



        $publication->pub_name = $validatedData['pub_name'];
        $publication->category_id = $validatedData['category_id'];
        $publication->isbn = $validatedData['isbn'];
        $publication->published_date = $validatedData['published_date'];
        // $publication->cover_picture = $validatedData['cover_picture'];
        // $publication->gender = $validatedData['gender'];

        //fix image upload

        $publication->save();

        return redirect()->route('publication.all', ['authorId' => Auth::id()])->with(
            'status',
            'Publication was updated successfully.'
        );
    }

    public function delete(int $id)
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();

        return redirect()->route('publication.all', ['authorId' => Auth::id()])->with(
            'status',
            'Author was deleted successfully.'
        );
    }

    public function view(int $id)
    {
        $publication = Publication::findOrFail($id);
        return view('publication.view', ['publication' => $publication]);
    }
}
