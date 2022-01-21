<?php

namespace App\Transformers;

use TPG\ImageRenderer\Transformers\Contracts\Transformer;

class MyTransformer implements Transformer
{
    public function handle($image, array $values)
    {
        $image->crop($values[0], $values[1]);
        
        return $image;
    }
}
