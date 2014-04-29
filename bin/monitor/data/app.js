var app = module.exports = require('appjs');

app.serveFilesFrom(__dirname + '/content');

var menubar = app.createMenu([
  {
    label: '&File'
  }
]);
/*
 */

menubar.on('select', function(item) {
  console.log("menu item " + item.label + " clicked");
});

var trayMenu = app.createMenu([
  {
    label: 'Show',
    action: function() {
      window.frame.show();
    }
  },
  {
    label: 'Minimize',
    action: function() {
      window.frame.hide();
    }
  },
  {
    label: 'Exit',
    action: function() {
      window.close();
    }
  }
]);

var statusIcon = app.createStatusIcon({
  icon: './data/content/icons/32.png',
  tooltip: 'Ngn Monitor',
  menu: trayMenu
});

var window = app.createWindow({
  width: 200,
  height: 450,
  resizable: false,
  icons: __dirname + '/content/icons'
});

window.on('create', function() {
  console.log("Window Created");
  window.frame.show();
  window.frame.center();
  //window.frame.setMenuBar(menubar);
});

window.on('ready', function() {
  console.log("Window Ready");
  window.process = process;
  window.module = module;

  function F12(e) {
    return e.keyIdentifier === 'F12'
  }

  function Command_Option_J(e) {
    return e.keyCode === 74 && e.metaKey && e.altKey
  }

  window.addEventListener('keydown', function(e) {
    if (F12(e) || Command_Option_J(e)) {
      window.frame.openDevTools();
    }
  });
});

window.on('close', function() {
  console.log("Window Closed");
});
