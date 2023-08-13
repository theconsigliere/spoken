<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Image extends Component {
  public $imageData;

  public function __construct($image = null, $lazyload = false) {
    $this->image = $image;
    $this->lazyload = $lazyload;
    $this->imageData = $this->getImage();
  }

  protected function getImage() {
    return [
      'srcset' => wp_get_attachment_image_srcset($this->image['id'], 'large') ?? '',
      'src' => wp_get_attachment_image_url($this->image['id'], 'large') ?? '',  
      'width' => $this->image['width'] ?? '',
      'height' => $this->image['height'] ?? '',
      'alt' => $this->image['alt'] ?? '',
      'lazyload' => $this->lazyload,
    ];
  }

  public function render()
  {
    return $this->view('components.image');
  }
}