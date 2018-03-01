@extends('us.storyware-donations.layouts.main')
@section('main')
  <h1 class="wp-heading-inline">{{$__page->get('title')}}</h1>
  <hr class="wp-header-end">
  <h2 class="screen-reader-text">List All Monthly Member</h2>
  <ul class="subsubsub">
      <li class="all"><a href="#" class="current" aria-current="page">All <span class="count">({{count($members)}})</span></a></li>
  </ul>
  <form id="monthly-member-list" method="get">
    <input type="hidden" id="donation-plugin-name" name="page" value="storyware-donations"/>
    <div class="tablenav top">
      <div class="alignleft actions">
        <label for="filter-by-date" class="screen-reader-text">Filter by date</label>
        <select name="date" id="filter-by-date">
          <option selected="selected" value="0">All dates</option>
          <option value="201802">February 2018</option>
        </select>
        <input type="submit" name="filter_action" id="monthly-member-query-submit" class="button" value="Filter">
      </div>
    </div>
    @if(isset($members) && count($members) > 0)
    <table class="wp-list-table widefat fixed striped posts">
      <thead>
        <tr>
          <th scope="col" id="month" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=month">
              <span>Month</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="total_received" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=received_total">
              <span>Total Received Gift Count</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="expected_gifts" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=expected_gifts">
              <span>Expected Gifts</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="received_gifts" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=received_gidts">
              <span>Received Gifts</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
        </tr>
      </thead>
      <tbody id="the-list" _vimium-has-onclick-listener>
        @foreach($members as $member)
        <tr id="monthly-member-{{$member->month}}">
          <td data-colname="month"><a href="edit.php?post_type=post&amp;monthly-member={{$member->id}}">{{$member->month}}</a></td>
          <td data-colname="total_received"><span>{{money_format('%(#10n',$member->received_total)}}</span></td>
          <td data-colname="expected_gifts"><span>{{money_format('%(#10n',$member->expected_gifts)}}</span></td>
          <td data-colname="received_gifts"><span>{{money_format('%(#10n',$member->received_gifts)}}</span></td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
          <tr>
            <th scope="col" id="month" class="manage-column column-title column-primary sortable desc">
              <a href="{{$sortUrl}}&amp;orderBy=month">
                <span>Month</span>
                <span class="sorting-indicator"></span>
              </a>
            </th>
            <th scope="col" id="total_received" class="manage-column column-title column-primary sortable desc">
              <a href="{{$sortUrl}}&amp;orderBy=received_total">
                <span>Total Received Gift Count</span>
                <span class="sorting-indicator"></span>
              </a>
            </th>
            <th scope="col" id="expected_gifts" class="manage-column column-title column-primary sortable desc">
              <a href="{{$sortUrl}}&amp;orderBy=expected_gifts">
                <span>Expected Gifts</span>
                <span class="sorting-indicator"></span>
              </a>
            </th>
            <th scope="col" id="received_gifts" class="manage-column column-title column-primary sortable desc">
              <a href="{{$sortUrl}}&amp;orderBy=received_gidts">
                <span>Received Gifts</span>
                <span class="sorting-indicator"></span>
              </a>
            </th>
          </tr>
        </tfoot>
    </table>
    @else
    <p style="color:#666;font-size:18px;margin:0;padding:100px 0 0;text-align:center;">No mounthly member found.</p>
    @endif
  <input type="hidden" name="orderBy" value="{{$orderBy}}"/>
  <input type="hidden" name="order" value="{{$order}}"/>
  </form>
@endsection