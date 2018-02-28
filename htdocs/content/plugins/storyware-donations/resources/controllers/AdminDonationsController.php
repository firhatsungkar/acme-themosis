<?php

namespace Us\Storyware\Donations\Controllers;

use Themosis\Facades\View;
use Themosis\Facades\DB;
use Us\Storyware\Donations\Controllers\AdminController;
use Us\Storyware\Donations\Models\Member;

class AdminDonationsController extends AdminController {
  /**
   * @var Member
   */
  protected $member;
  
  /** Default params
   * @var array
   */
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
}