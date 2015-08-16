<div class="bootstrap-iso">
    <h2><?php echo $this->pluginInfo->displayName; ?></h2>
    <hr />
    <div class="wrap">
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-pencil"></span> Settings
                </div> 
                <div class="panel-body">


                    <form action="admin.php?page=<?php echo $this->pluginInfo->name ?>&action=resource-form" method="post">
                        <?php wp_nonce_field($this->pluginInfo->name, $this->view->onceName); ?>
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

                        <div class="col-md-6 col-xs-6 voffset3">
                            <label for="title"><?php _e('Title', $this->pluginInfo->name); ?></label>
                            <input type="text" name="title" id="title" class="form-control"  value="<?php echo $this->view->settings->title; ?>" />
                        </div>
                        <div class="col-md-6 col-xs-6 voffset3">
                            <label for="width"><?php _e('Width', $this->pluginInfo->name); ?></label>

                            <input type="text" name="width" id="width" class="form-control"  value="<?php echo $this->view->settings->width; ?>" ><?php ?>
                        </div>
                        <div class="col-md-6 col-xs-6 voffset3">
                            <label for="titleHeight"><strong><?php _e('Title Height', $this->pluginInfo->name); ?></strong></label>
                            <input type="text" name="titleHeight" id="titleHeight" class="form-control"  value="<?php echo $this->view->settings->titleHeight; ?>" ><?php ?>
                        </div>
                        <div class="col-md-6 col-xs-6 voffset3">
                            <label for="contentHeight"><strong><?php _e('Content Height', $this->pluginInfo->name); ?></strong></label>
                            <input type="text" name="contentHeight" id="titleHeight" class="form-control"  value="<?php echo $this->view->settings->contentHeight; ?>" ><?php ?>
                        </div>
                        <div class="col-md-12 col-xs-12 voffset3">
                            <button name="submit" type="submit" class="btn btn-success pull-right" >
                                <span class="glyphicon glyphicon-floppy-disk"></span>
                                <?php _e('Save', $this->pluginInfo->name); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'panel.php'; ?>
    </div>
</div>