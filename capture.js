var page = require('webpage').create();
//console.log('http://' + require('system').args[1] + '/cpanel');
var url = 'http://' + require('system').args[1] + '/cpanel';
page.viewportSize = { width: 900, height : 600 };
page.open(url, function() {
  page.render('/home/user/ngn-env/smon/web/captures/' + require('system').args[1] + '.png');
  console.log('web/captures/' + require('system').args[1] + '.png');
  phantom.exit();
});