# Public Shopify App Using Codeigniter and Embedded App SDK.
This repository contains a working example of public Shopify App using Codeigniter and Embedded App SDK


-> Do the following Changes in <strong>config.php</strong>

1-Change API Key<br>
2-Change Secret<br>
3-Change base url <br>
4-Change redirect_url <br>
5-Go to Controller Auth -> find $shop, remove $this->input->get('shop'); for your store without **https://**<br>

Example: **`$shop = 'mystore.myshopify.com/';`**
