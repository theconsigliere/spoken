<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class TemplatePrivacyPolicy extends Composer
{
  public function with()
  {
    return [
      'title' => $this->title(),
      'content' => $this->content(),
    ];
  }

  public function title()
  {
    return get_field('title');
  }

  public function content()
  {
    return get_field('content');
  }
}