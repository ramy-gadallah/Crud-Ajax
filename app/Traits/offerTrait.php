<?php

namespace App\Traits;

use PhpParser\Builder\Trait_;

trait offerTrait
{

    protected function saveImage($photo, $folder): mixed
    {
        // handle vars 
        $file = $photo;
        $path = $file->store($folder, 'public');

        return $path;
    }
}
