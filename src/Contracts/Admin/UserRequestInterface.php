<?php

namespace Oxygencms\Users\Contracts\Admin;

interface UserRequestInterface
{
    /**
     * Authorize the request.
     *
     * @return mixed
     */
    public function authorize();

    /**
     * Define the validation rules.
     *
     * @return mixed
     */
    public function rules();
}