// formHandlers.js
export function handleFormSubmission(event) {
    event.preventDefault();
    const email = event.target.querySelector('#email').value;
    console.log('Submitted email:', email);
  }
  