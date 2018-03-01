<?php

namespace Us\Storyware\Donations\Controllers;

use Themosis\Route\BaseController;

class AdminController extends BaseController {
  
  /** Locale Format
   * @var string
   */
  protected $locale = 'en_US';

  /**
   * @var array
   */
  protected $params = [];

  public function __construct($params)
  {
    // Set Local Format
    setlocale(LC_MONETARY, $this->locale);
    // Set params
    $this->params = $params;
  }

  /**
   * Generate URL for form
   *
   * @param boolean $inverted
   * @return string
   */
  protected function getUrl($inverted=false)
  {
    $requestUri = explode('/', $_SERVER['REQUEST_URI']);
    $target = $requestUri[count($requestUri) - 1];
    // Inverted order and remove orderBy
    if ($inverted) {
      $params = $this->getQuery();
      $params['order'] = array_key_exists('order', $params) ? $params['order'] : $this->default['order'];
      $params['orderBy'] = array_key_exists('orderBy', $params) ? $params['orderBy'] : $this->default['orderBy'];
      $invertedParams = array_map(function ($param) use ($params) {
        if(array_search($param, $params) === 'order') {
          return $param === 'asc' ? 'desc' : 'asc';
        }
        return $param;
      }, $params);
      // $invertedParams = array_filter($invertedParams, function ($param) use ($params) {
      //   return array_search($param, $params) !== 'orderBy';
      // });
      $uri = '';
      foreach($invertedParams as $key => $value) {
        $uri .= isset($value) ? "$key=$value&" : "$key&";
      }
      $uri = substr($uri, 0, -1);
      $target = explode('?', $target)[0];
      return implode('?', [$target, $uri]);
    }
    return $target;
  }

  /**
   * Get Query from Request Query String
   *
   * @return array
   */
  protected function getQuery()
  {
    $query = explode("&", $_SERVER['QUERY_STRING']);
    $params = [];
    foreach ($query as $param) {
      $param = explode("=", $param);
      $key = $param[0];
      $value = isset($param[1]) ? $param[1] : null;
      $params[$key] = $value;
    }
    return $params;
  }

  /**
   * Get Param from Paramater
   *
   * @param array $params
   * @param string $key
   * @param string $default
   * @return any
   */
  protected function getParam(array $params, $key, $default = null)
  {
    if(array_key_exists($key, $params)) {
      return $params[$key];
    }
    return $default;
  }

  /**
   * Check page with the slug
   *
   * @param string $pageSlug
   * @return boolean
   */
  protected function isPage(string $pageSlug)
  {
    $query = $this->getQuery();
    if ($query['page'] !== $pageSlug) {
      return false;
    }
    return true;
  }
}