<?php

namespace Drupal\farm_map\Element;

use Drupal\Core\Render\Element\RenderElement;
use Drupal\farm_map\Traits\PreRenderableMapTrait;

/**
 * Provides a farm_map render element.
 *
 * @RenderElement("farm_map")
 */
class FarmMap extends RenderElement {

  use PreRenderableMapTrait;

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $class = get_class($this);
    return [
      '#pre_render' => [
        [$class, 'preRenderMap'],
      ],
      '#theme' => 'farm_map',
      '#map_type' => 'default',
    ];
  }

  /**
   * Pre-render callback for the map render array.
   *
   * @param array $element
   *   A renderable array containing a #map_type property, which will be
   *   appended to 'farm-map-' as the map element ID.
   *
   * @return array
   *   A renderable array representing the map.
   */
  public static function preRenderMap(array $element) {

    // Add the farm-map class.
    $element['#attributes']['class'][] = 'farm-map';

    // Return the element.
    return FarmMap::preRenderMapCommon($element);
  }

}
