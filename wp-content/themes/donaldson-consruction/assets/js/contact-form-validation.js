document.addEventListener('DOMContentLoaded', () => {
  const nameInput = document.getElementById('input-name');
  const emailInput = document.getElementById('input-email');
  const addressInput = document.getElementById('input-address');
  const cityInput = document.getElementById('input-city');
  const stateInput = document.getElementById('input-state');
  const zipInput = document.getElementById('input-zip');
  const messageInput = document.getElementById('input-message');
  
  const nameErrorEl = document.getElementById('error-message-name');
  const emailErrorEl = document.getElementById('error-message-email');
  const addressErrorEl = document.getElementById('error-message-address');
  const cityErrorEl = document.getElementById('error-message-city');
  const stateErrorEl = document.getElementById('error-message-state');
  const zipErrorEl = document.getElementById('error-message-zip');
  const messageErrorEl = document.getElementById('error-message-message');
  
  const submitBtn = document.getElementById('submitBtn');

  const disableSubmit = () => submitBtn.setAttribute('disabled', true);
  const enableSubmit = () => submitBtn.removeAttribute('disabled');

  const fields = [
    { name: 'Name', inputEl: nameInput, errorEl: nameErrorEl, errorMsg: '* Name is required' },
    { name: 'Email', inputEl: emailInput, errorEl: emailErrorEl, errorMsg: '* Email is required' },
    { name: 'Address', inputEl: addressInput, errorEl: addressErrorEl, errorMsg: '* Address is required' },
    { name: 'City', inputEl: cityInput, errorEl: cityErrorEl, errorMsg: '* City is required' },
    { name: 'State', inputEl: stateInput, errorEl: stateErrorEl, errorMsg: '* State is required' },
    { name: 'Zip', inputEl: zipInput, errorEl: zipErrorEl, errorMsg: '* Zip code is required' },
    { name: 'Message', inputEl: messageInput, errorEl: messageErrorEl, errorMsg: '* Message is required' },
  ];

  // Verify that all fields have values
  const validateFields = () => {
    return nameInput.value && emailInput.value && addressInput.value && cityInput.value && stateInput.value && zipInput.value && messageInput.value;
  }

  // Check each field for a valid input; disable submit button if field is empty; re-enable submit button when all fields validate
  fields.forEach((field) => {
    field.inputEl.addEventListener('blur', () => {
      const { inputEl, errorEl, errorMsg } = field;

      if (!inputEl.value) {
        errorEl.textContent = errorMsg;
        disableSubmit();
      } else {
        errorEl.textContent = '';
        
        if (validateFields()) {
          enableSubmit();
        }
      }
    })
  });
});