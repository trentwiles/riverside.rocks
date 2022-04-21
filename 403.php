<!--

I'm sorry, I did use the HTML from Google's page. We tweaked it a little bit.

If you are seeing this page multiple times please scan your computer for malware and/or contact us.

-->
<body style="font-family: arial, sans-serif; background-color: #fff; color: #000; padding:20px; font-size:18px;" onload="e=document.getElementById('captcha');if(e){e.focus();}">
<script src="https://hcaptcha.com/1/api.js" async defer></script>

<div class="h-captcha" data-sitekey="c8b1b420-5438-4cb5-80fc-32794156c0ee"></div>
  <!--<input class="btn btn-primary" type="submit" value="Submit"> -->
<br><br>
<div style="font-size:13px;">
<b>About this page</b><br><br>

Our systems have detected unusual traffic from your computer network.<br>You may see this page if your network has been infected with malware or if you have violated our terms of service.<br><br>
<!--
<div id="infoDiv" style="display:none; background-color:#eee; padding:10px; margin:0 0 15px 0; line-height:1.4em;">
This page appears when Google automatically detects requests coming from your computer network which appear to be in violation of the <a href="//www.google.com/policies/terms/">Terms of Service</a>. The block will expire shortly after those requests stop.<br><br>This traffic may have been sent by malicious software, a browser plug-in, or a script that sends automated requests.  If you share your network connection, ask your administrator for help &mdash; a different computer using the same IP address may be responsible.  <a href="//support.google.com/websearch/answer/86640">Learn more</a><br><br>Sometimes you may be asked to solve the CAPTCHA if you are using advanced terms that robots are known to use, or sending requests very quickly.
</div>
-->
<hr>
<br>
IP address: <?php echo $_SERVER ['REMOTE_ADDR']; ?><br>Time: <?php echo time(); ?><br>URL: <?php echo (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?><br>
</div>
</div>
<script>
x = true
function oof(){
  if(hcaptcha.getResponse() !== "")
  {
    window.location = "http://example.com";
  }
}
setInterval(function() {
    oof();
}, 1000);
</script>
