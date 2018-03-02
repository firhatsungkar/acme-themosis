<?php

namespace Us\Storyware\Donations\Controllers;

use Us\Storyware\Donations\Models\MembershipConstituent;
use Us\Storyware\Donations\Controllers\AdminController;
use Themosis\Facades\View;


class AdminConstituentMatchingController extends AdminController {
  /**
   * @var MembershipConstituent
   */
  protected $membershipConstituent;

  /** Default params
   * @var array
   */
  protected $default = [
    'item_per_page' => 10,
    'order' => 'asc',
    'orderBy' => 'id',
    's' => '',
  ];
  /**
   * AdminConstituentMatchingController Constructor
   *
   * @param MembershipConstituent $membershipConstituent
   */
  public function __construct(MembershipConstituent $membershipConstituent)
  {
    $this->membershipConstituent = $membershipConstituent;
  }
  
  /**
   * List All Constituent Member
   *
   * @param array $params
   * @return View
   */
  public function index($params = [])
  {
    // Get params from parent
    $params = $this->params;
    // Get query
    $query = $this->getQuery();
    
    // Get Uri
    $url = $this->getUrl();
    $sortUrl = $this->getUrl(true);
    
    // Set default value
    $itemPerPage = $this->getParam($params, 'item_per_page', $this->default['item_per_page']);
    $order = $this->getParam($query, 'order', $this->default['order']);
    $orderBy = $this->getParam($query, 'orderBy', $this->default['orderBy']);
    $search = $this->getParam($query, 's', $this->default['s']);
    
    // Sort members
    $members = $this->membershipConstituent->orderBy($orderBy, $order);

    // Get members with pagination
    $members = $members->paginate($itemPerPage);

    return View::make(
      'us.storyware-donations.constituent-membership.index',
      compact('members', 'order', 'orderBy', 'url', 'sortUrl', 'search')
    );
  }
  
}