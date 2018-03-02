@extends('us.storyware-donations.layouts.main')
@section('main')
  <h1 class="wp-heading-inline">{{$__page->get('title')}}</h1>
  <hr class="wp-header-end">
  <h2 class="screen-reader-text">List All Constituent Matching</h2>
  <ul class="subsubsub">
      <li class="all"><a href="#" class="current" aria-current="page">All <span class="count">({{count($members)}})</span></a></li>
  </ul>
  <form id="constituent-member-list" method="get">
    <input type="hidden" id="donation-plugin-name" name="page" value="storyware-constituent-matching"/>
    <div class="tablenav top">
      <div class="alignleft actions">
        <label for="constituent-search-input" style="font-weight:bold;margin-right:0.7rem">Monthly Website Memberships</label>
        <input type="hidden" id="donation-plugin-name" name="page" value="storyware-donations"/>
        <p class="search-box">
        <input type="search" id="constituent-search-input" name="s" value="{{$search}}">
          <input type="submit" id="search-submit" class="button" value="Search Donations">
        </p>
      </div>
      <div class="alignright actions">
        <input type="submit" class="button" style="background:#00a0d2;color:white" value="Link Members">
      </div>
    </div>
   
    @if(isset($members) && count($members) > 0)
    <table class="wp-list-table widefat fixed striped posts">
      <thead>
        <tr>
          <th scope="col" id="last_name" class="manage-column column-author">Last Name</th>
          <th scope="col" id="first_name" class="manage-column column-author">First Name</th>
          <th scope="col" id="address" class="manage-column column-author">Address</th>
          <th scope="col" id="constituent_id" class="manage-column column-author">Cons. ID</th>
          <th scope="col" id="gift_link" class="manage-column column-author">Gift Link</th>
          <th scope="col" id="fund_id" class="manage-column column-author">Fund ID</th>
        </tr>
      </thead>
      <tbody id="the-list" _vimium-has-onclick-listener>
        @foreach($members as $member)
        <tr>
          <th scope="col" class="manage-column">{{$member->last_name}}</th>
          <th scope="col" class="manage-column">{{$member->first_name}}</th>
          <th scope="col" class="manage-column">{{$member->address}}</th>
          <th scope="col" class="manage-column">
            <input type="text" style="margin:0 4px 0 0;height:28px;padding:3px 5px;" value="{{$member->constituent_id}}">
          </th>
          <th scope="col" class="manage-column">
            <input type="text" style="margin:0 4px 0 0;height:28px;padding:3px 5px;" value="{{$member->recurring_gift_import_id}}">
          </th>
          <th scope="col" class="manage-column">
            <input type="text" style="margin:0 4px 0 0;height:28px;padding:3px 5px;" value="">
          </th>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th scope="col" id="last_name" class="manage-column column-author">Last Name</th>
          <th scope="col" id="first_name" class="manage-column column-author">First Name</th>
          <th scope="col" id="address" class="manage-column column-author">Address</th>
          <th scope="col" id="constituent_id" class="manage-column column-author">Cons. ID</th>
          <th scope="col" id="gift_link" class="manage-column column-author">Gift Link</th>
          <th scope="col" id="fund_id" class="manage-column column-author">Fund ID</th>
        </tr>
      </tfoot>
    </table>
    @else
    <p style="color:#666;font-size:18px;margin:0;padding:100px 0 0;text-align:center;">No constituent member found.</p>
    @endif
  <input type="hidden" name="orderBy" value="{{$orderBy}}"/>
  <input type="hidden" name="order" value="{{$order}}"/>
  </form>
@endsection