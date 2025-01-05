
  // -----------------------------------hospital+Agent-------------------------------------------------
  document.getElementById('hospitalBtn').addEventListener('click', () => {
    const card = document.getElementById('flipCard');
    const hospitalForm = document.getElementById('hospitalForm');
    const agentForm = document.getElementById('agentForm');
    
    card.classList.add('flip-hospital');
    card.classList.remove('flip-agent');
    
    hospitalForm.style.display = 'flex'; // Show hospital form
    agentForm.style.display = 'none'; // Hide agent form
  });
  
  document.getElementById('agentBtn').addEventListener('click', () => {
    const card = document.getElementById('flipCard');
    const hospitalForm = document.getElementById('hospitalForm');
    const agentForm = document.getElementById('agentForm');
    
    card.classList.add('flip-agent');
    card.classList.remove('flip-hospital');
    
    hospitalForm.style.display = 'none'; // Hide hospital form
    agentForm.style.display = 'flex'; // Show agent form
  });
  
  document.querySelectorAll('.back-arrow-2').forEach(button => {
    button.addEventListener('click', () => {
      const card = document.getElementById('flipCard');
      card.classList.remove('flip-hospital', 'flip-agent'); // Remove both flips
    });
  });
  