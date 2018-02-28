<div class="metabox-prefs" id="screen-meta">
    <div aria-label="Contextual Help Tab" class="hidden" id="contextual-help-wrap" tabindex="-1">
      <div id="contextual-help-back"></div>
      <div id="contextual-help-columns">
        <div class="contextual-help-tabs">
          <ul>
            <li class="active" id="tab-link-overview">
              <a aria-controls="tab-panel-overview" href="#tab-panel-overview">Overview</a>
            </li>
            <li id="tab-link-screen-content">
              <a aria-controls="tab-panel-screen-content" href="#tab-panel-screen-content">Screen Content</a>
            </li>
            <li id="tab-link-action-links">
              <a aria-controls="tab-panel-action-links" href="#tab-panel-action-links">Available Actions</a>
            </li>
            <li id="tab-link-bulk-actions">
              <a aria-controls="tab-panel-bulk-actions" href="#tab-panel-bulk-actions">Bulk Actions</a>
            </li>
          </ul>
        </div>
        <div class="contextual-help-sidebar">
          <p><strong>For more information:</strong></p>
          <p><a href="https://codex.wordpress.org/Posts_Screen">Documentation on Managing Posts</a></p>
          <p><a href="https://wordpress.org/support/">Support Forums</a></p>
        </div>
        <div class="contextual-help-tabs-wrap">
          <div class="help-tab-content active" id="tab-panel-overview">
            <p>This screen provides access to all of your posts. You can customize the display of this screen to suit your workflow.</p>
          </div>
          <div class="help-tab-content" id="tab-panel-screen-content">
            <p>You can customize the display of this screen’s contents in a number of ways:</p>
            <ul>
              <li>You can hide/display columns based on your needs and decide how many posts to list per screen using the Screen Options tab.</li>
              <li>You can filter the list of posts by post status using the text links above the posts list to only show posts with that status. The default view is to show all posts.</li>
              <li>You can view posts in a simple title list or with an excerpt using the Screen Options tab.</li>
              <li>You can refine the list to show only posts in a specific category or from a specific month by using the dropdown menus above the posts list. Click the Filter button after making your selection. You also can refine the list by clicking on the post author, category or tag in the posts list.</li>
            </ul>
          </div>
          <div class="help-tab-content" id="tab-panel-action-links">
            <p>Hovering over a row in the posts list will display action links that allow you to manage your post. You can perform the following actions:</p>
            <ul>
              <li><strong>Edit</strong> takes you to the editing screen for that post. You can also reach that screen by clicking on the post title.</li>
              <li><strong>Quick Edit</strong> provides inline access to the metadata of your post, allowing you to update post details without leaving this screen.</li>
              <li><strong>Trash</strong> removes your post from this list and places it in the trash, from which you can permanently delete it.</li>
              <li><strong>Preview</strong> will show you what your draft post will look like if you publish it. View will take you to your live site to view the post. Which link is available depends on your post’s status.</li>
            </ul>
          </div>
          <div class="help-tab-content" id="tab-panel-bulk-actions">
            <p>You can also edit or move multiple posts to the trash at once. Select the posts you want to act on using the checkboxes, then select the action you want to take from the Bulk Actions menu and click Apply.</p>
            <p>When using Bulk Edit, you can change the metadata (categories, author, etc.) for all selected posts at once. To remove a post from the grouping, just click the x next to its name in the Bulk Edit area that appears.</p>
          </div>
        </div>
      </div>
    </div>
    <div aria-label="Screen Options Tab" class="hidden" id="screen-options-wrap" tabindex="-1">
      <form id="adv-settings" method="post" name="adv-settings">
        <fieldset class="metabox-prefs">
          <legend>Columns</legend> <label><input checked="checked" class="hide-column-tog" id="author-hide" name="author-hide" type="checkbox" value="author">Author</label> <label><input checked="checked" class="hide-column-tog" id="categories-hide" name="categories-hide" type="checkbox" value="categories">Categories</label> <label><input checked="checked" class="hide-column-tog" id="tags-hide" name="tags-hide" type="checkbox" value="tags">Tags</label> <label><input checked="checked" class="hide-column-tog" id="comments-hide" name="comments-hide" type="checkbox" value="comments">Comments</label> <label><input checked="checked" class="hide-column-tog" id="date-hide" name="date-hide" type="checkbox" value="date">Date</label>
        </fieldset>
        <fieldset class="screen-options">
          <legend>Pagination</legend> <label for="edit_post_per_page">Number of items per page:</label> <input class="screen-per-page" id="edit_post_per_page" max="999" maxlength="3" min="1" name="wp_screen_options[value]" step="1" type="number" value="20"> <input name="wp_screen_options[option]" type="hidden" value="edit_post_per_page">
        </fieldset>
        <fieldset class="metabox-prefs view-mode">
          <legend>View Mode</legend> <label for="list-view-mode"><input checked="checked" id="list-view-mode" name="mode" type="radio" value="list"> List View</label> <label for="excerpt-view-mode"><input id="excerpt-view-mode" name="mode" type="radio" value="excerpt"> Excerpt View</label>
        </fieldset>
        <p class="submit"><input class="button button-primary" id="screen-options-apply" name="screen-options-apply" type="submit" value="Apply"></p><input id="screenoptionnonce" name="screenoptionnonce" type="hidden" value="1c6c9e1f08">
      </form>
    </div>
  </div>
  <div id="screen-meta-links">
    <div class="hide-if-no-js screen-meta-toggle" id="contextual-help-link-wrap">
      <button aria-controls="contextual-help-wrap" aria-expanded="false" class="button show-settings" id="contextual-help-link" type="button">Help</button>
    </div>
    <div class="hide-if-no-js screen-meta-toggle" id="screen-options-link-wrap">
      <button aria-controls="screen-options-wrap" aria-expanded="false" class="button show-settings" id="show-settings-link" type="button">Screen Options</button>
    </div>
  </div>