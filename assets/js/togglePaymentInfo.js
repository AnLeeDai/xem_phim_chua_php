function togglePaymentInfo(option) {
  const bankInfo = document.getElementById("bank-info");
  const qrInfo = document.getElementById("qr-info");

  if (option === "bank") {
    bankInfo.classList.add("visible");
    bankInfo.classList.remove("hidden");
    qrInfo.classList.add("hidden");
    qrInfo.classList.remove("visible");
  } else if (option === "qr") {
    qrInfo.classList.add("visible");
    qrInfo.classList.remove("hidden");
    bankInfo.classList.add("hidden");
    bankInfo.classList.remove("visible");
  }
}
