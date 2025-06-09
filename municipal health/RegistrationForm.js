// Utility
function closeModal(id) {
  document.getElementById(id).style.display = 'none';
}

function openModal(id) {
  document.getElementById(id).style.display = 'block';
}

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
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
    window.location.href = "landingpage.html"; // Replace with your real appointment page
  }, 2000);
}
