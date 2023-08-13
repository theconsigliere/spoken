<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class TemplateAbout extends Composer
{
	public function with()
	{
		return [
			'heading' => $this->heading(),
		];
	}

	public function heading()
	{
		return get_field('heading') ?? 'About';
	}
}