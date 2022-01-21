<?php

namespace App\Support;

use Illuminate\Http\Request;

class Share
{
    public $name;
    public $email;
    public $link;

    /**
     * Enquiry constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        foreach ($request->input() as $key => $value) {

            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }

        }
    }
}
