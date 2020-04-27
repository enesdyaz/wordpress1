<button class='image-button' type='button'>ADD IMAGE</button>
<div class="image-show"></div>
<input class='image-id' type="hidden" name='meta[cover-id]' value="<?= get_post_meta(get_the_ID(), 'cover-id', true) ?>" />
<input class='image-url' type="text" name='meta[image-url]' value="<?= get_post_meta(get_the_ID(), 'image-url', true) ?>" />
