function openModal(id) {
  document.getElementById('backdrop').style.display = 'block';
  document.getElementById(id).style.display = 'block';
}
function closeModal(id) {
  document.getElementById('backdrop').style.display = 'none';
  document.getElementById(id).style.display = 'none';
}
function closeAllModals() {
  document.getElementById('backdrop').style.display = 'block';
}

// --- New Patient ---
function goToNewPatientStep2() {
  closeModal('modal');
  openModal('modal1');
  scrollToTop();
}

function goBackToNewPatientStep1() {
  closeModal('modal1');
  openModal('modal');
  scrollToTop();
}

// --- Returning Patient ---
function goToReturningPatientStep2() {
  closeModal('modal-returning');
  openModal('modal2');
  scrollToTop();
}

function goBackToReturningPatientStep1() {
  closeModal('modal2');
  openModal('modal-returning');
  scrollToTop();
}

function goToReturningPatientStep3() {
  closeModal('modal2');
  openModal('modal3');
  scrollToTop();
}

function goBackToReturningPatientStep2() {
  closeModal('modal3');
  openModal('modal2');
  scrollToTop();
}

// --- Referring Physicians ---
function goToReferringPhysicianStep2() {
  closeModal('modal-referring');
  openModal('modal-referring2');
  scrollToTop();
}

function goBackToReferringPhysicianStep1() {
  closeModal('modal-referring2');
  openModal('modal-referring');
  scrollToTop();
}

function goToReferringPhysicianStep3() {
  closeModal('modal-referring2');
  openModal('modal-referring3');
  scrollToTop();
}

function goBackToReferringPhysicianStep2() {
  closeModal('modal-referring3');
  openModal('modal-referring2');
  scrollToTop();
}

// --- LABORATORY TEST ---
function goTolabtest2() {
  closeModal('modal-labtest');
  openModal('modal-labtest2');
  scrollToTop();
}

function goBackTolabtest1() {
  closeModal('modal-labtest2');
  openModal('modal-labtest');
  scrollToTop();
}

function goTolabtest3() {
  closeModal('modal-labtest2');
  openModal('modal-labtest3');
  scrollToTop();
}

function goBackTolabtest2() {
  closeModal('modal-labtest3');
  openModal('modal-labtest2');
  scrollToTop();
}



// --- New Patient Submission ---
function handleNewPatientSubmit() {
  closeModal('modal1');
  alert("Thank you! Your appointment request has been submitted successfully.");
  setTimeout(function () {
    window.location.href = "landingpage.php"; // Replace with your real appointment page
  }, 2000);
}


  const specialistSelect = document.getElementById('specialist-select');
  const physicianSelect = document.getElementById('physician-select');
  const dateSelect = document.getElementById('date-select');
  const timeSelect = document.getElementById('time-select');

  // Sample data (specialty → doctors → availability)
  const data = {
    cardiology: {
      doctors: {
        "Dr. Liecha Isidto": {
          dates: ["2025-06-18", "2025-06-19", "2025-06-21"],
          times: ["09:00", "10:00", "14:00"]
        }
      }
    },
    dermatology: {
      doctors: {
        "Dr. John Joshua Perez": {
          dates: ["2025-06-18", "2025-06-20"],
          times: ["11:00", "13:00"]
        }
      }
    },
    neurology: {
      doctors: {
        "Dr. Kevin Villaruz": {
          dates: ["2025-06-19", "2025-06-22"],
          times: ["08:30", "15:00"]
        }
      }
    },
    orthopedics: {
      doctors: {
        "Dr. Mark Vincent Bellen": {
          dates: ["2025-06-18", "2025-06-21"],
          times: ["09:30", "11:00"]
        }
      }
    },
    pediatrics: {
      doctors: {
        "Dr. Estephanie Escuejo": {
          dates: ["2025-06-19", "2025-06-20"],
          times: ["10:00", "12:00"]
        }
      }
    },
    psychiatry: {
      doctors: {
        "Dr. Irish Castillo": {
          dates: ["2025-06-20", "2025-06-21"],
          times: ["14:00", "16:00"]
        }
      }
    }
  };

  // Utility to get weekday name
  function isSunday(dateStr) {
    const day = new Date(dateStr).getDay();
    return day === 0;
  }

  // Populate physicians based on selected specialist
  specialistSelect.addEventListener('change', () => {
    const specialty = specialistSelect.value;
    physicianSelect.innerHTML = `<option value="">-- Select Physician --</option>`;
    dateSelect.innerHTML = `<option value="">-- Select Date --</option>`;
    timeSelect.innerHTML = `<option value="">-- Select Time --</option>`;

    if (specialty && data[specialty]) {
      const doctors = data[specialty].doctors;
      for (const doc in doctors) {
        const opt = document.createElement("option");
        opt.value = doc;
        opt.textContent = doc;
        physicianSelect.appendChild(opt);
      }
    }
  });

  // Populate available dates & times when physician selected
  physicianSelect.addEventListener('change', () => {
    const specialty = specialistSelect.value;
    const doctor = physicianSelect.value;

    dateSelect.innerHTML = `<option value="">-- Select Date --</option>`;
    timeSelect.innerHTML = `<option value="">-- Select Time --</option>`;

    if (specialty && doctor && data[specialty] && data[specialty].doctors[doctor]) {
      const { dates, times } = data[specialty].doctors[doctor];

      // Populate weekdays only (Mon–Sat)
      dates.forEach(date => {
        if (!isSunday(date)) {
          const opt = document.createElement("option");
          opt.value = date;
          opt.textContent = new Date(date).toDateString(); // Format: Wed Jun 18 2025
          dateSelect.appendChild(opt);
        }
      });

      // Populate times
      times.forEach(time => {
        const opt = document.createElement("option");
        opt.value = time;
        opt.textContent = time;
        timeSelect.appendChild(opt);
      });
    }
  });




// PART 2 FORM FOR PHYSICIANS

const specialistSelect1 = document.getElementById('specialist-select1');
const physicianSelect1 = document.getElementById('physician-select1');
const dateSelect1 = document.getElementById('date-select1');
const timeSelect1 = document.getElementById('time-select1');

// Sample data (specialty → doctors → availability)
const data1 = {
  cardiology: {
    doctors: {
      "Dr. Liecha Isidto": {
        dates: ["2025-06-18", "2025-06-19", "2025-06-21"],
        times: ["09:00", "10:00", "14:00"]
      }
    }
  },
  dermatology: {
    doctors: {
      "Dr. John Joshua Perez": {
        dates: ["2025-06-18", "2025-06-20"],
        times: ["11:00", "13:00"]
      }
    }
  },
  neurology: {
    doctors: {
      "Dr. Kevin Villaruz": {
        dates: ["2025-06-19", "2025-06-22"],
        times: ["08:30", "15:00"]
      }
    }
  },
  orthopedics: {
    doctors: {
      "Dr. Mark Vincent Bellen": {
        dates: ["2025-06-18", "2025-06-21"],
        times: ["09:30", "11:00"]
      }
    }
  },
  pediatrics: {
    doctors: {
      "Dr. Estephanie Escuejo": {
        dates: ["2025-06-19", "2025-06-20"],
        times: ["10:00", "12:00"]
      }
    }
  },
  psychiatry: {
    doctors: {
      "Dr. Irish Castillo": {
        dates: ["2025-06-20", "2025-06-21"],
        times: ["14:00", "16:00"]
      }
    }
  }
};

// Utility to check if a date is Sunday
function isSunday(dateStr) {
  const day = new Date(dateStr).getDay();
  return day === 0;
}

// Populate physicians based on selected specialist
specialistSelect1.addEventListener('change', () => {
  const specialty = specialistSelect1.value;
  physicianSelect1.innerHTML = `<option value="">-- Select Physician --</option>`;
  dateSelect1.innerHTML = `<option value="">-- Select Date --</option>`;
  timeSelect1.innerHTML = `<option value="">-- Select Time --</option>`;

  if (specialty && data1[specialty]) {
    const doctors = data1[specialty].doctors;
    for (const doc in doctors) {
      const opt = document.createElement("option");
      opt.value = doc;
      opt.textContent = doc;
      physicianSelect1.appendChild(opt);
    }
  }
});

// Populate available dates & times when physician selected
physicianSelect1.addEventListener('change', () => {
  const specialty = specialistSelect1.value;
  const doctor = physicianSelect1.value;

  dateSelect1.innerHTML = `<option value="">-- Select Date --</option>`;
  timeSelect1.innerHTML = `<option value="">-- Select Time --</option>`;

  if (specialty && doctor && data1[specialty] && data1[specialty].doctors[doctor]) {
    const { dates, times } = data1[specialty].doctors[doctor];

    // Populate weekdays only (Mon–Sat)
    dates.forEach(date => {
      if (!isSunday(date)) {
        const opt = document.createElement("option");
        opt.value = date;
        opt.textContent = new Date(date).toDateString();
        dateSelect1.appendChild(opt);
      }
    });

    // Populate times
    times.forEach(time => {
      const opt = document.createElement("option");
      opt.value = time;
      opt.textContent = time;
      timeSelect1.appendChild(opt);
    });
  }
});





// PART 3 REFERRING  FORM FOR PHYSICIANS

const specialistSelect2 = document.getElementById('specialist-select2');
const physicianSelect2 = document.getElementById('physician-select2');

// Sample data (specialty → doctors → availability)
const data2 = {
  cardiology: {
    doctors: {
      "Dr. Liecha Isidto": {
        dates: ["2025-06-18", "2025-06-19", "2025-06-21"],
        times: ["09:00", "10:00", "14:00"]
      }
    }
  },
  dermatology: {
    doctors: {
      "Dr. John Joshua Perez": {
        dates: ["2025-06-18", "2025-06-20"],
        times: ["11:00", "13:00"]
      }
    }
  },
  neurology: {
    doctors: {
      "Dr. Kevin Villaruz": {
        dates: ["2025-06-19", "2025-06-22"],
        times: ["08:30", "15:00"]
      }
    }
  },
  orthopedics: {
    doctors: {
      "Dr. Mark Vincent Bellen": {
        dates: ["2025-06-18", "2025-06-21"],
        times: ["09:30", "11:00"]
      }
    }
  },
  pediatrics: {
    doctors: {
      "Dr. Estephanie Escuejo": {
        dates: ["2025-06-19", "2025-06-20"],
        times: ["10:00", "12:00"]
      }
    }
  },
  psychiatry: {
    doctors: {
      "Dr. Irish Castillo": {
        dates: ["2025-06-20", "2025-06-21"],
        times: ["14:00", "16:00"]
      }
    }
  }
};

// Populate physicians based on selected specialist
specialistSelect2.addEventListener('change', () => {
  const specialty = specialistSelect2.value;
  physicianSelect2.innerHTML = `<option value="">-- Select Physician --</option>`;


  if (specialty && data1[specialty]) {
    const doctors = data1[specialty].doctors;
    for (const doc in doctors) {
      const opt = document.createElement("option");
      opt.value = doc;
      opt.textContent = doc;
      physicianSelect2.appendChild(opt);
    }
  }
});
