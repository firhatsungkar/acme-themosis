<?php

namespace Us\Storyware\Donations\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\View;
use Us\Storyware\Donations\Models\MembershipMonth;


class AdminMonthlyMembershipController extends AdminController {
  /**
   * @var MembershipMonth
   */
  protected $membershipMonth;

  /** Default params
   * @var array
   */
  protected $default = [
    'item_per_page' => 10,
    'order' => 'asc',
    'orderBy' => 'id',
  ];

  /**
   * AdminMonthlyMembershipController Constructor
   *
   * @param MembershipMonth $membershipMonth
   */
  public function __construct(MembershipMonth $membershipMonth)
  {
    $this->membershipMonth = $membershipMonth;
  }

  /**
   * List All Monthly Member
   *
   * @param array $params
   * @return View
   */
  public function index()
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
    
    // Sort members
    $members = $this->membershipMonth->with('gifts')->orderBy($orderBy, $order);

    // Get members with pagination
    $members = $members->paginate($itemPerPage);

    return View::make(
      'us.storyware-donations.monthly-membership.index',
      compact('members', 'order', 'orderBy', 'url', 'sortUrl')
    );
  }
  
}