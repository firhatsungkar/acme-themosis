@extends('us.storyware-donations.layouts.main')
@section('main')
  <h1 class="wp-heading-inline">{{$__page->get('title')}}</h1>
  <a href="http://acme-themosis.test/cms/wp-admin/post-new.php" class="page-title-action">Add New</a>
  <hr class="wp-header-end">
  <h2 class="screen-reader-text">List All Donation</h2>
  <ul class="subsubsub">
      <li class="all"><a href="#" class="current" aria-current="page">All <span class="count">({{count($members)}})</span></a></li>
  </ul>
  <form id="donation-list" method="get">
    <input type="hidden" id="donation-plugin-name" name="page" value="storyware-donations"/>
    <p class="search-box">
      <label class="screen-reader-text" for="donation-search-input">Search Donations:</label>
    <input type="search" id="donation-search-input" name="s" value="{{$search}}">
      <input type="submit" id="search-submit" class="button" value="Search Donations">
    </p>
    <div class="tablenav top">
      <div class="alignleft actions bulkactions">
        <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
        <select name="action" id="bulk-action-selector-top">
          <option value="-1">Bulk Actions</option>
          <option value="edit" class="hide-if-no-js">Edit</option>
          <option value="trash">Move to Trash</option>
        </select>
        <input type="submit" id="doaction" class="button action" value="Apply" _vimium-has-onclick-listener="">
      </div>
      <div class="alignleft actions">
        <label for="filter-by-date" class="screen-reader-text">Filter by date</label>
        <select name="date" id="filter-by-date">
          <option selected="selected" value="0">All dates</option>
          <option value="201802">February 2018</option>
        </select>
        <label class="screen-reader-text" for="category">Filter by membership type</label>
        <select name="category" id="category" class="postform">
          <option value="0">All Categories</option>
          <option class="level-0" value="1">Uncategorized</option>
        </select>
        <select name="record" id="record" class="postform">
          <option value="0">All Records</option>
          <option class="level-0" value="1">Uncategorized</option>
        </select>
        <input type="submit" name="filter_action" id="donation-query-submit" class="button" value="Filter">
      </div>
    </div>
    @if(isset($members) && count($members) > 0)
    <table class="wp-list-table widefat fixed striped posts">
      <thead>
        <tr>
          <td id="cb" class="manage-column column-cb check-column">
            <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
            <input id="cb-select-all-1" type="checkbox">
          </td>
          <th scope="col" id="id" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=id">
              <span>Id</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="last_name" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=last_name">
              <span>Last Name</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="first_name" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=first_name">
              <span>First Name</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="total" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=total">
              <span>Total</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="type" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=type">
              <span>Type</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="exported_at" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=exported_at">
              <span>Exported At</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="exported_by" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=exported_by">
              <span>Exported By</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="created_at" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=order_by">
              <span>Created At</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
        </tr>
      </thead>
      <tbody id="the-list" _vimium-has-onclick-listener>
        @foreach($members as $member)
        <tr id="donation-{{$member->id}}">
            <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-{{$member->id}}">Select {{$member->last_name}}</label>
            <input id="cb-select-{{$member->id}}" type="checkbox" name="post[]" value="{{$member->id}}">
              <div class="locked-indicator">
                <span class="locked-indicator-icon" aria-hidden="true"></span>
                <span class="screen-reader-text">“Hello world!” is locked</span>
              </div>
            </th>
          <td data-colname="id"><a href="edit.php?post_type=post&amp;members={{$member->id}}">{{$member->id}}</a></td>
          <td data-colname="last_name"><a href="edit.php?post_type=post&amp;members={{$member->id}}">{{$member->last_name}}</a></td>
          <td data-colname="first_name"><a href="edit.php?post_type=post&amp;members={{$member->id}}">{{$member->first_name}}</a></td>
          <td data-colname="total"><span>{{$member->total}}</span></td>
          <td data-colname="type"><span>{{$member->type}}</span></td>
          <td data-colname="exported_at"><span>{{$member->exported_at}}</span></td>
          <td data-colname="exported_by"><span>{{$member->exported_by}}</span></td>
          <td data-colname="created_by"><span>{{$member->created_by}}</span></td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td id="cb" class="manage-column column-cb check-column">
            <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
            <input id="cb-select-all-1" type="checkbox">
          </td>
          <th scope="col" id="id" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=id">
              <span>Id</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="last_name" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=last_name">
              <span>Last Name</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="first_name" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=first_name">
              <span>First Name</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="total" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=total">
              <span>Total</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="type" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=type">
              <span>Type</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="exported_at" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=exported_at">
              <span>Exported At</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="exported_by" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=exported_by">
              <span>Exported By</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
          <th scope="col" id="created_at" class="manage-column column-title column-primary sortable desc">
            <a href="{{$sortUrl}}&amp;orderBy=order_by">
              <span>Created At</span>
              <span class="sorting-indicator"></span>
            </a>
          </th>
        </tr>
      </tfoot>
    </table>
    @else
    <p style="color:#666;font-size:18px;margin:0;padding:100px 0 0;text-align:center;">No donation files found.</p>
    @endif
  <input type="hidden" name="orderBy" value="{{$orderBy}}"/>
  <input type="hidden" name="order" value="{{$order}}"/>
  </form>
@endsection