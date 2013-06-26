<?php global $jrl_theme_options; ?>
<form id="setting-general" method="post" action="options.php" enctype="multipart/form-data"
    <?php if( $_COOKIE['resto_tab'] != 'general' ) echo 'class="hide"'; ?>>
    <?php settings_fields('jrl_resto_theme_options'); ?>
    <input type="hidden" name="tab" value="general" />
    <table class="form-table">
        <tr valign="top">
            <th scope="row"><label for="chkCover">Ukuran gambar background</label></th>
            <td><input type="checkbox" name="jrl_resto_theme_options[background_size]" value="cover"
                <?php if( $jrl_theme_options['background_size'] == 'cover' ) echo 'checked'; ?>> &nbsp; Cover
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Jenis Logo</th>
            <td>
                <input id="rbText" type="radio" name="jrl_resto_theme_options[logo_type]" value="text" 
                    <?php if( $jrl_theme_options['logo_type'] == 'text' ) echo 'checked'; ?>>Text &nbsp;
                <input id="rbImage" type="radio" name="jrl_resto_theme_options[logo_type]" value="image"
                    <?php if( $jrl_theme_options['logo_type'] == 'image' ) echo 'checked'; ?>>Gambar 
            </td>
        </tr>
        <tr class="row-text-logo" valign="top">
            <th scope="row"><label for="logo-site-title">Logo Text Utama</label></th>
            <td>
                <input id="logo-site-title" type="text" name="jrl_resto_theme_options[site_title]" 
                    value="<?php echo $jrl_theme_options['site_title']; ?>" />
                <span class="description">
                    Jika kosong maka akan diisi dengan Site Title dari Setting >> General
                </span>
            </td>
        </tr>
        <tr class="row-text-logo" valign="top">
            <th scope="row"><label for="logo-site-description">Logo Text Keterangan</label></th>
            <td>
                <input id="logo-site-description" type="text" name="jrl_resto_theme_options[site_description]" 
                    value="<?php echo $jrl_theme_options['site_description']; ?>" size="40" />
            </td>
        </tr>
        <tr class="row-image-logo" valign="top">
            <th scope="row">Gambar Logo</th>
            <td>
                <input type="hidden" id="logo-url" name="jrl_resto_theme_options[logo_image_url]"
                    value="<?php echo esc_url($jrl_theme_options['logo_image_url']); ?>" />
                <input type="button" id="upload-logo-button" value="Upload Logo" class="button-highlighted" />
                <span class="description">Klik tombol <strong>Upload Logo</strong> untuk upload gambar logo</span>
            </td>
        </tr>
        <tr class="row-image-logo" valign="top">
            <th scope="row">Preview Logo</th>
            <td>
                <div id="logo-preview">
                    <?php $has_logo = ('' != $jrl_theme_options['logo_image_url']) ? true : false; ?>
                    <img src="<?php echo esc_url($jrl_theme_options['logo_image_url']); ?>"
                         <?php if( !$has_logo ) echo ' class="hide"'; ?>/>
                    <span class="description <?php if( $has_logo ) echo 'hide'; ?>">
                        Tidak ada gambar untuk logo
                    </span>
                    <div id="logo-delete" <?php if( !$has_logo ) echo 'class="hide"'; ?>>
                        <input type="button" id="delete-logo-button" value="Hapus Logo" 
                            class="button-secondary" />
                    </div>
                </div>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Favicon</th>
            <td>
                <input type="hidden" id="favicon" name="jrl_resto_theme_options[favicon]"
                    value="<?php echo esc_url($jrl_theme_options['favicon']); ?>" />
                <input type="button" id="upload-favicon-button" class="button-highlighted" 
                    value="Upload Favicon" />
                <span class="description">
                    Klik tombol <strong>Upload Favicon</strong> untuk upload gambar favicon
                </span>
            </td>
        </tr>
        <tr class="row-image-logo" valign="top">
            <th scope="row">Preview Favicon</th>
            <td>
                <div id="favicon-preview">
                    <?php $has_favicon = ( '' != $jrl_theme_options['favicon'] ) ? true : false; ?>
                    <img src="<?php echo esc_url($jrl_theme_options['favicon']); ?>" 
                         <?php if( !$has_favicon ) echo 'class="hide"'; ?> />
                    <span class="description <?php if( $has_favicon ) echo 'hide'; ?>">
                        Tidak ada gambar untuk favicon
                    </span>
                    <div id='favicon-delete' <?php if( !$has_favicon ) echo 'class="hide"';?>>
                        <input type='button' id='delete-favicon-button' value='Hapus Favicon'
                            class='button-secondary' />
                    </div>
                </div>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Post Content</th>
            <td>
                <input type="radio" name="jrl_resto_theme_options[post_content]" value="excerpt"
                    <?php if( 'excerpt' == $jrl_theme_options['post_content'] ) echo 'checked'; ?>>Excerpt &nbsp;
                <input type="radio" name="jrl_resto_theme_options[post_content]" value="full"
                    <?php if( 'full' == $jrl_theme_options['post_content'] ) echo 'checked'; ?>>Full
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Post Paging</th>
            <td> 
                <input type="radio" name="jrl_resto_theme_options[post_paging]" value="pagination"
                    <?php if( 'pagination' == $jrl_theme_options['post_paging'] ) echo 'checked'; ?>>Pagination &nbsp;
                <input type="radio" name="jrl_resto_theme_options[post_paging]" value="prevnext"
                    <?php if( 'prevnext' == $jrl_theme_options['post_paging'] ) echo 'checked'; ?>>Previous / Next
            </td>
        </tr>
    </table>
    <h3>Informasi Restoran</h3>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <label for="resto">Nama Restoran</label>
            </th>
            <td>
                <input type="text" id="resto" name="jrl_resto_theme_options[resto]"
                    value="<?php echo $jrl_theme_options['resto']; ?>" size="40" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">
                <label for="resto">Alamat 1</label>
            </th>
            <td>
                <input type="text" id="address" name="jrl_resto_theme_options[address1]" 
                    value="<?php echo $jrl_theme_options['address1']; ?>" size="40" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">
                <label for="resto">Alamat 2</label>
            </th>
            <td>
                <input type="text" id="address" name="jrl_resto_theme_options[address2]" 
                    value="<?php echo $jrl_theme_options['address2']; ?>" size="40" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">
                <label for="resto">Alamat 3</label>
            </th>
            <td>
                <input type="text" id="address" name="jrl_resto_theme_options[address3]" 
                    value="<?php echo $jrl_theme_options['address3']; ?>" size="40" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">
                <label for="delivery">Delivery</label>
            </th>
            <td>
                <input type="text" id="delivery" name="jrl_resto_theme_options[delivery]"
                    value="<?php echo $jrl_theme_options['delivery']; ?>" size="40" />
                <span class="description">No. telpon untuk delivery</span>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">
                <label for="phone">Phone</label>
            </th>
            <td>
                <input type="text" id="phone" name="jrl_resto_theme_options[phone]"
                    value="<?php echo $jrl_theme_options['phone']; ?>" size="40" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">
                <label for="fax">Pin BB</label>
            </th>
            <td>
                <input type="text" id="fax" name="jrl_resto_theme_options[bbm]"
                    value="<?php echo $jrl_theme_options['bbm']; ?>" size="40" />
            </td>
        </tr>
    </table>
    <h3>Display Menu Makanan</h3>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <label for="product-column">Jumlah kolom</label>
            </th>
            <td>
                <input id="product-column" name="jrl_resto_theme_options[product_column]" 
                    size="10" value="<?php echo $jrl_theme_options['product_column']; ?>" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">
                <label for="max-product-per-page">
                    Jumlah Menu per halaman
                </label>
            </th>
            <td>
                <input id="max-product-per-page" name="jrl_resto_theme_options[max_product_page]"
                    size="10" value="<?php echo $jrl_theme_options['max_product_page']; ?>" />
            </td>
        </tr>
    </table>
    <div class="simpan">
        <input type="submit" value="Simpan" class="submit button-primary" />
    </div>
</form>


