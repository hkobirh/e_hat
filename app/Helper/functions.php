<?php

function slugify( $text, string $divider = '-' ) {
    // replace non letter or digits by divider
    $text = preg_replace( '~[^\pL\d]+~u', $divider, $text );

    // transliterate
    $text = iconv( 'utf-8', 'us-ascii//TRANSLIT', $text );

    // remove unwanted characters
    $text = preg_replace( '~[^-\w]+~', '', $text );

    // trim
    $text = trim( $text, $divider );

    // remove duplicate divider
    $text = preg_replace( '~-+~', $divider, $text );

    // lowercase
    $text = strtolower( $text );

    if ( empty( $text ) ) {
        return 'n-a';
    }

    return $text;
}

// function activeMenu( $uri = '' ) {
//     $active = '';
//     if ( Request::is( Request::segment( 1 ) . '/' . $uri . '/*' ) || Request::is( Request::segment( 1 ) . '/' . $uri ) || Request::is( $uri ) ) {
//         $active = 'active';
//     }
//     return $active;
// }

function set_message( $type, $icon, $message ) {
    session()->flash( 'type', $type );
    session()->flash( 'icon', $icon );
    session()->flash( 'message', $message );
}

function status_color( $status ) {
    $data = [
        'active'   => 'success',
        'inactive' => 'danger',
    ];
    return $data[$status];
}
function random_status() {
    $data = [
        'active'   => 'active',
        'inactive' => 'inactive',
    ];
    return array_rand( $data, 1 );
}
function order_status($key = null){
    $data = [
        'pending' => 'warning',
        'shipped' => 'success',
        'return' => 'danger',
        'success' => 'primary',
    ];
    return $data[$key];
}

function randomRuleId() {
    $data = [
        2 => 2,
        3 => 3,
    ];
    return array_rand( $data, 1 );
}

// Start permission rule system =============================>

function permission( $key = null ) {
    $data = [
        1 => 'Dashboard',
        2 => 'Users',
        3 => 'User add',
        4 => 'User edit',
        5 => 'User delete',
        6 => 'User bulk_action',
    ];
    if ( $key === null ) {
        return $data;
    } else {
        if ( array_key_exists( $key, $data ) ) {
            return $data[$key];
        } else {
            return $key;
        }
    }
}

function is_permitted( $permission_name, $is_menu = false ) {

    $permission_id    = get_permission_id( $permission_name );
    $permission_array = json_decode( auth()->user()->permission );

    if ( in_array( $permission_id, $permission_array ) || in_array( '*', $permission_array ) ) {
        return true;
    } else {
        if ( $is_menu ) {
            return false;
        } else {
            header( 'Location:' . route( 'staff.no.access' ) );
            exit();
        }
    }
}

function get_permission_id( $permission_name ) {
    foreach ( permission() as $key => $value ) {
        if ( strtolower( trim( $value ) ) === strtolower( trim( $permission_name ) ) ) {
            return $key;
        }
    }
    return null;
}
// End permission rule system =============================>

// Category function for select ==============>
function category_option( $data, $stage = 2, $selected = null, $product = false ) {
    if ( $product ) {
        $html = '<option value="">Select Category</option>';
    } else {
        $html = '<option value="0">__Root__</option>';
    }

    foreach ( $data as $row ) {
        if ( $selected === $row->id ) {
            $html .= '<option value="' . $row->id . '." selected="">' . $row->name . '</option>';
        } else {
            $html .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        if ( $stage >= 2 ) {
            foreach ( $row->sub_cats as $row1 ) {
                if ( $selected === $row1->id ) {
                    $html .= '<option value="' . $row1->id . '" selected="">' . $row->name . '>' . $row1->name . '</option>';
                } else {
                    $html .= '<option value="' . $row1->id . '">' . $row->name . '>' . $row1->name . '</option>';
                }
            }
            if ( $stage >= 3 ) {
                foreach ( $row1->sub_cats as $row2 ) {
                    $html .= '<option value="' . $row2->id . '">' . $row->name . '>' . $row1->name . '>' . $row2->name . '</option>';
                }
            }
        }
    }

    return $html;
}

function randomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
