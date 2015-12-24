// Http headers dynamically
shopping.factory('httpRequestInterceptor', function () {
  return {
    request: function (config) {
      config.headers['Authorization'] = 'Basic d2VudHdvcnRobWFuOkNoYW5nZV9tZQ==';
      config.headers['Accept'] = 'application/json;odata=verbose';
      return config;
    }
  };
});