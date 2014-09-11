describe('"ideum" module', function () {
  beforeEach(module('ideum'));

  it('should have a root scope', inject(function ($rootScope) {
    expect($rootScope).not.toBeNull();
  }));
});
