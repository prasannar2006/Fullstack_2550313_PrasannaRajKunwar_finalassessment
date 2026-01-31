/* ===============================
   AVAILABILITY CHECK (AJAX)
================================ */
document.querySelectorAll("input[type='date']").forEach(input => {
  input.addEventListener("change", () => {
    const inD = document.getElementById("check_in")?.value;
    const outD = document.getElementById("check_out")?.value;

    if (inD && outD) {
      fetch(`availability.php?in=${inD}&out=${outD}`)
        .then(r => r.text())
        .then(d => {
          const box = document.getElementById("available");
          if (box) box.innerHTML = d;
        });
    }
  });
});

/* ===============================
   ROOM SEARCH (AJAX)
================================ */
const search = document.getElementById("roomSearch");

if (search) {
  search.addEventListener("keyup", () => {
    fetch("search_rooms.php?q=" + encodeURIComponent(search.value))
      .then(res => res.text())
      .then(data => {
        const tbody = document.querySelector("tbody");
        if (tbody) tbody.innerHTML = data;
      });
  });
}
