<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {

        is_permitted('Categories');

        $limit = $request->limit ?? 10;
        $sql = Category::select();
        if (isset($request->search)) {
            $data = $sql->where('name', "LIKE", "%$request->search%")
                ->paginate($limit);
        } else {
            $data = Category::where('root', 0)->paginate($limit);
        }

        if ($request->ajax()) {
            return view('backend/categories/categories-table', compact('data'));
        } else {

            return view('backend.categories.manage', compact('data'));
        }

    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data = Category::select('id', 'root', 'name')->where('root', 0)->get();
        return view('backend.categories.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'root'   => 'required',
            'name'   => 'required',
            'status' => 'required',
        ]);

        try {
            $category = Category::create([
                'user_id' => Auth::id(),
                'root'    => $request->root,
                'name'    => $request->name,
                'slug'    => slugify($request->name),
                'status'  => $request->status,
            ]);

            if ($request->file('icon')) {
                $file = $request->file('icon');
                $fileName = date('YmdHi.') . $file->getClientOriginalExtension();
                $category->icon = $fileName;
                $category->save();
                $file->storeAs('uploads/categories/icons', $fileName);
            }
            if ($request->file('banner')) {
                $file = $request->file('banner');
                $fileName = date('YmdHi.') . $file->getClientOriginalExtension();
                $category->banner = $fileName;
                $category->save();
                $file->storeAs('uploads/categories/banner', $fileName);
            }

            $message = __('my-alert.category.create.success');
        } catch (Exception $e) {
            $status = false;
            $message = 'Database error: ' . __('my-alert.category.create.error');
        }
        $data = Category::select('id', 'root', 'name')->where('root', 0)->get();
        return response()->json([
            'status'  => $status ?? true,
            'message' => $message,
            'data'    => category_option($data),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        $data = Category::select('id', 'root', 'name')->where('root', 0)->get();
        return view('backend.categories.edit', compact('data', 'category'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $request->validate([
            'root'   => 'required',
            'name'   => 'required',
            'status' => 'required',
        ]);

        try {

            $category->root = $request->root;
            $category->name = $request->name;
            $category->status = $request->status;

            if ($request->file('icon')) {

                if (file_exists(storage_path('uploads/categories/icons/' . $category->icon))) {
                    if ($category->icon !== 'logo.png') {
                        unlink(storage_path('uploads/categories/icons/' . $category->icon));
                    }
                }
                $file = $request->file('icon');
                $fileName = date('YmdHi.') . $file->getClientOriginalExtension();
                $category->icon = $fileName;

                if ($category) {
                    $file->storeAs('uploads/categories/icons', $fileName);
                }
            }
            // if ( $request->file( 'banner' ) ) {

            //     if ( file_exists( public_path( 'backend/uploads/icons/' . $category->banner ) ) ) {
            //         if ( $category->banner !== 'logo.png' ) {
            //             unlink( public_path( 'backend/uploads/icons/' . $category->banner ) );
            //         }
            //     }
            //     $file           = $request->file( 'banner' );
            //     $banner       = date( 'YmdHi.' ) . $file->getClientOriginalExtension();
            //     $category->banner = $banner;

            //     if ( $category ) {
            //         $file->move( public_path( 'backend/uploads/icons' ), $banner );
            //     }
            // }
            $category->update();
            $message = __('my-alert.category.update.success');
        } catch (Exception $e) {
            $status = false;
            $message = __('my-alert.category.update.error');
        }
        return response()->json([
            'status'  => $status ?? true,
            'message' => $message,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            Category::destroy($this->get_ids($category));

            $message = __('my-alert.category.delete.success');
        } else {
            $status = false;
            $message = __('my-alert.category.delete.error');
        }
        return response()->json([
            'status'  => $status ?? true,
            'message' => $message,
        ]);

    }

    private function get_ids($category)
    {

        $ids = [$category->id];

        $sub_cats = Category::where('root', $category->id)->get();
        foreach ($sub_cats as $sub) {
            array_push($ids, $sub->id);
        }
        return $ids;
    }


    public function bulk_action(Request $request)
    {

        $request->validate([
            "action" => "required",
            "ids"    => "required|array|min:1",
            "ids.*"  => "required|string|distinct|min:1",
        ]);

        switch ($request->action) {
            case 'delete':
                # code...
                $i = 0;
                foreach ($request->ids as $id) {
                    $category = Category::find($id);

                    if ($category) {
                        $category->delete();
                        $i++;
                    }
                }
                $message = $i . ' Data deleted successfully.';
                break;
            case 'active':
                # code...
                $i = 0;
                foreach ($request->ids as $id) {
                    $category = Category::find($id);

                    if ($category) {
                        $category->status = 'active';
                        $category->save();
                        $i++;
                    }
                }
                $message = $i . ' Data activated successfully.';
                break;

            case 'inactive':
                # code...
                $i = 0;
                foreach ($request->ids as $id) {
                    $category = Category::find($id);

                    if ($category) {
                        $category->status = 'inactive';
                        $category->save();
                        $i++;
                    }
                }
                $message = $i . ' Data deactivated successfully.';
                break;
        }
        return response()->json([
            'status'  => $status ?? true,
            'message' => $message,
        ]);
    }

    public function status_toggle(Request $request)
    {
        $category = Category::find($request->id);
        if ($category) {
            $category->status = $request->status;
            $category->save();
        }
        $message_part = $request->status === 'active' ? 'activated.' : 'deactivated.';
        return response()->json([
            'message' => ' Category successfully ' . $message_part]);
    }
}
