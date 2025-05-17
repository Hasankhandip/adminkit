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

function menuActive($routeName, $param = null, $className = 'active') {
    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $className;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        if ($param) {
            $routeParam = array_values(@request()->route()->parameters ?? []);
            if (strtolower(@$routeParam[0]) == strtolower($param)) {
                return $className;
            } else {
                return;
            }

        }
        return $className;
    }
}
function generatSlug($slugString) {
    return str()->slug($slugString);
}