document.querySelectorAll("input[type=date]").forEach(i =>
  i.addEventListener("change", () => {
    let inD = document.getElementById("check_in").value;
    let outD = document.getElementById("check_out").value;
    if (inD && outD) {
      fetch(`availability.php?in=${inD}&out=${outD}`)
        .then(r => r.text())
        .then(d => document.getElementById("available").innerHTML = d);
    }
  })
);
