(function () {
  function findParentElement(trigger, tagname) {
    if (trigger.tagName === tagname) {
      return trigger;
    }
    return findParentElement(trigger.parentElement, tagname);
  }

  function isFormValid(form) {
    const fields = document.querySelectorAll(`#${form.id} input`);

    const isFieldEmpty = Array.from(fields).some((field) => field.value == ""); // for some reasons, '===' doesn't seem to work
    return !isFieldEmpty;
  }

  const requiresValidation = document.querySelectorAll(
    "form.requiresValidation"
  );

  requiresValidation.forEach((form) => {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      if (isFormValid(form)) {
        form.submit();
      } else {
        console.error("Form is not valid");
        alert("The form is not valid. Fill out all the fields.");
      }
    });
  });
})();
