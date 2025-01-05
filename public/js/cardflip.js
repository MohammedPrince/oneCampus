document.getElementById('parentBtn').addEventListener('click', () => {
    const card = document.getElementById('flipCard');
    const parentForm = document.getElementById('parentForm');
    const studentForm = document.getElementById('studentForm');
    
    card.classList.add('flip-parent');
    card.classList.remove('flip-student');
    
    parentForm.style.display = 'flex'; // Show parent form
    studentForm.style.display = 'none'; // Hide student form
  });

  document.getElementById('studentBtn').addEventListener('click', () => {
    const card = document.getElementById('flipCard');
    const parentForm = document.getElementById('parentForm');
    const studentForm = document.getElementById('studentForm');
    
    card.classList.add('flip-student');
    card.classList.remove('flip-parent');
    
    parentForm.style.display = 'none'; // Hide parent form
    studentForm.style.display = 'flex'; // Show student form
  });

  document.querySelectorAll('.back-arrow').forEach(button => {
    button.addEventListener('click', () => {
      const card = document.getElementById('flipCard');
      card.classList.remove('flip-parent', 'flip-student'); // Remove both flips
    });
  });