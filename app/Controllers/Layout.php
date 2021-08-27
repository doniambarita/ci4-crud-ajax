<?php

namespace App\Controllers;

class Layout extends BaseController
{
	public function index()
	{
        $data = [
            'title' => 'Doni Ambarita'
        ];

		return view('layout/beranda', $data);
	}
}
