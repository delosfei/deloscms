window._ = require("lodash");

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

require("./plugins/element");
require("./plugins/axios");
require("./utils/autoload");
