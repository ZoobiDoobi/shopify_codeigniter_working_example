<!DOCTYPE html>
<html>

    <head>
        <link href="<?php echo site_url(); ?>assets/css/seaff.css" type="text/css" rel="stylesheet">
        <script src="https://cdn.shopify.com/s/assets/external/app.js"></script>
        <script type="text/javascript">
            ShopifyApp.init({
                apiKey : '<?php echo $api_key; ?>',
                shopOrigin : '<?php echo 'https://'  . $shop; ?>' 
            });
        </script>
        <script type="text/javascript">
            ShopifyApp.ready(function(){
                ShopifyApp.Bar.initialize({
                buttons: {
                    primary: {
                    label: 'Save',
                    message: 'unicorn_form_submit',
                    loading: true
                    }
                }
                });
            });
</script>
    </head>

    <body>
        <h1>APP WORKS</h1>
        <div class="section">
            <div class="section-summary">
                <h1>Section title</h1>
                <p>Section explanation</p>
            </div>
            <div class="section-content">
                <div class="section-row">
                    <div class="section-cell">
                        Information related to the section
                    </div>
                </div>
            </div>
        </div>
        <form action="">
            <input type="text" name="user_name" id="nameTextBox">
            <input type="submit" id="btn" class="btn btn-primary">
        </form>
    </body>

</html>