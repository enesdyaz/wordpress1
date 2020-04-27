<table class='form-table'> 

            <tbody>
                <tr>
                    <th> <label for='prefix'> subtitle</label> </th>
                    <td>  <input value='<?= get_post_meta($_GET['post'], 'subtitle', true) ?>'
                    type='text' name='meta[subtitle]' class='regular-text'> </td>
                </tr>

                <tr>
                    <th> <label for='Price'> Price</label> </th>
                    <td>  <input value='<?= get_post_meta($_GET['post'], 'price', true) ?>' type='tel'  name='meta[price]' class='regular-text'> </td>
                </tr>


                <tr>
                    <th> <label for='pub_date'> Published_date</label> </th>
                    <td>  <input value='<?= get_post_meta($_GET['post'], 'pub_date', true) ?>'
                            type='date' name='meta[pub_date]' class='regular-text'> </td>
                </tr>

                <tr>
                    <th> <label for='item_code'>item code</label> </th>
                    <td>  <input value='<?= get_post_meta($_GET['post'], 'item_code', true) ?>'
                            type='text' pattern='[0-9]+' name='meta[item_code]' class='regular-text'> </td>
                </tr>

                <tr>
                    <th> <label for='key_info'>key Info</label> </th>
                    <td>  <textarea name='meta[key_info]' class='regular-text' rows="5" cols="30" style="width:500px;"><?= get_post_meta($_GET['post'], 'key_info', true) ?></textarea></td>
                </tr>

                <tr>
                    <th> <label for='care_advice'>Care Advice</label> </th>
                    <td>  <textarea name='meta[care_advice]' class='regular-text' rows="5" cols="30" style="width:500px;" ><?= get_post_meta($_GET['post'], 'care_advice', true) ?></textarea> </td>
                </tr>


                <tr>
                    <th><label for="meta[select]">Select Menu</label></th>
                    
                <td>
                    <select name="meta[select]" id="meta[select]" style='width: 120px '>
                            <option value="Small" <?php selected( get_post_meta($_GET['post'], 'select', true), 'Small' ); ?>>Small</option>
                            <option value="Medium" <?php selected( get_post_meta($_GET['post'], 'select', true), 'Medium' ); ?>>Medium</option>
                            <option value="Large" <?php selected( get_post_meta($_GET['post'], 'select', true), 'Large' ); ?>>Large</option>
                            <option value="Extra-Large" <?php selected( get_post_meta($_GET['post'], 'select', true), 'Extra-Large' ); ?>>Extra-Large</option>
                    </select>
   
                </td>



<!-- 저장 ok -->
<!-- 저장된거 불러오기  -->


                <tr>
                    <th>available</th>
                    <td>
                        <input type="radio" id="item_available1" name="meta[available]" value="available"  <?php if ( get_post_meta($_GET['post'], 'available', true) === 'available' ) echo 'checked';?>>
                        <label for="item_available1">Available</label>

                        <input type="radio" id="item_available2" name="meta[available]" value="unavailable"  <?php if ( get_post_meta($_GET['post'], 'available', true) === 'unavailable' ) echo 'checked';?>>
                        <label for="item_available2">Unavailable</label> 
                    </td>
            
                </tr>

</table>