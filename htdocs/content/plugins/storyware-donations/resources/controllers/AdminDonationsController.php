<?php

namespace Us\Storyware\Donations\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\View;
use Themosis\Facades\DB;
use Us\Storyware\Donations\Models\Member;

class AdminDonationsController extends BaseController {
  /**
   * @var Member
   */
  protected $member;
  protected $default = [
    'item_per_page' => 10,
    'order' => 'asc',
    'orderBy' => 'id',
    's' => null
  ];

  /**
   * AdminDonationsController Constructor
   *
   * @param Member $member
   */
  public function __construct(Member $member)
  {
    $this->member = $member;
  }

  /**
   * List All Donation
   *
   * @param array $params
   * @return View
   */
  public function index($params = [])
  {
    // Get query
    $query = $this->getQuery();
    
    // Get Uri
    $url = $this->getUrl();
    $sortUrl = $this->getUrl(true);
    
    // Set default value
    $itemPerPage = $this->getParam($params, 'item_per_page', $this->default['item_per_page']);
    $order = $this->getParam($query, 'order', $this->default['order']);
    $orderBy = $this->getParam($query, 'orderBy', $this->default['orderBy']);
    $search = $this->getParam($params, 's', $this->default['s']);

    // Sort members
    $members = $this->member->orderBy($orderBy, $order);

    // Filter members
    if (isset($search) && $search !== '') {
      $members = $members->where('members.first_name', 'LIKE', "%$search%")
                        ->orWhere('members.last_name', 'LIKE', "%$search%");
    }
    // Get members with pagination
    $members = $members->paginate($itemPerPage);
    
    // Return View
    return View::make(
      'us.storyware-donations.donations.index',
      compact('members', 'order', 'orderBy', 'url', 'sortUrl', 'search')
    );
  }

  /**
   * List All Monthly Membership
   *
   * @param array $params
   * @return View
   */
  public function monthlyMembership($params = [])
  {
    //@todo display monthly membership
    return View::make('sample');
  }

  /**
   * List All Constituent Matching
   *
   * @param array $params
   * @return View
   */
  public function constituentMatching($params = [])
  {
    //@todo display constituent matching
    return View::make('sample');
  }

  /**
   * Generate URL for form
   *
   * @param boolean $inverted
   * @return string
   */
  private function getUrl($inverted=false)
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
  private function getQuery()
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
  private function getParam(array $params, $key, $default = null)
  {
    if(array_key_exists($key, $params)) {
      return $params[$key];
    }
    return $default;
  }
}