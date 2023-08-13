<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class TemplateHome extends Composer
{
  public function with()
  {
    return [
      'heading' => $this->heading(),
      'hero_image' => $this->hero_image(),
    ];
  }

  public function heading()
  {
    return get_field('heading');
  }

  public function hero_image()
  {
    return get_field('hero_image');
  }
}