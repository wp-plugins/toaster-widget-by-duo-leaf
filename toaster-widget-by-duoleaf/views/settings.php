<?php wp_nonce_field($this->pluginInfo->name, $this->view->onceName); ?>
<h2><?php echo $this->pluginInfo->displayName; ?></h2>
<hr />
<div class="wrap">
    <form action="options-general.php?page=<?php echo $this->pluginInfo->name ?>&action=resource-form" method="post">
        <?php
        if (isset($this->message)) {
            ?>
            <div class="updated fade"><p><?php echo $this->message; ?></p></div>  
            <?php
        }
        if (isset($this->errorMessage)) {
            ?>
            <div class="error fade"><p><?php echo $this->errorMessage; ?></p></div>  
            <?php
        }
        ?> 
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="title"><?php _e('Title', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <input type="text" name="title" id="title" class="regular-text ltr"  value="<?php echo $this->view->settings->title; ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="width"><?php _e('Width', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <input type="text" name="width" id="width" class="regular-text ltr"  value="<?php echo $this->view->settings->width; ?>" ><?php ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="titleHeight"><strong><?php _e('Title Height', $this->pluginInfo->name); ?></strong></label>
                </th>
                <td>
                    <input type="text" name="titleHeight" id="titleHeight" class="regular-text ltr"  value="<?php echo $this->view->settings->titleHeight; ?>" ><?php ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="contentHeight"><strong><?php _e('Content Height', $this->pluginInfo->name); ?></strong></label>
                </th>
                <td>
                    <input type="text" name="contentHeight" id="titleHeight" class="regular-text ltr"  value="<?php echo $this->view->settings->contentHeight; ?>" ><?php ?>
                </td>
            </tr>
        </table
        <p>
            <input name="submit" type="submit" name="Submit" class="button button-primary" value="<?php _e('Save', $this->pluginInfo->name); ?>" /> 
        </p>
    </form>
</div>