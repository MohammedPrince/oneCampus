
function filterTable() {
    const searchInput = document.getElementById("tableSearch").value.toLowerCase();
    const tableRows = document.querySelectorAll("#tableBody tr");

    tableRows.forEach((row) => {
      const cells = row.querySelectorAll("td");
      const rowText = Array.from(cells)
        .map((cell) => cell.textContent.toLowerCase())
        .join(" ");
      row.style.display = rowText.includes(searchInput) ? "" : "none";
    });
  }
  function filterTable2() {
    const searchInput = document.getElementById("tableSearch2").value.toLowerCase();
    const tableRows = document.querySelectorAll("#tableBody2 tr");

    tableRows.forEach((row) => {
      const cells = row.querySelectorAll("td");
      const rowText = Array.from(cells)
        .map((cell) => cell.textContent.toLowerCase())
        .join(" ");
      row.style.display = rowText.includes(searchInput) ? "" : "none";
    });
  }