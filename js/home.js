document.getElementById("openFormBtn").addEventListener("click", function() {
  document.getElementById("myForm").style.display = "flex";
  document.getElementById("myForm").style.flexDirection = "column";
});

document.getElementById("closeFormBtn").addEventListener("click", function() {
  document.getElementById("myForm").style.display = "none";
});
