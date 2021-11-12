<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Exception;
use Illuminate\Http\Request;

class BrandsController extends Controller {
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index( Request $request ) {
        is_permitted( 'Brands' );

        $limit = $request->limit ?? 10;
        $sql   = Brands::select();
        if ( isset( $request->search ) ) {
            $data = $sql->where( 'name', "LIKE", "%$request->search%" )
                ->paginate( $limit );
        } else {
            $data = Brands::paginate( $limit );
        }

        if ( $request->ajax() ) {
            return view( 'backend/brands/brands-table', compact( 'data' ) );
        } else {
            return view( 'backend/brands/manage', compact( 'data' ) );
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        return view( 'backend/brands/create' );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request ) {

        $request->validate( [
            'name'   => 'required|max:35',
            'slug'   => 'required|max:35',
            'status' => 'required',
        ] );

        $file     = $request->file( 'icon' );
        $fileName = date( 'YmdHi.' ) . $file->getClientOriginalExtension();

        try {
            $brand = Brands::create( [
                'name'   => $request->name,
                'slug'   => slugify( $request->slug ),
                'icon'   => $fileName,
                'status' => $request->status,
            ] );
            if ( $brand ) {
                $file->storeAs( 'uploads/brands/icons', $fileName );
            }
            $message = __( 'my-alert.brand.create.success' );
        } catch ( Exception $e ) {
            $status  = false;
            $message = 'Database error: ' . __( 'my-alert.brand.create.error' );
        }
        return response()->json( [
            'status'  => $status ?? true,
            'message' => $message,
        ] );

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit( $id ) {
        is_permitted( 'User manage' );
        $brand = Brands::find( $id );
        return view( 'backend/brands/edit', compact( 'brand' ) );
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request, $id ) {
        $brand = Brands::find( $id );
        $request->validate( [
            'name'   => 'required|min:4',
            'slug'   => 'required',
            'status' => 'required',
        ] );

        try {

            $brand->name   = $request->name;
            $brand->slug   = $request->slug;
            $brand->status = $request->status;

            if ( $request->file( 'icon' ) ) {

                if ( file_exists( storage_path( 'uploads/brands/icons/' . $brand->icon ) ) ) {
                    if ( $brand->icon !== 'logo.png' ) {
                        unlink( storage_path( 'uploads/brands/icons/' . $brand->icon ) );
                    }
                }
                $file        = $request->file( 'icon' );
                $fileName    = date( 'YmdHi.' ) . $file->getClientOriginalExtension();
                $brand->icon = $fileName;

                if ( $brand ) {
                    $file->storeAs( 'uploads/brands/icons', $fileName );
                }
            }
            $brand->update();
            $message = __( 'my-alert.brand.update.success' );
        } catch ( Exception $e ) {
            $status  = false;
            $message = __( 'my-alert.brand.update.error' );
        }
        return response()->json( [
            'status'  => $status ?? true,
            'message' => $message,
        ] );

    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy( $id ) {
        $data = Brands::find( $id );
        if ( $data ) {
            $data->delete();

            if ( file_exists( storage_path( 'uploads/brands/icons/' . $data->icon ) ) ) {
                if ( $data->icon !== 'logo.png' ) {
                    unlink( storage_path( 'uploads/brands/icons/' . $data->icon ) );
                }
            }

            $message = __( 'my-alert.brand.delete.success' );
        } else {
            $status  = false;
            $message = __( 'my-alert.brand.delete.error' );
        }
        return response()->json( [
            'status'  => $status ?? true,
            'message' => $message,
        ] );

    }

    public function bulk_action( Request $request ) {

        $request->validate( [
            "action" => "required",
            "ids"    => "required|array|min:1",
            "ids.*"  => "required|string|distinct|min:1",
        ] );

        switch ( $request->action ) {
        case 'delete':
            # code...
            $i = 0;
            foreach ( $request->ids as $id ) {
                $brand = Brands::find( $id );

                if ( $brand ) {
                    $brand->delete();
                    $i++;
                }
                if ( file_exists( storage_path( 'uploads/brands/icons/' . $brand->icon ) ) ) {
                    if ( $brand->icon !== 'logo.png' ) {
                        unlink( storage_path( 'uploads/brands/icons/' . $brand->icon ) );
                    }
                }
            }
            $message = $i . ' Data deleted successfully.';
            break;
        case 'active':
            # code...
            $i = 0;
            foreach ( $request->ids as $id ) {
                $brand = Brands::find( $id );

                if ( $brand ) {
                    $brand->status = 'active';
                    $brand->save();
                    $i++;
                }
            }
            $message = $i . ' Data activated successfully.';
            break;

        case 'inactive':
            # code...
            $i = 0;
            foreach ( $request->ids as $id ) {
                $brand = Brands::find( $id );

                if ( $brand ) {
                    $brand->status = 'inactive';
                    $brand->save();
                    $i++;
                }
            }
            $message = $i . ' Data deactivated successfully.';
            break;
        }
        return response()->json( [
            'status'  => $status ?? true,
            'message' => $message,
        ] );
    }

    public function status_toggle( Request $request ) {
        $brand = Brands::find( $request->id );
        if ( $brand ) {
            $brand->status = $request->status;
            $brand->save();
        }
        $message_part = $request->status === 'active' ? 'activated.' : 'deactivated.';
        return response()->json( [
            'message' => ' Brand successfully ' . $message_part] );

    }
}
