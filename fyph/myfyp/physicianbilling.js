// Get DOM elements
const patientCoverage = document.querySelector('select[name="patient-coverage"]');
const priceNeeded = document.querySelector('input[name="price-needed"]');
// const totalDiv = document.querySelector('#total-div');
const customerPrice = document.querySelector('#customerPrice');
const discountCoverage = document.querySelector('#discountCoverage');

// Set coverage percentages
const coveragePercentages = {
  'a': 0.8, // صندوق الضمان الاجتماعي
  'b': 0.7, // تأمين
  'd': 0.9, // تعاونية
  'e': 1, // وزارة الصحة
  'f': 0.5 // علي حساب السخصي
};

// Calculate total price
function calculateTotalPrice() {
  const coverage = patientCoverage.value;
  const percentage = coveragePercentages[coverage];
  const price = parseFloat(priceNeeded.value);
  const totalPrice = price * percentage;

  customerPrice.textContent = `Customer Price: ${totalPrice} L.L`;
  discountCoverage.textContent = `Discount Coverage: ${percentage * 100}%`;
  //totalDiv.style.display = 'block';
}

// Add event listener to form submit button
// const form = document.querySelector('form');
// form.addEventListener('submit', function(event) {
//   event.preventDefault(); // Prevent form submission
//   calculateTotalPrice();
// });