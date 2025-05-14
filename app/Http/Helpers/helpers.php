<?php

function uploadImage($image, $location, $oldImage = null
) {

    $imageName = time() . '.' . $image->extension();
    $image->move(public_path($location), $imageName);

    if ($oldImage) {
        $oldImagePath = public_path($location . $oldImage);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }
    return $imageName;

}

function generatSlug($slugString) {
    return str()->slug($slugString);
}