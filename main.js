(function () {
  function findParentElement(trigger, tagname) {
    if (trigger.tagName === tagname) {
      return trigger;
    }
    return findParentElement(trigger.parentElement, tagname);
  }
})();
