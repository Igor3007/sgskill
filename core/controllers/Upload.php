<?php 


$post = file_get_contents('php://input');
$post = json_decode($post, true);

function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    // clean up the file resource
    fclose( $ifp ); 

    return $output_file; 
}

base64_to_jpeg($post['file'], $_SERVER['DOCUMENT_ROOT'].'/img/fileeeeee.jpg');


exit(json_encode([
    'status' => true,
    'msg' => 'Загружено'
]));


?>