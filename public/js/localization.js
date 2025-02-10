// Load the appropriate JSON file based on selected language
function loadLanguage(language) {
    const url = `locales/${language}.json`; // Assuming the files are named en.json, ar.json, etc.
  
    fetch(url)
      .then(response => response.json())
      .then(data => {
        applyTranslations(data);
      })
      .catch(error => {
        console.error('Error loading language file:', error);
      });
  }
  
  // Apply translations to the page
  function applyTranslations(translations) {
    // Iterate over the translation keys and update corresponding elements
    for (const key in translations) {
      const elements = document.querySelectorAll(`[data-i18n="${key}"]`);
      elements.forEach(el => {
        if (el.tagName.toLowerCase() === 'label') {
          // Keep the radio-circle span intact and only modify the text inside the label
          const span = el.querySelector('.radio-circle');
          const labelText = translations[key];
          el.innerHTML = labelText; // Modify the text, leaving the radio-circle intact
          if (span) {
            el.appendChild(span); // Re-append the radio circle to the label
          }
        } else {
          el.textContent = translations[key]; // Set the text content of other elements
        }
      });
    }
  
    // Apply RTL if the selected language is Arabic
    if (translations.language === 'ar') {
      document.body.setAttribute('lang', 'ar');
      document.body.style.direction = 'ltr'; // Apply lte style --> to make sure the layout stays the same
    } else {
      document.body.setAttribute('lang', 'en');
      document.body.style.direction = 'ltr'; // Apply LTR style
    }
  }
  
  // Set up event listeners for language selection
  document.getElementById('english').addEventListener('change', () => loadLanguage('en'));
  document.getElementById('arabic').addEventListener('change', () => loadLanguage('ar'));
  
  // Load the default language (e.g., English)
  loadLanguage('en');
  