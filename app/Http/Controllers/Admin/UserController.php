<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index( Request $request ) {

        is_permitted( 'Users' );

        $limit = $request->limit ?? 10;
        $sql   = User::select();
        if ( isset( $request->search ) ) {
            $data = $sql->where( 'name', "LIKE", "%$request->search%" )
                ->where( 'email', "LIKE", "%$request->search%" )
                ->paginate( $limit );
        } else {
            $data = User::paginate( $limit );
        }

        if ( $request->ajax() ) {
            return view( 'backend/user/users-table', compact( 'data' ) );
        } else {
            return view( 'backend/user/manage', compact( 'data' ) );
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        is_permitted( 'User add' );
        return view( 'backend/user/create' );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store( Request $request ) {


        $request->validate( [
            'name'     => 'required|min:4',
            'email'    => 'required|email|unique:users',
            'password' => 'required|max:8|min:6',
            'mobile'   => 'required',
            'status'   => 'required',
        ] );

        $file     = $request->file( 'photo' );
        $fileName = date( 'YmdHi.' ) . $file->getClientOriginalExtension();

        try {
            $user = User::create( [
                'name'       => $request->name,
                'email'      => $request->email,
                'password'   => Hash::make( $request->password ),
                'mobile'     => $request->mobile,
                'photo'      => $fileName,
                'status'     => $request->status,
                'permission' => json_encode( $request->permission ),
            ] );
            if ( $user ) {
                $file->storeAs( 'uploads/users', $fileName );
            };
            $message = __( 'my-alert.category.create.success' );
        } catch ( Exception $e ) {
            $status  = false;
            $message = __( 'my-alert.category.create.error' );
        }
        return response()->json( [
            'status'  => $status ?? true,
            'message' => $message,
        ] );

    }


    /**
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit( $id ) {
        is_permitted( 'User edit' );
        $user = User::findOrFail( $id );
        return view( 'backend/user/edit', compact( 'user' ) );
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Request $request, $id ) {
        $user = User::find( $id );

        $request->validate( [
            'name'   => 'required|min:4',
            'mobile' => 'required',
            'status' => 'required',
        ] );

        try {

            $user->name   = $request->name;
            $user->email  = $request->email;
            $user->mobile = $request->mobile;
            $user->status = $request->status;
            $user->permission =  $request->permission;

            if ( $request->file( 'photo' ) ) {

                if ( file_exists( storage_path( 'uploads/users/' . $user->photo ) ) ) {
                    if ( $user->photo !== 'logo.png' ) {
                        unlink( storage_path( 'uploads/users/' . $user->photo ) );
                    }
                }

                $file        = $request->file( 'photo' );
                $fileName    = date( 'YmdHi.' ) . $file->getClientOriginalExtension();
                $user->photo = $fileName;
                if ( $user ) {
                    $file->storeAs( 'uploads/users', $fileName );

                }
            }
            $user->update();
            $message = __( 'my-alert.category.update.success' );
        } catch ( Exception $e ) {
            $status  = false;
            $message = __( 'my-alert.category.update.error' );
        }
        return response()->json( [
            'status'  => $status ?? true,
            'message' => $message,
        ] );

    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( $id ) {
        is_permitted( 'User delete' );
        $user = User::find( $id );
        if ( $user ) {
            $user->delete();

            if ( file_exists( storage_path( 'uploads/users/' . $user->photo ) ) ) {
                if ( $user->photo !== 'logo.png' ) {
                    unlink( storage_path( 'uploads/users/' . $user->photo ) );
                }
            }

            $message = 'User deleted successfully.';
        } else {
            $status  = false;
            $message = 'User not deleted.';
        }
        return response()->json( [
            'status'  => $status ?? true,
            'message' => $message,
        ] );

    }
// Bulk-action function =========================>
    public function bulk_action( Request $request ) {

        is_permitted( 'User bulk_action' );

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
                $users = User::find( $id );

                if ( $users ) {
                    $users->delete();
                    $i++;
                }
                if ( file_exists( storage_path( 'uploads/users/' . $users->photo ) ) ) {
                    if ( $users->photo !== 'logo.png' ) {
                        unlink( storage_path( 'uploads/users/' . $users->photo ) );
                    }
                }
            }
            $message = $i . ' Data deleted successfully.';
            break;
        case 'active':
            # code...
            $i = 0;
            foreach ( $request->ids as $id ) {
                $users = User::find( $id );

                if ( $users ) {
                    $users->status = 'active';
                    $users->save();
                    $i++;
                }
            }
            $message = $i . ' Data activated successfully.';
            break;

        case 'inactive':
            # code...
            $i = 0;
            foreach ( $request->ids as $id ) {
                $users = User::find( $id );

                if ( $users ) {
                    $users->status = 'inactive';
                    $users->save();
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

    // Status toggle function =========================>

    public function status_toggle( Request $request ) {
        $users = User::find( $request->id );
        if ( $users ) {
            $users->status = $request->status;
            $users->save();
        }
        $message_part = $request->status === 'active' ? 'activated.' : 'deactivated.';
        return response()->json( [
            'message' => ' User successfully ' . $message_part] );

    }
}
